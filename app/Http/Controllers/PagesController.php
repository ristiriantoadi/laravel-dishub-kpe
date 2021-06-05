<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Pemberitahuan;

class PagesController extends Controller
{

    public function home(Request $request)
    {
        return "this is home";

        error_log("called");

        //get pemberitahuanss
        $pemberitahuans = Pemberitahuan::all();
        print_r($pemberitahuans);
        error_log("pemberitahuans: ".$pemberitahuans);

        return view('index',['pemberitahuans'=>$pemberitahuans]);
    }

}