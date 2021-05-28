<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Kendaraan;
use App\Notifications\KartuExpired;
use App\Notifications\SkExpired;


class NotificationController extends Controller
{
    public function index(Request $request)
    {        
        return "Hello World";
    }

    public function kartuExpired(Request $request)
    {
        $kendaraans = get_notifications("App\Notifications\KartuExpired");
        return view('expired/kartu_expired',['kendaraans' => $kendaraans]);
    }

    public function skExpired(Request $request){        
        $kendaraans = get_notifications("App\Notifications\SkExpired");
        return view('expired/sk_expired',['kendaraans' => $kendaraans]);
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
