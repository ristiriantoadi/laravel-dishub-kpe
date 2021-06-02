<?php

namespace App\Exports;


use App\Kendaraan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

if (file_exists("app/Helpers/Helper.php")){
    include "app/Helpers/Helper.php";
}

class DataRekapExport implements FromView
{
    public function view(): View
    {
        //get rekaps data
        $rekaps=get_rekap_data();
        // echo count($rekaps);
        // print_r($rekaps);
        // error_log("rekaps: ".str($rekaps));
        foreach($rekaps as $rekap){
            // print_r($rekap);
            // echo "<br>";
        }
        return view('rekap_export', [
            'rekaps' => $rekaps
        ]);
    }

}
