<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NAMA PERUSAHAAN</th>
            <th>ALAMAT</th>
            <th>NAMA PEMILIK</th>
            <th>TANGGAL AWAL SPM</th>
            <th>TANGGAL AKHIR SPM</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kendaraans as $kendaraan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kendaraan->namaperusahaan}}</td>
                <td>{{$kendaraan->alamatperusahaan}}</td>
                <td>{{$kendaraan->namapemilik}}</td>
                <td>{{$kendaraan->tglawalspm}}</td>
                <td>{{$kendaraan->tglakhirspm}}</td>
            </tr>
        @endforeach
        <!-- <tr>
            <td rowspan="2">1</td>
            <td rowspan="2">Adi Sobri</td>
            <td rowspan="2">Tanjung Selong Lotim</td>
            <td rowspan="2">Amaq Asiah</td>
            <td>Pancor-Mandalika PP</td>
            <td>2</td>
            <td rowspan="2">3</td>
        </tr>
        <tr>
            <td>Pancor-Mandalika Lembar PP</td>
            <td>1</td>
        </tr>
        <tr>
            <td rowspan="2">2</td>
            <td rowspan="2">Adi Sobri</td>
            <td rowspan="2">Tanjung Selong Lotim</td>
            <td rowspan="2">Amaq Asiah</td>
            <td>Pancor-Mandalika PP</td>
            <td>2</td>
            <td rowspan="2">3</td>
        </tr>
        <tr>
            <td>Pancor-Mandalika Lembar PP</td>
            <td>1</td>
        </tr> -->
    </tbody>
</table>
