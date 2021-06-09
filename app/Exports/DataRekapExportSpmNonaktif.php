<?php

namespace App\Exports;


use App\Kendaraan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

if (file_exists("app/Helpers/Helper.php")){
    include "app/Helpers/Helper.php";
}

class DataRekapExportSpmNonaktif implements FromView
{
    public function view(): View
    {
        //get rekaps data
        $kendaraans=get_rekap_data_spm_nonaktif();
        return view('rekap_export_spm', [
            'kendaraans' => $kendaraans
        ]);
    }

}
