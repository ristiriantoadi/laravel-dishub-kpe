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
        // return "kartu expired";
        return view('expired/kartu_expired');
    }

    public function skExpired(Request $request){        
        // return "sk expired";
        return view('expired/sk_expired');
    }

    public function testNotif(Request $request){        
        // return "sk expired";
        // return view('expired/sk_expired');
        
        $kendaraan = Kendaraan::find(2048);

        $user = Auth::user();
        $user->notify(new SkExpired($kendaraan));
    }

    public function parameterMethod(Request $request, $key){
        return "key: ".$key;
    }


}
