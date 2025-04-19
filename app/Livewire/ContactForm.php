<?php

namespace App\Livewire;

use App\Jobs\SendContactEmails;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Throwable;
use Illuminate\Validation\ValidationException;

class ContactForm extends Component
{
    #[Rule('required|min:2|max:100')]
    public $name = '';

    #[Rule('required|email|max:100')]
    public $email = '';

    #[Rule('required|min:3|max:100')]
    public $subject = '';

    #[Rule('required|min:10|max:1000')]
    public $message = '';

    public $successMessage = false;
    public $errorMessage = false;
    public $errorDetails = null;
    public $errorData = null;
    public $loading = false;
    public $submissionAttempts = 0;
    public $maxAttempts = 3;

    public function submit()
    {
        // Track submission attempts
        $this->submissionAttempts++;

        $this->loading = true;
        $this->errorMessage = false;
        $this->successMessage = false;
        $this->errorDetails = null;
        $this->errorData = null;

        try {
            // Validate the form inputs
            $validated = $this->validate();

            // Add timestamp and other helpful metadata
            $validated['submitted_at'] = now();
            $validated['ip_address'] = request()->ip();
            $validated['user_agent'] = substr(request()->userAgent(), 0, 500);
            $validated['attempt'] = $this->submissionAttempts;

            // Check for spam patterns
            if ($this->detectSpam($validated)) {
                // Throw a generic error to avoid revealing spam detection logic
                throw new Exception('Your message has been flagged. Please try again later.');
            }

            // Check mail connectivity with graceful fallback
            $mailServerAvailable = true;
            try {
                $this->checkMailConnection();
            } catch (Exception $mailException) {
                // Log the mail server issue
                Log::warning('Mail server connection issue', [
                    'error' => $mailException->getMessage(),
                    'form_data' => array_intersect_key($validated, array_flip(['name', 'email', 'subject'])),
                ]);

                // Save for retry later but don't fail the form submission
                $mailServerAvailable = false;
            }

            // Pre-sanitize input data
            $validated = $this->sanitizeData($validated);

            // Always store the submission in the database
            // Generate a UUID for the submission id
            $uuid = (string) Str::uuid();

            try {
                // Check if the table exists before attempting to insert
                if (DB::getSchemaBuilder()->hasTable('contact_form_submissions')) {
                    DB::table('contact_form_submissions')->insert([
                        'id' => $uuid,
                        'name' => $validated['name'],
                        'email' => $validated['email'],
                        'subject' => $validated['subject'],
                        'message' => $validated['message'],
                        'status' => $mailServerAvailable ? 'pending' : 'queued_for_retry',
                        'ip_address' => $validated['ip_address'],
                        'user_agent' => $validated['user_agent'],
                        'metadata' => json_encode(['attempt' => $validated['attempt']]),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } else {
                    // Table doesn't exist yet, just log it
                    Log::info('Contact form submission not stored - table does not exist', [
                        'email' => $validated['email'],
                    ]);
                }
            } catch (Exception $dbException) {
                // Log database error but don't expose to user
                Log::error('Failed to record contact submission', [
                    'error' => $dbException->getMessage(),
                    'trace' => $dbException->getTraceAsString(),
                ]);
                // Continue processing without failing the form
            }

            // Only dispatch mail job if the server is available
            if ($mailServerAvailable) {
                if (app()->environment('local', 'development', 'testing') && config('app.debug')) {
                    // Process synchronously in development for easier testing
                    Log::info('Processing email synchronously in development mode');
                    try {
                        (new SendContactEmails($validated))->handle();
                    } catch (Exception $emailException) {
                        Log::error('Error sending email synchronously', [
                            'error' => $emailException->getMessage(),
                            'trace' => $emailException->getTraceAsString()
                        ]);
                        // Don't throw the exception to the user
                    }
                } else {
                    // Use queue in production
                    SendContactEmails::dispatch($validated)
                        ->onQueue('emails');
                }
            }

            // Reset the form
            $this->reset(['name', 'email', 'subject', 'message']);
            $this->submissionAttempts = 0;
            $this->resetErrorData();

            // Show success message
            $this->successMessage = true;

            // Hide success message after some time and reset the form in UI
            $this->dispatch('showSuccessMessage');
            $this->dispatch('formReset');

        } catch (\Illuminate\Validation\ValidationException $validationException) {
            // Handle validation errors gracefully
            $this->errorMessage = true;
            $this->errorDetails = 'Please check your form inputs and try again.';

            // Log validation errors
            Log::info('Contact form validation failed', [
                'errors' => $validationException->validator->errors()->toArray(),
                'ip' => request()->ip(),
            ]);

            // Better error data for debugging
            if (app()->environment('local', 'development', 'testing')) {
                $this->errorData = [
                    'error_type' => get_class($validationException),
                    'validation_errors' => $validationException->validator->errors()->toArray(),
                    'attempt' => $this->submissionAttempts,
                    'time' => now()->toDateTimeString(),
                ];
            }

            $this->dispatch('showErrorMessage', [
                'message' => $this->errorDetails
            ]);

        } catch (Exception $e) {
            // Log the error with detailed information
            Log::error('Error submitting contact form', [
                'error' => $e->getMessage(),
                'user_email' => $this->email,
                'attempts' => $this->submissionAttempts,
                'trace' => $e->getTraceAsString(),
                'ip' => request()->ip(),
            ]);

            // Set error message and details
            $this->errorMessage = true;
            $this->errorDetails = $this->getReadableErrorMessage($e);

            // Store technical error data for debugging but only expose in development
            if (app()->environment('local', 'development', 'testing')) {
                $this->errorData = [
                    'error_type' => get_class($e),
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'attempt' => $this->submissionAttempts,
                    'time' => now()->toDateTimeString(),
                ];
            } else {
                // In production, only provide minimal, non-technical information
                $this->errorData = [
                    'message' => 'Contact form submission encountered an issue',
                    'attempt' => $this->submissionAttempts,
                    'time' => now()->toDateTimeString(),
                ];
            }

            // Dispatch event to hide error message after some time
            $this->dispatch('showErrorMessage', [
                'message' => $this->errorDetails
            ]);

            // Track submission attempts - if exceeds max, take action
            if ($this->submissionAttempts >= $this->maxAttempts) {
                $this->handleMaxAttemptsReached($e);
            }
        } finally {
            // Always turn off loading state
            $this->loading = false;
        }
    }

    /**
     * Convert exception to readable error message
     */
    protected function getReadableErrorMessage(Exception $e): string
    {
        // In production, we want to show only user-friendly messages
        if (!app()->environment('local', 'development', 'testing')) {
            $message = $e->getMessage();

            // Spam detection - generic message
            if (stripos($message, 'spam') !== false || stripos($message, 'flagged') !== false) {
                return "Your message couldn't be sent. Please review the content and try again.";
            }

            // Database errors - don't expose details
            if (stripos($message, 'SQLSTATE') !== false) {
                return "We're experiencing some technical difficulties. Our team has been notified. Please try again later.";
            }

            // Mail server issues - friendly message
            if (stripos($message, 'mail') !== false ||
                stripos($message, 'connect') !== false ||
                stripos($message, 'smtp') !== false) {
                return "We're having trouble sending emails at the moment. Please try again later or contact us directly.";
            }

            // Default generic message for production
            return "Sorry, we couldn't send your message. Please try again or use the direct email link provided.";
        }

        // For development environments, provide more detailed messages
        $message = $e->getMessage();
        $code = $e->getCode();

        // Check for user-facing exceptions (with code >= 1000)
        if ($code >= 1000) {
            return $message; // Already formatted for user display
        }

        // Spam detection
        if (stripos($message, 'spam') !== false) {
            return "Your message appears to contain content flagged by our system. Please review and try again.";
        }

        // Check if it's a validation error
        if (strpos($message, 'validation.') !== false) {
            return 'Please check your form inputs and try again.';
        }

        // Check for connection errors
        if (strpos($message, 'Connection') !== false ||
            strpos($message, 'timeout') !== false ||
            strpos($message, 'refused') !== false) {
            return 'There was a problem connecting to our mail server. Please try again later or contact us directly.';
        }

        // Check for rate limiting
        if (strpos($message, 'rate') !== false ||
            strpos($message, 'limit') !== false ||
            strpos($message, 'throttle') !== false) {
            return 'Too many messages sent recently. Please wait a few minutes before trying again.';
        }

        // Server-side configuration issues
        if (strpos($message, 'configuration') !== false ||
            strpos($message, 'config') !== false) {
            return 'There is a technical issue with our contact system. Our team has been notified. Please try using the direct email link.';
        }

        // Default error message
        return 'An unexpected error occurred while sending your message. Please try again or contact us directly.';
    }

    /**
     * Check for spam indicators in the message
     */
    protected function detectSpam(array $data): bool
    {
        // Simple spam detection - check for too many links
        $linkCount = substr_count(strtolower($data['message']), 'http');
        if ($linkCount > 3) {
            return true;
        }

        // Check for common spam phrases
        $spamPhrases = [
            'viagra', 'cialis', 'casino', 'lottery', 'winner',
            'crypto investment', 'binary options', 'make money fast'
        ];

        foreach ($spamPhrases as $phrase) {
            if (stripos($data['message'] . ' ' . $data['subject'], $phrase) !== false) {
                return true;
            }
        }

        // Rate limiting - check for too many submissions from same IP
        try {
            // First check if the table exists to avoid errors
            if (DB::getSchemaBuilder()->hasTable('contact_form_submissions')) {
                $recentAttempts = DB::table('contact_form_submissions')
                    ->where('ip_address', request()->ip())
                    ->where('created_at', '>', now()->subHour())
                    ->count();

                if ($recentAttempts > 5) {
                    return true;
                }
            }
        } catch (Exception $e) {
            // If DB check fails, log but don't block the message
            Log::warning('Failed to check rate limiting for contact form', [
                'error' => $e->getMessage()
            ]);
        }

        return false;
    }

    /**
     * Sanitize input data before processing
     */
    protected function sanitizeData(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                // Remove potentially harmful HTML
                $data[$key] = strip_tags($value);

                // Convert HTML entities
                $data[$key] = htmlspecialchars($data[$key], ENT_QUOTES | ENT_HTML5, 'UTF-8');

                // Trim excessive whitespace
                $data[$key] = preg_replace('/\s+/', ' ', $data[$key]);
                $data[$key] = trim($data[$key]);

                // Limit length of strings to prevent DOS
                if ($key === 'message' && strlen($data[$key]) > 2000) {
                    $data[$key] = substr($data[$key], 0, 2000);
                } elseif ($key !== 'message' && strlen($data[$key]) > 255) {
                    $data[$key] = substr($data[$key], 0, 255);
                }
            }
        }

        return $data;
    }

