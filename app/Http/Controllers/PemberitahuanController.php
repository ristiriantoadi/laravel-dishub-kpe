<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemberitahuanController extends Controller
{
    //
    public function index(Request $request){        
        return "Halaman upload pemberitahuan";
    }
    
    public function add(Request $request){        
        return "Endpoint add pemberitahuan";
    }

    public function delete(Request $request){        
        return "Endpoint delete pemberitahuan";
    }
}
