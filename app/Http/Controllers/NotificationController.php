<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Kendaraan;
use App\User;
use App\Notifications\KartuExpired;
use App\Notifications\SkExpired;
use App\Exports\KartuExpiredExport;
use App\Exports\SkExpiredExport;
use Illuminate\Support\Facades\View;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

if (file_exists("app/Helpers/Helper.php")){
    include "app/Helpers/Helper.php";
}
// use App\Helpers\Helper;

// helper functions
// function update_status($expired_date){
//     $current_date = time();
//     $datediff = $expired_date - $current_date;
//     $datediff = round($datediff / (60 * 60 * 24));
    
//     if($datediff<0){
//         return "expired";
//     }
//     else if($datediff<=30){
//         return "menjelang_expired";
//     }
//     else{
//         return "belum_expired";
//     }
// }

// function notification($old_status,$current_status,$type,$kendaraan){
//     // $user = Auth::user();
//     $users = User::all();
//     if($old_status == "belum_expired"){
//         if($current_status != "belum_expired"){
//             //add notifications
//             foreach ($users as $user) {
//                 if($type == "App\Notifications\SkExpired"){
//                     $user->notify(new SkExpired($kendaraan));
//                 }else{
//                     $user->notify(new KartuExpired($kendaraan));
//                 }
//             }
//         }
//     }
//     else{
//         if($current_status == "belum_expired"){
//             // remove_from_notification(record) / remove notifications / delete notifications
//             foreach ($users as $user) {
//                 foreach ($user->notifications as $notification) {
//                     if($notification->type == $type){
//                         $id_kendaraan =  $notification->data["kendaraan_id"];
//                         if ($kendaraan->id == $id_kendaraan){
//                             $user->notifications()->where('id', $notification->id)->get()->first()->delete();
//                             break;
//                         // return;
//                         }
//                     }
//                 }
//             }
//         }
//     }
// }

// function check_status_sk($kendaraan){
//     if($kendaraan->tglakhirsk){
//         $old_status=$kendaraan->status_sk;
//         $kendaraan->status_sk=update_status(strtotime($kendaraan->tglakhirsk));
//         $kendaraan->save();

//         $current_status = $kendaraan->status_sk;
//         notification($old_status,$current_status,"App\Notifications\SkExpired",$kendaraan);
//     }
// }

// function check_status_kartu($kendaraan){
//     if($kendaraan->masaberlaku){
//         $old_status = $kendaraan->status_kartu;
//         $kendaraan->status_kartu=update_status(strtotime($kendaraan->masaberlaku));
//         $kendaraan->save();

//         $current_status = $kendaraan->status_kartu;
//         notification($old_status,$current_status,"App\Notifications\KartuExpired",$kendaraan);
//     }
// }

// function get_notifications($type){
//     $user = Auth::user();
//     $kendaraans = [];
//     foreach ($user->notifications as $notification) {
//         if($notification->type == $type){
//             //get kendaraan
//             $id_kendaraan = $notification->data["kendaraan_id"];
//             $kendaraan = Kendaraan::find($id_kendaraan);
//             array_push($kendaraans,$kendaraan);
        
//             $notification->markAsRead();
//         }
//         if($notification->data["kendaraan_id"] == 2051){
//             error_log("notification: ".$notification);
//         }
//     }
//     return $kendaraans;        
// }

// function get_unread_notifications($type){
//     $user = Auth::user();
//     $kendaraans = [];
//     foreach ($user->unreadNotifications as $notification) {
//         if($notification->type == $type){
//             //get kendaraan
//             $id_kendaraan = $notification->data["kendaraan_id"];
//             $kendaraan = Kendaraan::find($id_kendaraan);
//             array_push($kendaraans,$kendaraan);
//         }
//     }
//     return $kendaraans;        
// }

class NotificationController extends Controller
{

    public function index(Request $request)
    {        
        return "Hello World";
    }

    public function kartuExpired(Request $request)
    {
        $kendaraans = get_notifications("App\Notifications\KartuExpired",null);
        $kendaraans_kartu_expired_notifications_length = 0;

        $kendaraans = paginate($kendaraans);
        $kendaraans->withPath('');

        return view('expired/kartu_expired',['kendaraans' => $kendaraans,'kartu_expired_notif_length' => $kendaraans_kartu_expired_notifications_length,'url'=>'/expired/kartu/cari','url_export'=>'/expired/kartu/export']);
    }

