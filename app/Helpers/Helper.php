<?php

// namespace App\Helpers;

if (!function_exists('update_status')) {
    function update_status($expired_date){
        // $oldStatus=$kendaraan->status_sk;
        
        $current_date = time(); // or your date as well
        // $expired_date = strtotime($kendaraan->tglakhirsk);
        $datediff = $expired_date - $current_date;
        $datediff = round($datediff / (60 * 60 * 24));
        
        if($datediff<0){
            // $kendaraan->status_sk = "expired";
            return "expired";
        }
        else if($datediff<=30){
            // $kendaraan->status_sk = "menjelang_expired";
            return "menjelang_expired";
        }
        else{
            // $kendaraan->status_sk = "belum_expired";
            return "belum_expired";
        }
        // $kendaraan->save();
    }
}

if (!function_exists('check_status_sk')) {
    function check_status_sk($kendaraan){
        $oldStatus=$kendaraan->status_sk;
        $kendaraan->status_sk=update_status(strtotime($kendaraan->tglakhirsk));
        $kendaraan->save();
        // $current_date = time(); // or your date as well
        // $expired_date = strtotime($kendaraan->tglakhirsk);
        // $datediff = $expired_date - $current_date;
        // $datediff = round($datediff / (60 * 60 * 24));
        
        // if($datediff<0){
        //     $kendaraan->status_sk = "expired";
        // }
        // else if($datediff<=30){
        //     $kendaraan->status_sk = "menjelang_expired";
        // }
        // else{
        //     $kendaraan->status_sk = "belum_expired";
        // }
        // $kendaraan->save();
    }
}
 
if (!function_exists('check_status_kartu')) {
    function check_status_kartu($kendaraan){
        // error_log($kendaraan);
        $kendaraan->status_kartu=update_status(strtotime($kendaraan->masaberlaku));
        $kendaraan->save();
    }
}