<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {        
        return "Hello World";
    }

    public function parameterMethod(Request $request, $key){
        return "key: ".$key;
    }
}
