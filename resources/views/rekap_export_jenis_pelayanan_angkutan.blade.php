<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Polisi</th>
            <th>No Uji</th>
            <th>Merk</th>
            <th>Tahun Pembuatan</th>
            <th>No Rangka</th>
            <th>No Mesin</th>
            <th>Daya Angkut Orang</th>
            <th>Daya Angkut Barang</th>
            <th>Trayek</th>
            <th>Nama Perusahaan</th>
            <th>Alamat Perusahaan</th>
            <th>Nama Pemilik</th>
            <th>Nomor SK</th>
            <th>Kode Perusahaan</th>
            <th>Masa Berlaku</th>
            <th>Tanggal Awal SK</th>
            <th>Tanggal Akhir SK</th>
            <th>Jenis Pelayanan Angkutan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="19"><b>KSPN</b></td>
        </tr>
        @foreach($rekap['kspn'] as $kendaraan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kendaraan->nopol}}</td>
                <td>{{$kendaraan->nouji}}</td>
                <td>{{$kendaraan->merk}}</td>
                <td>{{$kendaraan->thpembuatan}}</td>
                <td>{{$kendaraan->norangka}}</td>
                <td>{{$kendaraan->nomesin}}</td>
                <td>{{$kendaraan->dayaangkutorang}}</td>
                <td>{{$kendaraan->dayaangkutbarang}}</td>
                <td>{{$kendaraan->trayek}}</td>
                <td>{{$kendaraan->namaperusahaan}}</td>
                <td>{{$kendaraan->alamatperusahaan}}</td>
                <td>{{$kendaraan->namapemilik}}</td>
                <td>{{$kendaraan->nosk}}</td>
                <td>{{$kendaraan->kodeperusahaan}}</td>
                <td>{{$kendaraan->masaberlaku}}</td>
                <td>{{$kendaraan->tglawalsk}}</td>
                <td>{{$kendaraan->tglakhirsk}}</td>
                <td>{{$kendaraan->jenis_pelayanan_angkutan}}</td>
            </tr>
        @endforeach
        <tr>
            <td><b>Total</b></td>
            <td colspan="18" style="text-align:left">{{$rekap['jumlahkspn']}}</td>
        </tr>
        <tr>
            <td colspan="19"><b>AKDP</b></td>
        </tr>
        @foreach($rekap['akdp'] as $kendaraan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kendaraan->nopol}}</td>
                <td>{{$kendaraan->nouji}}</td>
                <td>{{$kendaraan->merk}}</td>
                <td>{{$kendaraan->thpembuatan}}</td>
                <td>{{$kendaraan->norangka}}</td>
                <td>{{$kendaraan->nomesin}}</td>
                <td>{{$kendaraan->dayaangkutorang}}</td>
                <td>{{$kendaraan->dayaangkutbarang}}</td>
                <td>{{$kendaraan->trayek}}</td>
                <td>{{$kendaraan->namaperusahaan}}</td>
                <td>{{$kendaraan->alamatperusahaan}}</td>
                <td>{{$kendaraan->namapemilik}}</td>
                <td>{{$kendaraan->nosk}}</td>
                <td>{{$kendaraan->kodeperusahaan}}</td>
                <td>{{$kendaraan->masaberlaku}}</td>
                <td>{{$kendaraan->tglawalsk}}</td>
                <td>{{$kendaraan->tglakhirsk}}</td>
                <td>{{$kendaraan->jenis_pelayanan_angkutan}}</td>
            </tr>
        @endforeach
        <tr>
            <td><b>Total</b></td>
            <td colspan="18" style="text-align:left">{{$rekap['jumlahAkdp']}}</td>
        </tr>
        <tr>
            <td colspan="19"><b>PARIWISATA</b></td>
        </tr>
        @foreach($rekap['pariwisata'] as $kendaraan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kendaraan->nopol}}</td>
                <td>{{$kendaraan->nouji}}</td>
                <td>{{$kendaraan->merk}}</td>
                <td>{{$kendaraan->thpembuatan}}</td>
                <td>{{$kendaraan->norangka}}</td>
                <td>{{$kendaraan->nomesin}}</td>
                <td>{{$kendaraan->dayaangkutorang}}</td>
                <td>{{$kendaraan->dayaangkutbarang}}</td>
                <td>{{$kendaraan->trayek}}</td>
                <td>{{$kendaraan->namaperusahaan}}</td>
                <td>{{$kendaraan->alamatperusahaan}}</td>
                <td>{{$kendaraan->namapemilik}}</td>
                <td>{{$kendaraan->nosk}}</td>
                <td>{{$kendaraan->kodeperusahaan}}</td>
                <td>{{$kendaraan->masaberlaku}}</td>
                <td>{{$kendaraan->tglawalsk}}</td>
                <td>{{$kendaraan->tglakhirsk}}</td>
                <td>{{$kendaraan->jenis_pelayanan_angkutan}}</td>
            </tr>
        @endforeach
        <tr>
            <td><b>Total</b></td>
            <td colspan="18" style="text-align:left">{{$rekap['jumlahPariwisata']}}</td>
        </tr>
        <tr>
            <td colspan="19"><b>SEWA</b></td>
        </tr>
        @foreach($rekap['sewa'] as $kendaraan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kendaraan->nopol}}</td>
                <td>{{$kendaraan->nouji}}</td>
                <td>{{$kendaraan->merk}}</td>
                <td>{{$kendaraan->thpembuatan}}</td>
                <td>{{$kendaraan->norangka}}</td>
                <td>{{$kendaraan->nomesin}}</td>
                <td>{{$kendaraan->dayaangkutorang}}</td>
                <td>{{$kendaraan->dayaangkutbarang}}</td>
                <td>{{$kendaraan->trayek}}</td>
                <td>{{$kendaraan->namaperusahaan}}</td>
                <td>{{$kendaraan->alamatperusahaan}}</td>
                <td>{{$kendaraan->namapemilik}}</td>
                <td>{{$kendaraan->nosk}}</td>
                <td>{{$kendaraan->kodeperusahaan}}</td>
                <td>{{$kendaraan->masaberlaku}}</td>
                <td>{{$kendaraan->tglawalsk}}</td>
                <td>{{$kendaraan->tglakhirsk}}</td>
                <td>{{$kendaraan->jenis_pelayanan_angkutan}}</td>
            </tr>
        @endforeach
        <tr>
            <td><b>Total</b></td>
            <td colspan="18" style="text-align:left">{{$rekap['jumlahSewa']}}</td>
        </tr>
        <tr>
            <td colspan="19"><b>SEWA KHUSUS</b></td>
        </tr>
        @foreach($rekap['sewaKhusus'] as $kendaraan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kendaraan->nopol}}</td>
                <td>{{$kendaraan->nouji}}</td>
                <td>{{$kendaraan->merk}}</td>
                <td>{{$kendaraan->thpembuatan}}</td>
                <td>{{$kendaraan->norangka}}</td>
                <td>{{$kendaraan->nomesin}}</td>
                <td>{{$kendaraan->dayaangkutorang}}</td>
                <td>{{$kendaraan->dayaangkutbarang}}</td>
                <td>{{$kendaraan->trayek}}</td>
                <td>{{$kendaraan->namaperusahaan}}</td>
                <td>{{$kendaraan->alamatperusahaan}}</td>
                <td>{{$kendaraan->namapemilik}}</td>
                <td>{{$kendaraan->nosk}}</td>
                <td>{{$kendaraan->kodeperusahaan}}</td>
                <td>{{$kendaraan->masaberlaku}}</td>
                <td>{{$kendaraan->tglawalsk}}</td>
                <td>{{$kendaraan->tglakhirsk}}</td>
                <td>{{$kendaraan->jenis_pelayanan_angkutan}}</td>
            </tr>
        @endforeach
        <tr>
            <td><b>Total</b></td>
            <td colspan="18" style="text-align:left">{{$rekap['jumlahSewaKhusus']}}</td>
        </tr>
        <tr>
            <td colspan="19"><b>ANTAR JEMPUT</b></td>
        </tr>
        @foreach($rekap['antarJemput'] as $kendaraan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kendaraan->nopol}}</td>
                <td>{{$kendaraan->nouji}}</td>
                <td>{{$kendaraan->merk}}</td>
                <td>{{$kendaraan->thpembuatan}}</td>
                <td>{{$kendaraan->norangka}}</td>
                <td>{{$kendaraan->nomesin}}</td>
                <td>{{$kendaraan->dayaangkutorang}}</td>
                <td>{{$kendaraan->dayaangkutbarang}}</td>
                <td>{{$kendaraan->trayek}}</td>
                <td>{{$kendaraan->namaperusahaan}}</td>
                <td>{{$kendaraan->alamatperusahaan}}</td>
                <td>{{$kendaraan->namapemilik}}</td>
                <td>{{$kendaraan->nosk}}</td>
                <td>{{$kendaraan->kodeperusahaan}}</td>
                <td>{{$kendaraan->masaberlaku}}</td>
                <td>{{$kendaraan->tglawalsk}}</td>
                <td>{{$kendaraan->tglakhirsk}}</td>
                <td>{{$kendaraan->jenis_pelayanan_angkutan}}</td>
            </tr>
        @endforeach
        <tr>
            <td><b>Total</b></td>
            <td colspan="18" style="text-align:left">{{$rekap['jumlahAntarJemput']}}</td>
        </tr>
        <tr>
            <td colspan="19"><b>PEMADU MODA</b></td>
        </tr>
        @foreach($rekap['pemaduModa'] as $kendaraan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kendaraan->nopol}}</td>
                <td>{{$kendaraan->nouji}}</td>
                <td>{{$kendaraan->merk}}</td>
                <td>{{$kendaraan->thpembuatan}}</td>
                <td>{{$kendaraan->norangka}}</td>
                <td>{{$kendaraan->nomesin}}</td>
                <td>{{$kendaraan->dayaangkutorang}}</td>
                <td>{{$kendaraan->dayaangkutbarang}}</td>
                <td>{{$kendaraan->trayek}}</td>
                <td>{{$kendaraan->namaperusahaan}}</td>
                <td>{{$kendaraan->alamatperusahaan}}</td>
                <td>{{$kendaraan->namapemilik}}</td>
                <td>{{$kendaraan->nosk}}</td>
                <td>{{$kendaraan->kodeperusahaan}}</td>
                <td>{{$kendaraan->masaberlaku}}</td>
                <td>{{$kendaraan->tglawalsk}}</td>
                <td>{{$kendaraan->tglakhirsk}}</td>
                <td>{{$kendaraan->jenis_pelayanan_angkutan}}</td>
            </tr>
        @endforeach
        <tr>
            <td><b>Total</b></td>
            <td colspan="18" style="text-align:left">{{$rekap['jumlahPemaduModa']}}</td>
        </tr>
        <tr>
            <td colspan="19"><b>TAKSI</b></td>
        </tr>
        @foreach($rekap['taksi'] as $kendaraan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kendaraan->nopol}}</td>
                <td>{{$kendaraan->nouji}}</td>
                <td>{{$kendaraan->merk}}</td>
                <td>{{$kendaraan->thpembuatan}}</td>
                <td>{{$kendaraan->norangka}}</td>
                <td>{{$kendaraan->nomesin}}</td>
                <td>{{$kendaraan->dayaangkutorang}}</td>
                <td>{{$kendaraan->dayaangkutbarang}}</td>
                <td>{{$kendaraan->trayek}}</td>
                <td>{{$kendaraan->namaperusahaan}}</td>
                <td>{{$kendaraan->alamatperusahaan}}</td>
                <td>{{$kendaraan->namapemilik}}</td>
                <td>{{$kendaraan->nosk}}</td>
                <td>{{$kendaraan->kodeperusahaan}}</td>
                <td>{{$kendaraan->masaberlaku}}</td>
                <td>{{$kendaraan->tglawalsk}}</td>
                <td>{{$kendaraan->tglakhirsk}}</td>
                <td>{{$kendaraan->jenis_pelayanan_angkutan}}</td>
            </tr>
        @endforeach
        <tr>
            <td><b>Total</b></td>
            <td colspan="18" style="text-align:left">{{$rekap['jumlahTaksi']}}</td>
        </tr>
    </tbody>
</table>