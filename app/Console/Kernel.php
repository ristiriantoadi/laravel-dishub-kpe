<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Kendaraan;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        
        //check for expiration status change, and adding notifications
        $schedule->call(function () {
            // DB::table('recent_users')->delete();
            // error_log("job is running");
            $kendaraans = Kendaraan::all();
            foreach ($kendaraans as $kendaraan) {
                // code to be executed;
                check_status_sk($kendaraan);
                check_status_kartu($kendaraan);
            } 
        })->daily();

    }   

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
