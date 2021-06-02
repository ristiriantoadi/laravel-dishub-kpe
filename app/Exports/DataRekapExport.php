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
        get_rekap_data();
        $rekaps=[];
        return view('rekap_export', [
            'rekaps' => $rekaps
        ]);
    }

}
