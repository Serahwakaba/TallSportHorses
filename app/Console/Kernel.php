<?php

namespace App\Console;

use App\Console\Commands\CheckExpiredAds;
use App\Jobs\SendAdvertiserAlertEmailJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(CheckExpiredAds::class)->hourly();

        $schedule->job(new SendAdvertiserAlertEmailJob)->monthlyOn(14);
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
