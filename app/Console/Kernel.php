<?php

namespace App\Console;

use App\Models\Reservation;
use App\Jobs\SendReservationReminder;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    // protected function schedule(Schedule $schedule): void
    // {
    //     // $schedule->command('inspire')->hourly();
    // }

    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $oneWeekBefore = now()->addWeek();
            $reservations = Reservation::whereHas('liste', function ($query) use ($oneWeekBefore) {
                $query->where('dateBirth', '=', $oneWeekBefore->format('d/m/Y'));
            })->get();

            foreach ($reservations as $reservation) {
                SendReservationReminder::dispatch($reservation);
            }
        })->daily();
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
