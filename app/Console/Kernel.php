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
        // $schedule->command('inspire')->hourly();
        $schedule->command('emailer:send-weekly')->weeklyOn(1, '8:00'); // Every Monday 8am

        // Daily visitor traffic report - 8pm MST
        $schedule->call(function () {
            \App\Http\Controllers\MathVerificationController::sendDailyTrafficReport();
        })->dailyAt('20:00')->timezone('America/Denver');
        
        // Weekly visitor statistics report - Sunday at 8pm MST
        $schedule->command('visitor:send-statistics-report')
            ->weeklyOn(0, '20:00') // Every Sunday at 8pm
            ->timezone('America/Denver');
        
        $schedule->command('visitor:send-weekly-report')
            ->weeklyOn(0, '20:00') // Every Sunday at 8pm
            ->timezone('America/Denver');
            
        // Monthly visitor statistics report - 30th of each month at 8pm MST
        $schedule->command('visitor:send-monthly-report')
            ->monthlyOn(30, '20:00')
            ->timezone('America/Denver');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
