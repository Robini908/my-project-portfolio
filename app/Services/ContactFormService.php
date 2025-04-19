<?php

namespace App\Services;

use App\Models\FailedContactSubmission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ContactFormService
{
    /**
     * Store a failed contact submission in the database for later recovery.
     *
     * @param array $formData
     * @param string $errorMessage
     * @return bool
     */
    public function storeFailedSubmission(array $formData, string $errorMessage): bool
    {
        try {
            // Store the failed submission using the model
            FailedContactSubmission::create([
                'name' => $formData['name'] ?? 'Unknown',
                'email' => $formData['email'] ?? 'unknown@example.com',
                'subject' => $formData['subject'] ?? 'No Subject',
                'message' => $formData['message'] ?? 'No Message',
                'error' => $errorMessage,
                'attempted_at' => now(),
                'processed' => false,
            ]);

            Log::info('Failed contact submission stored successfully for later recovery');
            return true;
        } catch (\Exception $e) {
            Log::error('Error storing failed contact submission', [
                'error' => $e->getMessage(),
                'email' => $formData['email'] ?? 'unknown',
            ]);
            return false;
        }
    }

    /**
     * Send a simple fallback email using plain PHP mail function when all else fails.
     *
     * @param array $formData
     * @return bool
     */
    public function sendFallbackEmail(array $formData): bool
    {
        try {
            $adminEmail = config('mail.from.address', 'abrahamopuba@gmail.com');
            $subject = "FALLBACK: Contact Form Submission: {$formData['subject']}";

            // Prepare a simple text message
            $message = "FALLBACK CONTACT FORM SUBMISSION\n\n";
            $message .= "Name: {$formData['name']}\n";
            $message .= "Email: {$formData['email']}\n";
            $message .= "Subject: {$formData['subject']}\n";
            $message .= "Message:\n{$formData['message']}\n\n";
            $message .= "This is a fallback message sent when the primary email system failed.";

            // Set additional headers
            $headers = "From: {$formData['name']} <{$formData['email']}>\r\n";
            $headers .= "Reply-To: {$formData['email']}\r\n";

            // Attempt to send using PHP mail() function as a last resort
            if (mail($adminEmail, $subject, $message, $headers)) {
                Log::info('Fallback email sent successfully');
                return true;
            }

            Log::warning('Fallback email attempt failed');
            return false;
        } catch (\Exception $e) {
            Log::error('Error sending fallback email', [
                'error' => $e->getMessage(),
            ]);
            return false;
        }
    }

    /**
     * Create a migration for the failed_contact_submissions table if it doesn't exist
     *
     * @return void
     */
    public function ensureFailedSubmissionsTable(): void
    {
        if (!Schema::hasTable('failed_contact_submissions')) {
            Schema::create('failed_contact_submissions', function ($table) {
                $table->uuid('id')->primary();
                $table->string('name');
                $table->string('email');
                $table->string('subject');
                $table->text('message');
                $table->text('error')->nullable();
                $table->timestamp('attempted_at');
                $table->boolean('processed')->default(false);
                $table->timestamps();
            });

            Log::info('Created failed_contact_submissions table');
        }
    }
}