    /**
     * Verify mail connection before sending
     */
    protected function checkMailConnection(): void
    {
        // Check if mail configuration is valid
        $mailer = config('mail.default');
        $host = config('mail.mailers.smtp.host');
        $port = config('mail.mailers.smtp.port');

        if (empty($mailer) || empty($host) || empty($port)) {
            throw new Exception('Mail configuration is incomplete.');
        }

        // If using SMTP, also check username and password
        if ($mailer === 'smtp') {
            $username = config('mail.mailers.smtp.username');
            $password = config('mail.mailers.smtp.password');

            if (empty($username) || empty($password)) {
                throw new Exception('SMTP credentials are missing or incomplete.');
            }
        }

        // Skip actual connection check in local/development environment
        if (app()->environment('local', 'development', 'testing')) {
            return;
        }

        // For SMTP connections, you could try to verify the connection
        if ($mailer === 'smtp') {
            // Check if we can connect to the mail server
            // This is a simple check, in production you might want to use a more robust solution
            $connection = @fsockopen($host, $port, $errno, $errstr, 5);
            if (!$connection) {
                throw new Exception("Cannot connect to mail server: $errstr ($errno)");
            }
            fclose($connection);
        }
    }

    /**
     * Handle when user has reached max attempts
     */
    protected function handleMaxAttemptsReached(Exception $originalException): void
    {
        // Log the repeated attempts
        Log::warning('User reached maximum contact form submission attempts', [
            'email' => $this->email,
            'ip' => request()->ip(),
            'attempts' => $this->submissionAttempts,
            'original_error' => $originalException->getMessage()
        ]);

        // Store in database for admin review
        try {
            // Check if the table exists before attempting to insert
            if (DB::getSchemaBuilder()->hasTable('contact_form_submissions')) {
                DB::table('contact_form_submissions')->insert([
                    'id' => (string) Str::uuid(),
                    'name' => $this->name,
                    'email' => $this->email,
                    'subject' => $this->subject,
                    'message' => $this->message,
                    'status' => 'max_attempts_reached',
                    'ip_address' => request()->ip(),
                    'user_agent' => substr(request()->userAgent(), 0, 500),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                Log::warning('Could not record max attempts - contact_form_submissions table does not exist');
            }
        } catch (Exception $e) {
            Log::error('Failed to record max attempts submission', [
                'error' => $e->getMessage()
            ]);
        }

        // Update the error message to inform the user
        $this->errorDetails = "We're having trouble processing your request. Please try again later or contact us directly via email.";
    }

    /**
     * Reset the form and clear messages
     */
    public function resetForm()
    {
        $this->reset(['name', 'email', 'subject', 'message', 'successMessage', 'errorMessage', 'errorDetails', 'errorData']);
    }

    /**
     * Reset error data
     */
    public function resetErrorData()
    {
        $this->errorMessage = false;
        $this->errorDetails = null;
        $this->errorData = null;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
