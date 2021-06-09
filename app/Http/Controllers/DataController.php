<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Kendaraan;
use App\Pemberitahuan;
use Illuminate\Support\Facades\Validator;
use App\Exports\DataRekapExport;
use App\Exports\DataRekapExportJenisPelayananAngkutan;
use Maatwebsite\Excel\Facades\Excel;


class DataController extends Controller
{

    public function dashboard()
    {
        return view('dashboard');
    }

    public function input()
    {
        return view('input');
    }
    
    public function index(Request $request)
    {
        $kendaraans = DB::table('kendaraans')->paginate(15);
        
        return view('print', ['kendaraans' => $kendaraans]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
        $kendaraans = DB::table('kendaraans')
            ->where('nomesin','like',"%".$cari."%")
			->orWhere('nopol','like',"%".$cari."%")
			->orWhere('namaperusahaan','like',"%".$cari."%")
            ->paginate();
 
    		// mengirim data pegawai ke view index
		return view('print',['kendaraans' => $kendaraans,'cari'=>$cari]);
 
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
        
        $kendaraans = Kendaraan::where('nomesin', $cari)->orWhere('nopol', $cari)->get();

        //get pemberitahuanss
        $pemberitahuans = Pemberitahuan::all();

        //get distinct list of trayeks
        $trayeks=Kendaraan::select('trayek')->distinct()->pluck('trayek')->toArray();

        return view('index', ['trayeks'=>$trayeks,'kendaraans' => $kendaraans, 'cari' => $cari,'pemberitahuans'=>$pemberitahuans]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        
        Validator::make($request->all(),
            [
            'nopol' => 'required',
            'nomor_uji' => 'required',
            'merk' => 'required',
            'tahun_pembuatan' => 'required',
            'nomor_rangka' => 'required',
            'nomesin' => 'required|unique:kendaraans',
            'daya_orang' => 'required',
            'daya_barang' => 'required',
            'trayek' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'nama_pemilik' => 'required',
            'nomor_sk' => 'required',
            'kode_perusahaan' => 'required',
            'masa_sk' => 'required',
            'awal' => 'required',
            'akhir' => 'required',
            ]
        )->validate();


        $kendaraan = Kendaraan::create([

            'nopol' => $request->nopol,
            'nouji' => $request->nomor_uji,
            'merk' => $request->merk,
            'thpembuatan' => $request->tahun_pembuatan,
            'norangka' => $request->nomor_rangka,
            'nomesin' => $request->nomesin,
            'dayaangkutorang' => $request->daya_orang,
            'dayaangkutbarang' => $request->daya_barang,
            'trayek' => $request->trayek,
            'namaperusahaan' => $request->nama_perusahaan,
            'alamatperusahaan' => $request->alamat_perusahaan,
            'namapemilik' => $request->nama_pemilik,
            'nosk' => $request->nomor_sk,
            'kodeperusahaan' => $request->kode_perusahaan,
            'masaberlaku' => $request->masa_sk,
            'tglawalsk' => $request->awal,
            'tglakhirsk' => $request->akhir,
            'jenis_pelayanan_angkutan'=>$request->jenis_pelayanan_angkutan,
            'tglawalspm' => $request->awal_spm,
            'tglakhirspm' => $request->akhir_spm,
        ]);

        //upload pdf
        if($request->file("berkas_pdf")){
            upload_pdf($kendaraan,$request->file("berkas_pdf"));
        }

        //upload spm
        if($request->file("berkas_spm")){
            upload_spm($kendaraan,$request->file("berkas_spm"));
        }

        return redirect('/input')->with('status', 'Data Kendaraan Berhasil Ditambahkan!');

    }

    public function rekap(Request $request){
        return view('rekap');
    }
    
    public function export(Request $request){
        $namaFile = "Rekap Jumlah Kendaraan Angkutan AKDP di Provinsi NTB ".date('d-m-Y').".xlsx";
        return Excel::download(new DataRekapExport, $namaFile);
    }

    public function exportJenisPelayananAngkutan(Request $request){
        $namaFile = "Rekap Kendaraan berdasarkan Jenis Pelayanan Angkutan di Provinsi NTB ".date('d-m-Y').".xlsx";
        return Excel::download(new DataRekapExportJenisPelayananAngkutan, $namaFile);
    }

    public function cekNomorMesin(Request $request){
        error_log("nomor mesin: ".$request->nomorMesin);
        $nomesin = $request->nomorMesin;
        $kendaraan = Kendaraan::where('nomesin', $nomesin)->get();
        return response()->json([
            'kendaraan' => $kendaraan
        ]);
    }

    public function pencarianTrayek(Request $request){
        $trayek = $request->namaTrayek;
        $jumlahArmada = count(Kendaraan::where('trayek',$trayek)->get());
        $namaPerusahaans=Kendaraan::where('trayek',$trayek)->select('namaperusahaan')->distinct()->pluck('namaperusahaan')->toArray();
        $perusahaan_array=[];
        foreach($namaPerusahaans as $namaPerusahaan){
            $jumlahUnit = count(Kendaraan::where('trayek',$trayek)->where('namaperusahaan',$namaPerusahaan)->get());
            $perusahaan_row = ['namaPerusahaan'=>$namaPerusahaan,'jumlahUnit'=>$jumlahUnit];
            array_push($perusahaan_array,$perusahaan_row);
        }

        return response()->json([
            'trayek' => $trayek,
            'jumlahArmada' => $jumlahArmada,
            'perusahaans'=>$perusahaan_array
        ]);

        // return $namaPerusahaans;

        // return response()->json([
        //     'kendaraan' => $kendaraan
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}