<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
    table tr td,
    table tr th {
        font-size: 9pt;
    }

    .tengah {
        text-align: center;
    }
    </style>



    <table>
        <tr>
            <th>
                <img src="gambar/ntb.png" alt="ntb" height="80px" width="70px">
            </th>
            <th>
                <div class="tengah">
                    <h5>Dinas Perhubungan Provinsi Nusa Tenggara Barat</h5>
                    <h4>DINAS PERHUBUNGAN</h4>
                    <h3>KARTU PENGAWASAN ELEKTRONIK</h3>
                </div>
            </th>
            <th>
                <img src="gambar/dishub.png" alt="ntb" height="80px" width="80px">
            </th>
        </tr>
    </table>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nomor TNKB</th>
                <th>Kode Perusahaan</th>
                <th>Nama Perusahaan</th>
                <th>TRAYEK</th>
                <th>Masa Berlaku S/D</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kendaraans as $p)
            <tr>
                <td>{{$p->nomesin}}/KP/DISHUB/I/2020</td>
                <td>{{$p->nopol}}</td>
                <td>{{$p->kodeperusahaan}}</td>
                <td>{{$p->namaperusahaan}}</td>
                <td>{{$p->trayek}}</td>
                <td>{{$p->masaberlaku}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <img src="qrcode/qrcode.png" alt="qr" height="100px" width="100px">
</body>

</html>