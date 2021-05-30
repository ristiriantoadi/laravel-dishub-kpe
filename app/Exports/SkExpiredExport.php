<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SkExpiredExport implements WithHeadings,WithMapping,FromArray
{
    protected $kendaraans;

    public function __construct(array $kendaraans)
    {
        $this->kendaraans = [];
        foreach ($kendaraans as $kendaraan) {
            array_push($this->kendaraans,$kendaraan);
        }
    }

    public function array(): array
    {
        return $this->kendaraans;
    }

    public function headings(): array
    {
        // nopol,nouji,merk,thpembuatan,norangka,nomesin,dayaangkutorang,dayaangkutbarang,trayek,namaperusahaan,alamatperusahaan,namapemilik,nosk,kodeperusahaan,masaberlaku,tglawalsk,tglakhirsk,status_sk,status_kartu
        return [
            "nopol",
            "nouji",
            "merk",
            "thpembuatan",
            "norangka",
            "nomesin",
            "dayaangkutorang",
            "dayaangkutbarang",
            "trayek",
            "namaperusahaan",
            "alamatperusahaan",
            "namapemilik",
            "nosk",
            "kodeperusahaan",
            "tglawalsk",
            "tglakhirsk",
            "status_sk"
        ];
    }

    public function map($kendaraan): array
    {
        return [
            $kendaraan->nopol,
            $kendaraan->nouji,
            $kendaraan->merk,
            $kendaraan->thpembuatan,
            $kendaraan->norangka,
            $kendaraan->nomesin,
            $kendaraan->dayaangkutorang,
            $kendaraan->dayaangkutbarang,
            $kendaraan->trayek,
            $kendaraan->namaperusahaan,
            $kendaraan->alamatperusahaan,
            $kendaraan->namapemilik,
            $kendaraan->nosk,
            $kendaraan->kodeperusahaan,
            $kendaraan->tglawalsk,
            $kendaraan->tglakhirsk,
            $kendaraan->status_sk
        ];
    }
}
