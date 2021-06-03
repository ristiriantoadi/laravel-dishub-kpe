<?php

namespace App\Exports;


use App\Kendaraan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

if (file_exists("app/Helpers/Helper.php")){
    include "app/Helpers/Helper.php";
}

class DataRekapExportJenisPelayananAngkutan implements FromView
{
    public function view(): View
    {
        //get rekaps data
        $rekap=get_rekap_data_jenis_pelayanan_angkutan();
        return view('rekap_export_jenis_pelayanan_angkutan', [
            'rekap' => $rekap
        ]);
    }

}
