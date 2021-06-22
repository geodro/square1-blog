<?php

namespace App\Console;

use App\Console\Commands\Import;
use App\Console\Commands\Init;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        Init::class,
        Import::class
    ];

    protected function schedule(Schedule $schedule): void
    {
         $schedule->command('square1:import')->hourly();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
