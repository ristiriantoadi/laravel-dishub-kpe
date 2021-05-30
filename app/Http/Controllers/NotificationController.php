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
            // REMEMBER: it have to be in THIS order
            check_status_kartu($kendaraan);
            check_status_sk($kendaraan);
            
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
                if(strtolower($kendaraan->namaperusahaan) == strtolower($keyword)){
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
                if(strtolower($kendaraan->namaperusahaan) == strtolower($keyword)){
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

        if($type_notification == "App\Notifications\KartuExpired"){
            return view('expired/kartu_expired',$data);
        }else{
            return view('expired/sk_expired',$data);
        }
    }

    public function exportExcel(Request $request){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}
