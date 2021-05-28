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
        // $user = Auth::user();
        // $kendaraans = [];
        // foreach ($user->notifications as $notification) {
        //     if($notification->type == "App\Notifications\KartuExpired"){
        //         //get kendaraan
        //         $id_kendaraan = $notification->data["kendaraan_id"];
        //         $kendaraan = Kendaraan::find($id_kendaraan);
        //         array_push($kendaraans,$kendaraan);
        //     }
        // }        
        $kendaraans = get_notifications("App\Notifications\KartuExpired");
        return view('expired/kartu_expired',['kendaraans' => $kendaraans]);
    }

    public function skExpired(Request $request){        
        // return "sk expired";
        $kendaraans = get_notifications("App\Notifications\SkExpired");
        return view('expired/sk_expired',['kendaraans' => $kendaraans]);
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
