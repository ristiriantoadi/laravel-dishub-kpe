<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemberitahuan;

if (file_exists("app/Helpers/Helper.php")){
    include "app/Helpers/Helper.php";
}

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
        
        if($request->file("file")){
            // upload_pdf($kendaraan,$request->file("berkas_pdf"));
            upload_file_pemberitahuan($pemberitahuan,$request->file("file"));
        }
        
        return redirect('/pemberitahuan');
        
    }

    public function edit(Request $request,$id){
        $judul = $request->judul;
        $keterangan = $request->keterangan;
        $pemberitahuan = Pemberitahuan::find($id);
        $pemberitahuan->judul = $judul;
        $pemberitahuan->keterangan = $keterangan;
        $pemberitahuan->save();

        if($request->file("file")){
            error_log("called");
            upload_file_pemberitahuan($pemberitahuan,$request->file("file"));
        }else{
            error_log("not called");
        }

        return redirect('/pemberitahuan');
    }

    public function delete(Request $request,$id){        
        $pemberitahuan = Pemberitahuan::find($id);
        $result = $pemberitahuan->delete();
        if($result == 1){
            
            return redirect("/pemberitahuan");
        }
    }
}
