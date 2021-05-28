<?php

// namespace App\Helpers;

if (!function_exists('check_status_sk')) {
    function check_status_sk($kendaraan){
        // error_log($kendaraan);    
        $oldStatus=$kendaraan->status_sk;
        // error_log($oldStatus);
        // $kendaraan->status = update_status($kendaraan)
        
        //update status sk
        // date("Y/m/d")
        // error_log(strtotime("now"));
        // $current_date = strtotime("now");
        // $expired_date = strtotime($kendaraan->tglakhirsk);
        // $difference = ($expired_date - $current_date)/60/60/24;
        // error_log($difference);
        // $current_date = new DateTime("now");
        // $expired_date = new DateTime($kendaraan->tglakhirsk);
        // $interval = $current_date->diff($expired_date);
        // $interval = $expired_date->diff($current_date);
        // error_log($interval->days);

        $current_date = time(); // or your date as well
        $expired_date = strtotime($kendaraan->tglakhirsk);
        $datediff = $expired_date - $current_date;
        $datediff = round($datediff / (60 * 60 * 24));
        // error_log("id_kendaraan: ".$kendaraan->id.", Current_date: ".date("Y/m/d",$current_date).", expired_date: ".date("Y/m/d",$expired_date).", diff: ".$datediff);
        if($datediff<0){
            $kendaraan->status_sk = "expired";
        }
        else if($datediff<=30){
            $kendaraan->status_sk = "menjelang_expired";
        }
        else{
            $kendaraan->status_sk = "belum_expired";
        }
        $kendaraan->save();
    }
}
 
if (!function_exists('check_status_kartu')) {
    function check_status_kartu($kendaraan){
        // error_log($kendaraan);
    }
}