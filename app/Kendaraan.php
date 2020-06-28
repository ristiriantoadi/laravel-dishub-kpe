<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = ['nopol','nouji','merk','thpembuatan','norangka','nomesin',
                            'dayaangkutorang','dayaangkutbarang','trayek','namaperusahaan',
                            'alamatperusahaan','namapemilik','nosk','kodeperusahaan',
                            'masaberlaku','tglawalsk','tglakhirsk'];
}