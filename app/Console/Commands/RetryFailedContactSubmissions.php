<?php

namespace App\Console\Commands;

use App\Jobs\SendContactEmails;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RetryFailedContactSubmissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:retry-failed {--all : Process all failed submissions, including previously processed ones}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retry sending failed contact form submissions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $processAll = $this->option('all');

        $query = DB::table('failed_contact_submissions');

        if (!$processAll) {
            $query->where('processed', false);
        }

        $failedSubmissions = $query->get();

        if ($failedSubmissions->isEmpty()) {
            $this->info('No failed submissions to process.');
            return 0;
        }

        $this->info("Found {$failedSubmissions->count()} failed submissions to process.");

        $bar = $this->output->createProgressBar($failedSubmissions->count());
        $bar->start();

        $successCount = 0;
        $failCount = 0;

        foreach ($failedSubmissions as $submission) {
            $this->processSubmission($submission, $successCount, $failCount);
            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);

        $this->info("Processed {$failedSubmissions->count()} failed submissions.");
        $this->info("Successfully reprocessed: {$successCount}");
        $this->info("Failed to reprocess: {$failCount}");

        return 0;
    }

    /**
     * Process a single failed submission.
     *
     * @param object $submission
     * @param int &$successCount
     * @param int &$failCount
     * @return void
     */
    private function processSubmission($submission, &$successCount, &$failCount): void
    {
        try {
            // Extract the form data from the submission
            $formData = [
                'name' => $submission->name,
                'email' => $submission->email,
                'subject' => $submission->subject,
                'message' => $submission->message,
            ];

            // Dispatch the job to send the emails
            SendContactEmails::dispatch($formData);

            // Mark the submission as processed
            DB::table('failed_contact_submissions')
                ->where('id', $submission->id)
                ->update([
                    'processed' => true,
                    'updated_at' => now(),
                ]);

            $successCount++;

            Log::info("Successfully reprocessed failed contact submission", [
                'id' => $submission->id,
                'email' => $submission->email,
            ]);
        } catch (\Exception $e) {
            $failCount++;

            Log::error("Error reprocessing failed contact submission", [
                'id' => $submission->id,
                'email' => $submission->email,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
