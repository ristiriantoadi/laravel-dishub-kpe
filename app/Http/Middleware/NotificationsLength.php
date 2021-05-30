<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Auth;

if (file_exists("app/Helpers/Helper.php")){
    include "app/Helpers/Helper.php";
}

class NotificationsLength
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
     
        View::share('sk_expired_notif_length', 0);
        View::share('kartu_expired_notif_length', 0);
        
        if (Auth::check()) {
            $kendaraans_sk_expired_notifications_length = count(get_unread_notifications("App\Notifications\SkExpired"));
            $kendaraans_kartu_expired_notifications_length = count(get_unread_notifications("App\Notifications\KartuExpired"));

            View::share('sk_expired_notif_length', $kendaraans_sk_expired_notifications_length);
            View::share('kartu_expired_notif_length', $kendaraans_kartu_expired_notifications_length);
        }
        
        return $next($request);
    }
}
