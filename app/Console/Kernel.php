<?php

namespace App\Console;

use App\Console\Commands\BackupDatabase;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected $commands = [
        // ... (other commands)
        BackupDatabase::class, // Add your custom command here
    ];

    protected function schedule(Schedule $schedule): void
    {    
        $schedule->command('backup:database')->hourly()->withoutOverlapping();
        //$schedule->command('backup:database')->everyThreeMinutes();
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
