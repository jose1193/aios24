<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
  protected $commands = [
    \App\Console\Commands\RenewalNotifications::class,
    \App\Console\Commands\UpdatePlanStatus::class,
];
    protected function schedule(Schedule $schedule): void
    {
         $schedule->command('plan:update-status')->daily();
        // $schedule->command('inspire')->hourly();

    // Tarea para enviar el correo aviso de renovacion
        $schedule->command('notifications:renewal')->dailyAt('09:00');
              
        //$schedule->command('notifications:renewal')
            //->everyMinute();
    
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
