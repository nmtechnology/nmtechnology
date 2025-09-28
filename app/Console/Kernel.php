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

        // Visitor statistics reports
        $schedule->call(function () {
            \App\Http\Controllers\MathVerificationController::sendDailyTrafficReport();
        })->dailyAt('20:00')->timezone('America/Denver'); // 8pm MST daily
        
        $schedule->command('visitor:send-weekly-report')
            ->weeklyOn(1, '9:00') // Every Monday at 9am
            ->timezone('America/Denver');
            
        $schedule->command('visitor:send-monthly-report')
            ->monthlyOn(1, '10:00') // 1st day of month at 10am
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
