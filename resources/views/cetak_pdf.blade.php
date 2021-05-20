<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style type="text/css">
body {
    vertical-align: center;
}

.container {
    display: block;
    position: relative;
    width: 323px;
    height: 204px;
    border: 1px solid #000;
    padding: 0;
    margin: auto;
}

#table1 {
    margin-top: 8px;
    width: 100%;
    text-align: center;
}

#table2,
#table3 {
    width: 100%;
}

#table3 tr td {
    text-align: center
}

.top-title {
    font-weight: bold;
    font-size: 7.5px
}

.middle-title {
    font-weight: bold;
    font-size: 10px
}

.bottom-title {
    font-weight: bold;
    font-size: 10px
}

.logo-left img {
    width: 40px;
    height: 50px;
}

.logo-right img {
    width: 43px;
    height: 50px;
}

.barcode {
    vertical-align: bottom;
    width: 105px !important
}

#table1,
#table2 tr td {
    font-size: 8px;
    font-weight: 700;
}

#table3 {
    padding-top: 10px
}

.table3td-1 {
    font-size: 12px;
    font-weight: 700;
}

.table3td-2 {
    font-size: 12px;
}

.bg-logo {
    margin-top: 75px;
    width: 100%;
    /* z-index: -1; */
    opacity: 0.13;
    text-align: center;
    position: absolute;
}

.bg-logo img {
    width: 100px;
    margin-right: 0px;
}

.wrapper {
    width: 100%;
    /* z-index: 999; */
    position: relative;
}

.page-break {
    page-break-after: always;
}
</style>

<body>

    <div class="container">
        <div class="bg-logo"><img src="gambar/dishub.png"></div>
        <div class="wrapper">
            <table id="table1">
                <thead>
                    <tr>
                        <th rowspan="3" class="logo-left"><img src="gambar/ntb.png"></th>
                        <th colspan="2" class="top-title text-center">PEMERINTAH PROVINSI NUSA TENGGARA BARAT</th>
                        <th rowspan="3" class="logo-right"><img src="gambar/dishub.png"></th>
                    </tr>
                    <tr>
                        <th colspan="2" class="middle-title text-center">DINAS PERHUBUNGAN</th>
                    </tr>
                    <tr>
                        <th colspan="2" class="bottom-title text-center">KARTU PENGAWASAN ELEKTRONIK</th>
                    </tr>
                </thead>
            </table>
            <table id="table2">
                </tbody>
                @foreach($kendaraans as $p)
                <tr>
                    <td rowspan="5" class="barcode text-center">
                        <div class="visible-print text-center">
                            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(105)->generate('https://kpe.dishub.ntbprov.go.id/' .'?cari=' . $p->nomesin)) !!} ">
                        </div>
                    </td>
                    <td colspan="2" class="text-left">
                        Nomor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        /&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        /DISHUB/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="text-left">Nomor TNKB</td>
                    <td width="140px">:&nbsp;{{$p->nopol}}</td>
                </tr>
                <tr>
                    <td class="text-left">Kode Perusahaan</td>
                    <td>:&nbsp;{{$p->kodeperusahaan}}</td>
                </tr>
                <tr>
                    <td class="text-left">Nama Perusahaan</td>
                    <td>:&nbsp;{{$p->namaperusahaan}}</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-left">TRAYEK&nbsp;:&nbsp;{{$p->trayek}}</td>
                </tr>
                <tr>
                    <td class="text-center">DISHUB PROV.NTB</td>
                    <td class="text-left">Masa Berlaku S/D</td>
                    <td>:&nbsp;{{ date("d-m-Y", strtotime($p->masaberlaku)) }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="page-break"></div>
    <div class="container">
        <div class="wrapper">
            <table id="table3">
                <tbody>
                    <tr>
                        <td class="table3td-1">KEPALA DINAS PERHUBUNGAN</td>
                    </tr>
                    <tr>
                        <td class="table3td-1">PROVINSI NUSA TENGGARA BARAT</td>
                    </tr>
                    <tr>
                        <td class="table3td-1"></td>
                    </tr>
                    <tr>
                        <td height="50px"></td>
                    </tr>
                    <tr>
                        <td class="table3td-1"><u>LALU MOH. FAOZAL</u></td>
                    </tr>
                    <tr>
                        <td class="table3td-2">Pembina Utama Madya (IV/d)</td>
                    </tr>
                    <tr>
                        <td class="table3td-2">NIP. 19661231 198608 1 007</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
