<?php

namespace App\Console;

use App\Console\Commands\NouvelleAnneeScolaire;
use App\Console\Commands\PassageEleves;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(NouvelleAnneeScolaire::class)->yearlyOn(8)->daily()->sendOutputTo(__DIR__ . '/nouvelleAnneeSchedul.log');
        $schedule->command(PassageEleves::class)->yearlyOn(8)->daily()->sendOutputTo(__DIR__ . '/passageElevesSchedule.log');
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
