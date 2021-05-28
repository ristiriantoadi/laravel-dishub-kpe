<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    // public function __construct()
    // {
    //     // $this->user = \Auth::user();
    //     // view()->share('user', $this->user);
        
    //     // View::share('key', 'value');
    //     error_log("abc");
    //     View::share('sk_expired_notif_length', 0);
    //     View::share('kartu_expired_notif_length', 0);
    //     if (Auth::check()) {
    //         // Auth::user();
    //         error_log("user logged in");
    //         $kendaraans_sk_expired_notifications_length = count(get_notifications("App\Notifications\SkExpired"));
    //         $kendaraans_kartu_expired_notifications_length = count(get_notifications("App\Notifications\KartuExpired"));

    //         View::share('sk_expired_notif_length', $kendaraans_sk_expired_notifications_length);
    //         View::share('kartu_expired_notif_length', $kendaraans_kartu_expired_notifications_length);
    //     }
    // }

}
