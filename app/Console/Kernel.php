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

        $schedule->call(function () {
            \App\Http\Controllers\MathVerificationController::sendDailyTrafficReport();
        })->dailyAt('20:00')->timezone('America/Denver'); // 8pm MST
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
