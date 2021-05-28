<?php

// namespace App\Helpers;
use App\Notifications\KartuExpired;
use App\Notifications\SkExpired;
use Illuminate\Support\Facades\Auth;

if (!function_exists('update_status')) {
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
}

if (!function_exists('notification')) {
    function notification($old_status,$current_status,$type,$kendaraan){
        if($old_status == "belum_expired"){
            if($current_status != "belum_expired"){
                //add notif
                $user = Auth::user();
                if($type == "status_sk"){
                    $user->notify(new SkExpired($kendaraan));
                }else{
                    $user->notify(new KartuExpired($kendaraan));
                }
            }
        }
        else{
            if($current_status == "belum_expired"){
                // remove_from_notification(record)
            }
        }
    }
}

if (!function_exists('check_status_sk')) {
    function check_status_sk($kendaraan){
        $old_status=$kendaraan->status_sk;
        $kendaraan->status_sk=update_status(strtotime($kendaraan->tglakhirsk));
        $kendaraan->save();

        $current_status = $kendaraan->status_sk;
        notification($old_status,$current_status,"status_sk",$kendaraan);
    }
}
 
if (!function_exists('check_status_kartu')) {
    function check_status_kartu($kendaraan){
        $old_status = $kendaraan->status_kartu;
        $kendaraan->status_kartu=update_status(strtotime($kendaraan->masaberlaku));
        $kendaraan->save();

        $current_status = $kendaraan->status_sk;
        notification($old_status,$current_status,"status_kartu",$kendaraan);
    }
}