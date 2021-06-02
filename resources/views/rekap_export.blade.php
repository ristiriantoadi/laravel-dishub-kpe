<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NAMA PERUSAHAAN</th>
            <th>ALAMAT</th>
            <th>NAMA PEMILIK</th>
            <th colspan="2">TRAYEK/JUMLAH KENDARAAN</th>
            <th>JUMLAH ARMADA</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rekaps as $rekap)
            <tr>
                <td rowspan="{{count($rekap['trayeks'])}}">{{$loop->iteration}}</td>
                <td rowspan="{{count($rekap['trayeks'])}}">{{$rekap["namaPerusahaan"]}}</td>
                <td rowspan="{{count($rekap['trayeks'])}}">{{$rekap["alamat"]}}</td>
                <td rowspan="{{count($rekap['trayeks'])}}">{{$rekap["namaPemilik"]}}</td>
                <td>{{$rekap["trayeks"][0]["trayek"]}}</td>
                <td>{{$rekap["trayeks"][0]["jumlah"]}}</td>
                <td rowspan="{{count($rekap['trayeks'])}}">{{$rekap["jumlahKendaraanPerPerusahaan"]}}</td>
            </tr>
            @foreach($rekap["trayeks"] as $trayek)
                @if($loop->iteration !=1)
                    <tr>
                        <td>{{$trayek["trayek"]}}</td>
                        <td>{{$trayek["jumlah"]}}</td>                
                    </tr>
                @endif
            @endforeach
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
