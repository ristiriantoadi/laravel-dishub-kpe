<?php

use App\Notifications\KartuExpired;
use App\Notifications\SkExpired;
use App\Kendaraan;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

if (!function_exists('upload_pdf')) {
    function upload_pdf($kendaraan,$berkasPdf){
        $savePath = "berkas_kendaraan/".$kendaraan->id;
        $filename = $berkasPdf->getClientOriginalName();
        Storage::disk('public')->put($savePath."/".$filename, file_get_contents($berkasPdf));
        // $berkasPdf->storeAs($savePath,$filename);
        $publicPathToFile = "/storage/"."berkas_kendaraan/".$kendaraan->id."/".$filename;
        $kendaraan->berkas_pdf = $publicPathToFile;
        $kendaraan->save();
    }
}

if (!function_exists('get_filename')) {
    function get_filename($path){
        return basename($path);
    }
}

if (!function_exists('days_diff')) {
    function days_diff($first_date,$second_date){
        $datediff = $first_date - $second_date;
        // $datediff = round($datediff / (60 * 60 * 24));
        $datediff = ceil($datediff / (60 * 60 * 24));
        return $datediff;
    }
}

if (!function_exists('search_fields')) {
    function search_fields($kendaraan){
        
    }
}

if (!function_exists('paginate')) {
    function paginate($items, $perPage = 15, $page = null, $options = []){

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}


if (!function_exists('update_status')) {
    function update_status($expired_date){ // change status
        $current_date = time();
        $datediff = days_diff($expired_date,$current_date);
        
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
}

if (!function_exists('update_status_on_specified_date')) {
    function update_status_on_specified_date($expired_date,$specified_date){ // change status
        $current_date = $specified_date;
        $datediff = days_diff($expired_date,$current_date);
        
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
}

if (!function_exists('delete_notifications')) {
    function delete_notifications($id_kendaraan,$type){
        $users = User::all();
        foreach ($users as $user) {
            foreach ($user->notifications as $notification) {
                if($notification->type == $type){
                    $notification_kendaraan_id =  $notification->data["kendaraan_id"];
                    if ($notification_kendaraan_id == $id_kendaraan){
                        $user->notifications()->where('id', $notification->id)->get()->first()->delete();
                        break;
                    }
                }
            }
        }
    }
}


if (!function_exists('notification')) {
    function notification($old_status,$current_status,$type,$kendaraan){
        
        $users = User::all();
        if($old_status == "belum_expired"){
            if($current_status != "belum_expired"){
                //add notifications
                foreach ($users as $user) {
                    if($type == "App\Notifications\SkExpired"){
                        $user->notify(new SkExpired($kendaraan));
                        //if sk_expired, that means kartu also expired
                        //to avoid redundancy in the notifications table, remove kartu_expired 
                        //notification
                        
                        //delete kartuExpired notif for EVERY USER, for this particular kendaraan
                        delete_notifications($kendaraan->id,"App\Notifications\KartuExpired");
                    }else{
                        $user->notify(new KartuExpired($kendaraan));
                    }
                }
            }
        }
        else{
            if($current_status == "belum_expired"){
                // remove_from_notification(record) / remove notifications / delete notifications
                delete_notifications($kendaraan->id,$type);
                // foreach ($users as $user) {
                //     foreach ($user->notifications as $notification) {
                //         if($notification->type == $type){
                //             $id_kendaraan =  $notification->data["kendaraan_id"];
                //             if ($kendaraan->id == $id_kendaraan){
                //                 $user->notifications()->where('id', $notification->id)->get()->first()->delete();
                //                 break;
                //             }
                //         }
                //     }
                // }
            }
        }
    }
}

if (!function_exists('check_status_sk')) {
    function check_status_sk($kendaraan){
        if($kendaraan->tglakhirsk){
            $old_status=$kendaraan->status_sk;
            $kendaraan->status_sk=update_status(strtotime($kendaraan->tglakhirsk));
            $kendaraan->save();

            $current_status = $kendaraan->status_sk;
            notification($old_status,$current_status,"App\Notifications\SkExpired",$kendaraan);
        }
    }
}
 
if (!function_exists('check_status_kartu')) {
    function check_status_kartu($kendaraan){
        if($kendaraan->masaberlaku){
            $old_status = $kendaraan->status_kartu;
            $kendaraan->status_kartu=update_status(strtotime($kendaraan->masaberlaku));
            $kendaraan->save();
    
            $current_status = $kendaraan->status_kartu;
            notification($old_status,$current_status,"App\Notifications\KartuExpired",$kendaraan);
        }
    }
}

if (!function_exists('get_table_row_number')) {
    function get_table_row_number($iteration,$perPage,$currentPage){
        return $perPage*($currentPage-1)+$iteration;
    }
}

if (!function_exists('get_notifications')) {
    function get_notifications($type,$tanggal=null){
        $user = Auth::user();
        $kendaraans = [];
        if($tanggal){
            // get all kendaraans and change its status based on the $tanggal, but dont save to database 
            $kendaraans_object =  Kendaraan::all()->sortByDesc("id");
            
            foreach($kendaraans_object as $kendaraan){ 
                $status_kendaraan=null;
                if($type == "App\Notifications\KartuExpired"){
                    //change status_kartu
                    if($kendaraan->masaberlaku){
                        $kendaraan->status_kartu = update_status_on_specified_date(strtotime($kendaraan->masaberlaku),strtotime($tanggal));
                        $status_kendaraan = $kendaraan->status_kartu;
                    }
                }else{
                    //change status_sk
                    if($kendaraan->tglakhirsk){
                        $kendaraan->status_sk = update_status_on_specified_date(strtotime($kendaraan->tglakhirsk),strtotime($tanggal));
                        $status_kendaraan = $kendaraan->status_sk;
                    }
                }

                if(isset($status_kendaraan)){
                    if($status_kendaraan == "menjelang_expired" or $status_kendaraan == "expired"){
                        //for kartu_expired, you need to check status_sk too
                        if($type == "App\Notifications\KartuExpired"){
                            //update status_sk
                            if($kendaraan->tglakhirsk){
                                $kendaraan->status_sk = update_status_on_specified_date(strtotime($kendaraan->tglakhirsk),strtotime($tanggal));
                            }

                            if($kendaraan->status_sk == "belum_expired" ){
                                array_push($kendaraans,$kendaraan);
                            }
                        }else{
                            array_push($kendaraans,$kendaraan);
                        }
                    }
                }
            }
            return $kendaraans;
        }

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
}

if (!function_exists('get_unread_notifications')) {
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
}