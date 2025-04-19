<?php

namespace App\Jobs;

use App\Mail\ContactFormAdmin;
use App\Mail\ContactFormUser;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendContactEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $formData;
    protected $adminEmail = 'abrahamopuba@gmail.com';

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * The number of seconds to wait before retrying the job.
     * This implements exponential backoff: 10s, 30s, 90s
     *
     * @var int
     */
    public $backoff = [10, 30, 90];

    /**
     * Delete the job if its models no longer exist.
     *
     * @var bool
     */
    public $deleteWhenMissingModels = true;

    /**
     * Create a new job instance.
     */
    public function __construct(array $formData)
    {
        $this->formData = $formData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Record the attempt
            $submissionId = $this->recordSubmissionAttempt();

            // Send email to admin
            Mail::to($this->adminEmail)
                ->send(new ContactFormAdmin($this->formData));

            // Send confirmation to user
            Mail::to($this->formData['email'])
                ->send(new ContactFormUser($this->formData));

            // Mark the submission as sent successfully
            if (isset($submissionId)) {
                $this->markSubmissionSuccessful($submissionId);
            }

            // Log successful email sending
            Log::info('Contact form emails sent successfully', [
                'name' => $this->formData['name'],
                'email' => $this->formData['email'],
                'submission_id' => $submissionId ?? null,
            ]);
        } catch (Exception $e) {
            // Mark the submission as failed
            if (isset($submissionId)) {
                $this->markSubmissionFailed($submissionId, $e->getMessage());
            }

            Log::error('Failed to send contact form emails', [
                'error' => $e->getMessage(),
                'name' => $this->formData['name'] ?? 'unknown',
                'email' => $this->formData['email'] ?? 'unknown',
                'attempt' => $this->attempts(),
                'submission_id' => $submissionId ?? null,
            ]);

            // Determine if we should retry based on the exception type
            if ($this->shouldRetry($e)) {
                // Release the job back to the queue for retry
                $this->release($this->backoff[$this->attempts() - 1] ?? 60);
                return;
            }

            // If we shouldn't retry or we've exceeded tries, fail the job
            $this->fail($e);
        }
    }

    /**
     * Record a submission attempt in the database
     *
     * @return string|null The submission ID or null if recording failed
     */
    protected function recordSubmissionAttempt(): ?string
    {
        try {
            $submission = \App\Models\ContactFormSubmission::create([
                'name' => $this->formData['name'] ?? 'Unknown',
                'email' => $this->formData['email'] ?? 'unknown@example.com',
                'subject' => $this->formData['subject'] ?? 'No Subject',
                'message' => $this->formData['message'] ?? 'No Message',
                'status' => 'pending',
                'ip_address' => $this->formData['ip_address'] ?? null,
                'user_agent' => $this->formData['user_agent'] ?? null,
                'metadata' => [
                    'job_id' => $this->job ? $this->job->getJobId() : null,
                    'queue' => $this->job ? $this->job->getQueue() : 'sync',
                    'attempt' => $this->attempts(),
                    'submitted_at' => $this->formData['submitted_at'] ?? now()->toDateTimeString(),
                ],
            ]);

            return $submission->id;
        } catch (Exception $e) {
            Log::error('Failed to record contact form submission attempt', [
                'error' => $e->getMessage(),
                'email' => $this->formData['email'] ?? 'unknown',
            ]);

            return null;
        }
    }

    /**
     * Mark a submission as successfully processed
     *
     * @param string|null $submissionId The submission ID
     * @return void
     */
    protected function markSubmissionSuccessful(?string $submissionId): void
    {
        if (!$submissionId) {
            return;
        }

        try {
            \App\Models\ContactFormSubmission::where('id', $submissionId)
                ->update([
                    'status' => 'sent',
                    'processed_at' => now(),
                    'metadata->job_completed_at' => now()->toDateTimeString(),
                ]);
        } catch (Exception $e) {
            Log::error('Failed to mark contact form submission as successful', [
                'error' => $e->getMessage(),
                'submission_id' => $submissionId,
            ]);
        }
    }

    /**
     * Mark a submission as failed
     *
     * @param string|null $submissionId The submission ID
     * @param string $errorMessage The error message
     * @return void
     */
    protected function markSubmissionFailed(?string $submissionId, string $errorMessage): void
    {
        if (!$submissionId) {
            return;
        }

        try {
            \App\Models\ContactFormSubmission::where('id', $submissionId)
                ->update([
                    'status' => 'failed',
                    'processed_at' => now(),
                    'metadata->error' => $errorMessage,
                    'metadata->attempts' => $this->attempts(),
                    'metadata->failed_at' => now()->toDateTimeString(),
                ]);
        } catch (Exception $e) {
            Log::error('Failed to mark contact form submission as failed', [
                'error' => $e->getMessage(),
                'submission_id' => $submissionId,
            ]);
        }
    }

    /**
     * Determine if the job should be retried based on the exception.
     *
     * @param \Exception $exception
     * @return bool
     */
    protected function shouldRetry(Exception $exception): bool
    {
        // Retry for network/connection issues, timeouts, or temporary server problems
        // Don't retry for validation errors, authentication failures, etc.
        $retryableExceptions = [
            \Symfony\Component\Mailer\Exception\TransportException::class,
            \Symfony\Component\Mailer\Exception\TransportExceptionInterface::class,
            \Symfony\Component\Mime\Exception\RuntimeException::class,
        ];

        foreach ($retryableExceptions as $retryableException) {
            if ($exception instanceof $retryableException) {
                return true;
            }
        }

        // Also retry if the message contains specific strings indicating temporary issues
        $retryableMessages = [
            'timeout',
            'timed out',
            'connection refused',
            'could not resolve',
            'temporary failure',
            'server busy',
        ];

        foreach ($retryableMessages as $message) {
            if (stripos($exception->getMessage(), $message) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Handle a job failure.
     *
     * @param \Throwable $exception
     * @return void
     */
    public function failed(Throwable $exception): void
    {
        // Log the failure
        Log::critical('Contact form email job failed permanently', [
            'error' => $exception->getMessage(),
            'name' => $this->formData['name'] ?? 'unknown',
            'email' => $this->formData['email'] ?? 'unknown',
        ]);

        // Record the permanent failure in our tracking system
        try {
            \App\Models\ContactFormSubmission::updateOrCreate(
                [
                    'email' => $this->formData['email'] ?? 'unknown@example.com',
                    'subject' => $this->formData['subject'] ?? 'No Subject',
                    'created_at' => now()->subMinutes(5), // Only match recent submissions
                ],
                [
                    'name' => $this->formData['name'] ?? 'Unknown',
                    'message' => $this->formData['message'] ?? 'No Message',
                    'status' => 'failed',
                    'ip_address' => $this->formData['ip_address'] ?? null,
                    'user_agent' => $this->formData['user_agent'] ?? null,
                    'processed_at' => now(),
                    'metadata' => [
                        'error' => $exception->getMessage(),
                        'error_type' => get_class($exception),
                        'failed_at' => now()->toDateTimeString(),
                        'max_attempts_reached' => true,
                    ],
                ]
            );
        } catch (Exception $e) {
            Log::error('Failed to record permanent job failure', [
                'error' => $e->getMessage(),
                'original_error' => $exception->getMessage(),
            ]);
        }

        // Use the ContactFormService to handle the failure
        $service = app(\App\Services\ContactFormService::class);

        // First, ensure the failed submissions table exists
        $service->ensureFailedSubmissionsTable();

        // Store the failed submission for later recovery
        $service->storeFailedSubmission($this->formData, $exception->getMessage());

        // Try to send a fallback email as a last resort
        $service->sendFallbackEmail($this->formData);

        // Send notification to admin about failed email
        try {
            Mail::raw(
                "A contact form submission failed to send after multiple attempts.\n\n" .
                "Name: {$this->formData['name']}\n" .
                "Email: {$this->formData['email']}\n" .
                "Subject: {$this->formData['subject']}\n" .
                "Error: {$exception->getMessage()}\n\n" .
                "Please check the logs and contact form submissions table for more information.",
                function ($message) {
                    $message->to($this->adminEmail)
                            ->subject('ALERT: Contact Form Email Failed');
                }
            );
        } catch (Exception $e) {
            Log::error('Failed to send admin alert about failed contact form', [
                'error' => $e->getMessage(),
            ]);
        }
    }
}
