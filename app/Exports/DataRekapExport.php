<?php

namespace App\Exports;


use App\Kendaraan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataRekapExport implements FromView
{
    public function view(): View
    {
        //get rekaps data
        $rekaps=[];
        return view('rekap_export', [
            'rekaps' => $rekaps
        ]);
    }

}
