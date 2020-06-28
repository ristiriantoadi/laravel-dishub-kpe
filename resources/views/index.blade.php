<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="home/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="home/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="home/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <style>
    .map-responsive {
        overflow: hidden;
        padding-bottom: 50%;
        position: relative;
        height: 0;
    }

    .map-responsive iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }
    </style>

</head>

<body>
    <nav class="navbar navbar-light navbar-expand bg-light navigation-clean">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="home/img/logo.png" height="50px" width="250px">
            </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <a class="btn btn-primary ml-auto" role="button" href="/login">Admin</a>
            </div>
        </div>
    </nav>

    <header class="masthead text-white text-center"
        style="background:url('home/img/bgfix.jpg')no-repeat center center;background-size:cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5">DINAS PERHUBUNGAN NUSA TENGGARA BARAT</h1>
                    <h2 class="mb-5">SISTEM INFORMASI KARTU PENGAWASAN ELEKTRONIK</h2>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form action="/" method="get">
                        @csrf
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0">
                                <input class="form-control form-control-lg" value="{{ old('cari') }}" name="cari"
                                    type="text" placeholder="Masukan Nomer Kendaraan...">
                            </div>
                            <div class="col-12 col-md-3">
                                <button class="btn btn-primary btn-block btn-lg" type="submit">CEK</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-5 mt-4 mx-auto">
                <input type="hidden" value="{{ $sekarang = date('Y-m-d') }}">
                @foreach($kendaraans as $p)
                <input type="hidden" value="{{ $masa_sk = $p->masaberlaku }}">

                @if($sekarang > $masa_sk)
                <div class="alert alert-danger" role="alert">
                    Nomor Mesin <b>{{$p->nomesin}}</b> <b>TIDAK AKTIF</b>
                    </br>
                    Nomor TNBK : <b>{{$p->nopol}}</b>
                    </br>
                    Kode Perusahaan : <b>{{$p->kodeperusahaan}}</b>
                    </br>
                    Nama Perusahaan : <b>{{$p->namaperusahaan}}</b>
                    </br>
                    Trayek : <b>{{$p->trayek}}</b>
                    </br>
                    Masa Berlaku S/D : <b>{{$p->masaberlaku}}</b>
                </div>
                @else
                <div class="alert alert-success" role="alert">
                    Nomor Mesin <b>{{$p->nomesin}}</b> <b>AKTIF</b>
                    </br>
                    Nomor TNBK <b>{{$p->nopol}}</b>
                    </br>
                    Kode Perusahaan : <b>{{$p->kodeperusahaan}}</b>
                    </br>
                    Nama Perusahaan : <b>{{$p->namaperusahaan}}</b>
                    </br>
                    Trayek : <b>{{$p->trayek}}</b>
                    </br>
                    Masa Berlaku S/D : <b>{{$p->masaberlaku}}</b>
                </div>
                @endif

                @endforeach
            </div>
        </div>
    </header>
    <!--
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-screen-desktop m-auto text-primary"
                                data-bs-hover-animate="pulse"></i></div>
                        <h3>VISI MISI</h3>
                        <p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-layers m-auto text-primary"
                                data-bs-hover-animate="pulse"></i></div>
                        <h3>Struktur Organisasi</h3>
                        <p class="lead mb-0">Featuring the latest build of the new Bootstrap 4 framework!</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-check m-auto text-primary"
                                data-bs-hover-animate="pulse"></i></div>
                        <h3>Profil Pimpinan</h3>
                        <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="showcase"></section>
    -->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-auto h-100 text-center text-lg-left">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="https://goo.gl/maps/7U3hXEdQuvwH77VC8">Alamat</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="mailto:dishub@ntbprov.go.id">Email</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="#">Tanggal :
                                {{ $sekarang = date('d-m-Y') }}</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">© DISHUB NTB 2020.</p>
                </div>
                <div class="col-lg-6 my-auto h-100 text-center text-lg-right">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="https://goo.gl/maps/7U3hXEdQuvwH77VC8"><i
                                    class="fa fa-location-arrow fa-2x fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="mailto:dishub@ntbprov.go.id"><i
                                    class="fa fa-envelope-o fa-2x fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--
    <div class="container-fluid">
        <div class="map-responsive">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.1668172623827!2d116.09143231451759!3d-8.57995428944314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdc0844ead0e71%3A0xff712bee1ea5f8f2!2sDinas%20Perhubungan%20Provinsi%20NTB!5e0!3m2!1sid!2sid!4v1593129366275!5m2!1sid!2sid"
                width="500" height="200" frameborder="0" style="border:0;" allowfullscreen></iframe>
        </div>
    </div>
    -->
    <script src="home/js/jquery.min.js"></script>
    <script src="home/bootstrap/js/bootstrap.min.js"></script>
    <script src="home/js/bs-animation.js"></script>
</body>

</html>