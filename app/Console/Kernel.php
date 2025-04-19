<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Schedule the command to retry failed contact submissions daily
        $schedule->command('contact:retry-failed')
                 ->daily()
                 ->at('01:00')
                 ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        // Register the resume generation command to run daily
        $this->commands([
            \App\Console\Commands\RetryFailedContactSubmissions::class,
            \App\Console\Commands\GenerateResumePdf::class,
        ]);

        require base_path('routes/console.php');
    }
}
