<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = ['nopol','nouji','merk','thpembuatan','norangka','nomesin',
                            'dayaangkutorang','dayaangkutbarang','trayek','namaperusahaan',
                            'alamatperusahaan','namapemilik','nosk','kodeperusahaan',
                            'masaberlaku','tglawalsk','tglakhirsk','jenis_pelayanan_angkutan',
                            'tglawalspm','tglakhirspm'];
    protected $attributes = [
                                'status_kartu' => "belum_expired",
                                'status_sk' => "belum_expired",
                                'berkas_pdf'=>"",
                                'berkas_spm'=>"",
                                'jenis_pelayanan_angkutan'=>"",
                                'no_telepon'=>""
                            ];
                        
}