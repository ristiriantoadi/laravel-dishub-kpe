<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Kendaraan;
use App\Notifications\KartuExpired;
use App\Notifications\SkExpired;
use Illuminate\Support\Facades\View;

class NotificationController extends Controller
{
    public function index(Request $request)
    {        
        return "Hello World";
    }

    public function kartuExpired(Request $request)
    {
        $kendaraans = get_notifications("App\Notifications\KartuExpired");
        // count(get_unread_notifications("App\Notifications\KartuExpired"));
        // View::share('key', 'value');

        // $kendaraans_sk_expired_notifications_length = count(get_unread_notifications("App\Notifications\SkExpired"));
        // $kendaraans_kartu_expired_notifications_length = count(get_unread_notifications("App\Notifications\KartuExpired"));
        $kendaraans_kartu_expired_notifications_length = 0;

        // View::share('sk_expired_notif_length', $kendaraans_sk_expired_notifications_length);
        // View::share('kartu_expired_notif_length', $kendaraans_kartu_expired_notifications_length);

        return view('expired/kartu_expired',['kendaraans' => $kendaraans,'kartu_expired_notif_length' => $kendaraans_kartu_expired_notifications_length]);
    }

    public function skExpired(Request $request){        
        $kendaraans = get_notifications("App\Notifications\SkExpired");

        // $kendaraans_sk_expired_notifications_length = count(get_unread_notifications("App\Notifications\SkExpired"));
        $kendaraans_sk_expired_notifications_length = 0;
        // $kendaraans_kartu_expired_notifications_length = count(get_unread_notifications("App\Notifications\KartuExpired"));

        // View::share('sk_expired_notif_length', $kendaraans_sk_expired_notifications_length);
        // View::share('kartu_expired_notif_length', $kendaraans_kartu_expired_notifications_length);

        return view('expired/sk_expired',['kendaraans' => $kendaraans,'sk_expired_notif_length'=> $kendaraans_sk_expired_notifications_length]);
    }

    public function testNotif(Request $request){        
        
        $kendaraan = Kendaraan::find(2048);

        $user = Auth::user();
        $user->notify(new SkExpired($kendaraan));
    }

    public function parameterMethod(Request $request, $key){
        return "key: ".$key;
    }


}