    public function skExpired(Request $request){        
        $kendaraans = get_notifications("App\Notifications\SkExpired",null);
        $kendaraans_sk_expired_notifications_length = 0;

        $kendaraans = paginate($kendaraans);
        $kendaraans->withPath('');
       
        return view('expired/sk_expired',['kendaraans' => $kendaraans,'sk_expired_notif_length'=> $kendaraans_sk_expired_notifications_length,'url'=>'/expired/sk/cari','url_export'=>'/expired/sk/export']);
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
    }

    public function exportExpired(Request $request,$type){
        if($type == "kartu"){
            $type = "App\Notifications\KartuExpired";
        }else{
            $type = "App\Notifications\SkExpired";
        }

        $tanggal=null;
        if($request->has('tanggal')){
            $tanggal = $request->tanggal;
        }
        $kendaraans = get_notifications($type,$tanggal);

        //search by kendaraan fields
        if($request->has('keyword')){
            $keyword = $request->keyword;
            $kendaraans=array_filter($kendaraans,function($kendaraan) use ($keyword){
                //search by nomesin, nopol, or namaperusahaan.
                if($kendaraan->nomesin == $keyword){
                    return true;
                }
                if($kendaraan->nopol == $keyword){
                    return true;
                }
                if($kendaraan->namaperusahaan == $keyword){
                    return true;
                }
                return false;
            });
        }

        if($type == "App\Notifications\KartuExpired"){
            $export = new KartuExpiredExport($kendaraans);    
            return Excel::download($export, 'Kartu Expired.xlsx');
        }else{
            $export = new SkExpiredExport($kendaraans);
            return Excel::download($export, 'SK Expired.xlsx');
        }
    }

    //cari expired / expire cari / expired cari
    public function cariExpired(Request $request,$type)
    {
        error_log("url: ".$request->fullUrl());
        if(count(explode("?",$request->fullUrl())) == 2){
            $queryString=explode("?",$request->fullUrl())[1];
            error_log("query string: ".$queryString);
        }
        if($type == "kartu"){
            $type_notification = "App\Notifications\KartuExpired";
        }else{
            $type_notification = "App\Notifications\SkExpired";
        }

        //get by tanggal
        $tanggal=null;
        if($request->has('tanggal')){
            $tanggal = $request->tanggal;
        }
        $kendaraans = get_notifications($type_notification,$tanggal);

        //search by kendaraan fields
        $keyword=null;
        if($request->has('keyword')){
            $keyword = $request->keyword;
            $kendaraans=array_filter($kendaraans,function($kendaraan) use ($keyword){
                //search by nomesin, nopol, or namaperusahaan.
                if($kendaraan->nomesin == $keyword){
                    return true;
                }
                if($kendaraan->nopol == $keyword){
                    return true;
                }
                if($kendaraan->namaperusahaan == $keyword){
                    return true;
                }
                return false;
            });
        }
        
        $kendaraans = paginate($kendaraans);
        $kendaraans->withPath('');

        $data = ['kendaraans' => $kendaraans,'keyword'=>$keyword,'tanggalPencarian'=>$tanggal,'url'=>'/expired/'.$type.'/cari','url_export'=>'/expired/'.$type.'/export'];
        
        if(isset($queryString)){
            $data['url_export'] .= "?".$queryString;
        }

        // $getParameters=[];
        // if($request->has('tanggal')){
        //     // $tanggal = $request->tanggal;
        //     // $data['']
        //     $getParameters['tanggal']=$request->tanggal;
        // }
        // if($request->has('keyword')){
        //     // $tanggal = $request->tanggal;
        //     // $data['']
        //     $getParameters['keyword']=$request->keyword;
        // }
        // $data['getParameters'] = $getParameters;
        // error_log("data: ".$data->getParameters);
        if($type_notification == "App\Notifications\KartuExpired"){
            // $data['url'] = "/expired/".$type."/cari";
            return view('expired/kartu_expired',$data);
        }else{
            // $data['url'] = '/expired/sk/cari';
            // $data['url_export'] = 
            return view('expired/sk_expired',$data);
        }
    }

    public function exportExcel(Request $request){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}
