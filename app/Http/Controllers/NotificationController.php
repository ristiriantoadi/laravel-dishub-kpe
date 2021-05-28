<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Kendaraan;
use App\Notifications\KartuExpired;
use App\Notifications\SkExpired;
use Illuminate\Support\Facades\View;
// use App\Helpers\Helper;

// helper functions
function update_status($expired_date){
    $current_date = time();
    $datediff = $expired_date - $current_date;
    $datediff = round($datediff / (60 * 60 * 24));
    
    if($datediff<0){
        return "expired";
    }
    else if($datediff<=30){
        return "menjelang_expired";
    }
    else{
        return "belum_expired";
    }
}

function notification($old_status,$current_status,$type,$kendaraan){
    // $user = Auth::user();
    $users = User::all();
    if($old_status == "belum_expired"){
        if($current_status != "belum_expired"){
            //add notifications
            foreach ($users as $user) {
                if($type == "App\Notifications\SkExpired"){
                    $user->notify(new SkExpired($kendaraan));
                }else{
                    $user->notify(new KartuExpired($kendaraan));
                }
            }
        }
    }
    else{
        if($current_status == "belum_expired"){
            // remove_from_notification(record) / remove notifications / delete notifications
            foreach ($users as $user) {
                foreach ($user->notifications as $notification) {
                    if($notification->type == $type){
                        $id_kendaraan =  $notification->data["kendaraan_id"];
                        if ($kendaraan->id == $id_kendaraan){
                            $user->notifications()->where('id', $notification->id)->get()->first()->delete();
                            break;
                        // return;
                        }
                    }
                }
            }
        }
    }
}

function check_status_sk($kendaraan){
    if($kendaraan->tglakhirsk){
        $old_status=$kendaraan->status_sk;
        $kendaraan->status_sk=update_status(strtotime($kendaraan->tglakhirsk));
        $kendaraan->save();

        $current_status = $kendaraan->status_sk;
        notification($old_status,$current_status,"App\Notifications\SkExpired",$kendaraan);
    }
}

function check_status_kartu($kendaraan){
    if($kendaraan->masaberlaku){
        $old_status = $kendaraan->status_kartu;
        $kendaraan->status_kartu=update_status(strtotime($kendaraan->masaberlaku));
        $kendaraan->save();

        $current_status = $kendaraan->status_kartu;
        notification($old_status,$current_status,"App\Notifications\KartuExpired",$kendaraan);
    }
}

function get_notifications($type){
    $user = Auth::user();
    $kendaraans = [];
    foreach ($user->notifications as $notification) {
        if($notification->type == $type){
            //get kendaraan
            $id_kendaraan = $notification->data["kendaraan_id"];
            $kendaraan = Kendaraan::find($id_kendaraan);
            array_push($kendaraans,$kendaraan);
        
            $notification->markAsRead();
        }
        if($notification->data["kendaraan_id"] == 2051){
            error_log("notification: ".$notification);
        }
    }
    return $kendaraans;        
}

function get_unread_notifications($type){
    $user = Auth::user();
    $kendaraans = [];
    foreach ($user->unreadNotifications as $notification) {
        if($notification->type == $type){
            //get kendaraan
            $id_kendaraan = $notification->data["kendaraan_id"];
            $kendaraan = Kendaraan::find($id_kendaraan);
            array_push($kendaraans,$kendaraan);
        }
    }
    return $kendaraans;        
}

class NotificationController extends Controller
{

    public function index(Request $request)
    {        
        return "Hello World";
    }

    public function kartuExpired(Request $request)
    {
        $kendaraans = get_notifications("App\Notifications\KartuExpired");
        $kendaraans_kartu_expired_notifications_length = 0;


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

    public function checkExpired(Request $request)
    {
        $kendaraans = Kendaraan::all();
        foreach ($kendaraans as $kendaraan) {
            // code to be executed;
            check_status_sk($kendaraan);
            check_status_kartu($kendaraan);
        }
        return "ok";
        // $kendaraans = get_notifications("App\Notifications\KartuExpired");
        // $kendaraans_kartu_expired_notifications_length = 0;


        // return view('expired/kartu_expired',['kendaraans' => $kendaraans,'kartu_expired_notif_length' => $kendaraans_kartu_expired_notifications_length]);
    }

}
