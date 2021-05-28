<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // error_log("boot is called");
        // View::share('sk_expired_notif_length', 0);
        // View::share('kartu_expired_notif_length', 0);
        // if (Auth::check()) {
        //     // Auth::user();
        //     error_log("user logged in");
        //     $kendaraans_sk_expired_notifications_length = count(get_notifications("App\Notifications\SkExpired"));
        //     $kendaraans_kartu_expired_notifications_length = count(get_notifications("App\Notifications\KartuExpired"));

        //     View::share('sk_expired_notif_length', $kendaraans_sk_expired_notifications_length);
        //     View::share('kartu_expired_notif_length', $kendaraans_kartu_expired_notifications_length);
        // }
    }
}
