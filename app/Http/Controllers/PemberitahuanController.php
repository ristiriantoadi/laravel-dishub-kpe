<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemberitahuan;

class PemberitahuanController extends Controller
{
    //
    public function index(Request $request){        

        //get all pemberitahuans
        $pemberitahuans = Pemberitahuan::all();

        return view('pemberitahuan',['pemberitahuans'=>$pemberitahuans]);
    }
    
    public function add(Request $request){
        $judul = $request->judul;
        $keterangan = $request->keterangan;
        $pemberitahuan = Pemberitahuan::create([
            'judul' => $judul,
            'keterangan'=>$keterangan,
        ]);
        return redirect('/pemberitahuan');
    }

    public function edit(Request $request,$id){
        $judul = $request->judul;
        $keterangan = $request->keterangan;
        $pemberitahuan = Pemberitahuan::find($id);
        $pemberitahuan->judul = $judul;
        $pemberitahuan->keterangan = $keterangan;
        $pemberitahuan->save();
        return redirect('/pemberitahuan');
    }

    public function delete(Request $request,$id){        
        // return "Endpoint delete pemberitahuan";
        $pemberitahuan = Pemberitahuan::find($id);
        $result = $pemberitahuan->delete();
        if($result == 1){
            return redirect("/pemberitahuan");
        }
    }
}
