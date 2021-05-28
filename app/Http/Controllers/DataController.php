<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Kendaraan;
use Illuminate\Support\Facades\Validator;
// use App\Helpers\Helper;

class DataController extends Controller
{

    public function dashboard()
    {
        //do notification
        $kendaraans = Kendaraan::all();
        foreach ($kendaraans as $kendaraan) {
            // code to be executed;
            check_status_sk($kendaraan);
            check_status_kartu($kendaraan);
        } 
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
		return view('print',['kendaraans' => $kendaraans]);
 
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
        
        $kendaraans = Kendaraan::where('nomesin', $cari)->get();

        return view('index', ['kendaraans' => $kendaraans, 'cari' => $cari]);
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


        Kendaraan::create([

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
            'tglakhirsk' => $request->akhir

        ]);

        return redirect('/input')->with('status', 'Data Kendaraan Berhasil Ditambahkan!');

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