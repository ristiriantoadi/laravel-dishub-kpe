<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {        
        return "Hello World";
    }

    public function kartuExpired(Request $request)
    {        
        // return "kartu expired";
        return view('expired/kartu_expired');
    }

    public function skExpired(Request $request){        
        // return "sk expired";
        return view('expired/sk_expired');
    }

    public function parameterMethod(Request $request, $key){
        return "key: ".$key;
    }


}
