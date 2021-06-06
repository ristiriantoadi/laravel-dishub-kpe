<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dinas Perhubungan Provinsi NTB</title>
    <link rel="stylesheet" href="home/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="home/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="home/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
        </div>
    </nav>

    <header class="masthead text-white text-center"
        style="background:url('home/img/tesaja.jpg')no-repeat center center;background-size:cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- <div class="col-xl-10"> -->
                    <div>
                        <h1 class="mb-5">DINAS PERHUBUNGAN PROVINSI NUSA TENGGARA BARAT</h1>
                        <h2 class="mb-1">SISTEM INFORMASI KARTU PENGAWASAN ELEKTRONIK</h2>
                        <span style="display:flex;justify-content: center;">
                            <button type="button" onclick="buttonPencarianClicked(this)" id="pengecekan-nomor-mesin" class="btn btn-secondary btn-pencarian aktif">Pengecekan Nomor Mesin</button>
                            <button type="button" onclick="buttonPencarianClicked(this)" id="pencarian-trayek" class="btn btn-secondary btn-pencarian">Pencarian Trayek</button>
                        </span>
                        <div id="box-pengecekan-nomor-mesin" class="box-pencarian visible"> 
                            <div class="mt-3">
                                <div class="form-row">
                                    <div class="col-12 col-md-9 mb-2 mb-md-0">
                                        <input class="form-control form-control-lg" id="input-nomor-mesin" value="{{ old('cari') }}" name="cari"
                                            type="text" placeholder="Masukan Nomer Mesin...">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <button class="btn btn-primary btn-block btn-lg" onclick="cekNomorMesin()" type="button">CEK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="box-pencarian-trayek" class="box-pencarian">
                            <div class="mt-3">
                                <div class="form-row">
                                    <div class="col-12 col-md-9 mb-2 mb-md-0">
                                        <input class="form-control form-control-lg" name="namaTrayek"
                                                type="text" id="input-nama-trayek" placeholder="Masukkan nama trayek...">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <button class="btn btn-primary btn-block btn-lg" onclick="cariTrayek()" type="button">Cari</button>
                                    </div>
                                </div> 
                            </div>
                            <!-- <div class="card mt-4">
                                <div class="card-body">                                
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Trayek</th>
                                                <th scope="col">Jumlah Armada</th>
                                                <th colspan="2" scope="col">Perusahaan yang Melayani</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="3">1</td>
                                                <td rowspan="3">Terminal Mandalika - Pancor - PP</td>
                                                <td rowspan="3">60</td>
                                                <td>PO Adi Sobri</td>
                                                <td>2 Unit</td>
                                            </tr>
                                            <tr>
                                                <td>PO Amanah Express</td>
                                                <td>3 Unit</td>
                                            </tr>
                                            <tr>
                                                <td>PO Colombia</td>
                                                <td>1 Unit</td>
                                            </tr>            
                                            <tr>
                                                <td colspan="4"><b>Total</b></td>
                                                <td>6 Unit</td>
                                            </tr>                                
                                       </tbody>
                                    </table>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- <div class="col-md-10 col-lg-8 col-xl-7">
                        <form action="/" method="get">
                            @csrf
                            <div class="form-row">
                                <div class="col-12 col-md-9 mb-2 mb-md-0">
                                    <input class="form-control form-control-lg" value="{{ old('cari') }}" name="cari"
                                        type="text" placeholder="Masukan Nomer Mesin...">
                                </div>
                                <div class="col-12 col-md-3">
                                    <button class="btn btn-primary btn-block btn-lg" type="submit">CEK</button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                </div>
                <div class="text-dark text-left col-md-4">
                    @if(count($pemberitahuans)>0)
                        <div class="card" style="max-height:500px;overflow:scroll">
                            <div class="card-body">
                                <h5 class="card-title">Pemberitahuan</h5>
                                <ol>
                                    @foreach($pemberitahuans as $pemberitahuan)
                                        <li>
                                            <div>
                                                <b>{{$pemberitahuan->judul}}</b>
                                                <p class="mb-0">{{$pemberitahuan->keterangan}}</p>
                                                @if($pemberitahuan->file_upload)
                                                    <span>File: <a href="{{url($pemberitahuan->file_upload)}}">{{get_filename($pemberitahuan->file_upload)}}</a></span>
                                                @else
                                                <span>File: -</span>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <!-- <div class="col-md-5 mt-4 mx-auto">
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
                    Masa Berlaku S/D : <b>{{ date("d-m-Y", strtotime($p->masaberlaku)) }}</b>
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
                    Masa Berlaku S/D : <b>{{ date("d-m-Y", strtotime($p->masaberlaku)) }}</b>
                </div>
                @endif

                @endforeach -->

                <!--
                @if($cari != "")
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Nomer Mesin <strong>TIDAK DITEMUKAN!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                -->


            <!-- </div> -->
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
                                {{ date('d-m-Y') }}</a></li>
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
    <template id="row-perusahaan">
        <tr>
            <td>PO Amanah Express</td>
            <td>3 Unit</td>
        </tr>
    </template>
    <template id="row-total">
        <tr>
            <td colspan="4"><b>Total</b></td>
            <td>6 Unit</td>
        </tr>   
    </template>
    <template id="template-hasil-pencarian-trayek">
        <div id="hasil-pencarian-trayek" class="card mt-4">
            <div class="card-body">                                
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nama Trayek</th>
                            <th scope="col">Jumlah Armada</th>
                            <th colspan="2" scope="col">Perusahaan yang Melayani</th>
                        </tr>
                    </thead>
                    <tbody id="body-table-pencarian-trayek">
                        <tr>
                            <td rowspan="3" id="kolom-trayek">Terminal Mandalika - Pancor - PP</td>
                            <td rowspan="3" id="kolom-jumlah-armada">60</td>
                            <td id="first-perusahaan">PO Adi Sobri</td>
                            <td id="first-jumlah-unit-per-perusahaan">2 Unit</td>
                        </tr>                                
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </template>
    <template id="template-hasil-cek-nomor-mesin">
        <div id="hasil-cek-nomor-mesin" class="mt-4">
            <div class="alert alert-danger" role="alert">
                Nomor Mesin <b id="nomesin">nomesin</b> <b id="status-kendaraan">TIDAK AKTIF</b>
                </br>
                Nomor TNBK : <b id="nopol">nopol</b>
                </br>
                Kode Perusahaan : <b id="kodeperusahaan">kodeperusahaan</b>
                </br>
                Nama Perusahaan : <b id="namaperusahaan">namaperusahaan</b>
                </br>
                Trayek : <b id="trayek">trayek</b>
                </br>
                Masa Berlaku S/D : <b id="masaberlaku">masaberlaku</b>
            </div>
        </div>
    </template>    
    <script src="home/js/jquery.min.js"></script>
    <script src="home/bootstrap/js/bootstrap.min.js"></script>
    <script src="home/js/bs-animation.js"></script>
    <script>
        var state="pengecekan-nomor-mesin";
        function buttonPencarianClicked(item) {
            var targetElement = item
            if(targetElement.id == "pengecekan-nomor-mesin"){
                if(state == "pencarian-trayek"){
                    document.getElementById("pengecekan-nomor-mesin").classList.add("aktif");
                    document.getElementById("pencarian-trayek").classList.remove("aktif");

                    document.getElementById("box-pengecekan-nomor-mesin").classList.add("visible");
                    document.getElementById("box-pencarian-trayek").classList.remove("visible");

                    //reset box-pencarian-trayek
                    var element = document.getElementById("hasil-pencarian-trayek");
                    if(element){
                        element.parentNode.removeChild(element);
                    }

                    state="pengecekan-nomor-mesin"
                }
            }else{
                if(state == "pengecekan-nomor-mesin"){
                    document.getElementById("pencarian-trayek").classList.add("aktif");
                    document.getElementById("pengecekan-nomor-mesin").classList.remove("aktif");

                    document.getElementById("box-pencarian-trayek").classList.add("visible");
                    document.getElementById("box-pengecekan-nomor-mesin").classList.remove("visible");
                    
                    //reset box-pengecekan-nomor-mesin
                    var element = document.getElementById("hasil-cek-nomor-mesin");
                    if(element){
                        element.parentNode.removeChild(element);
                    }

                    state="pencarian-trayek";
                }
            }

            //reset hasil box
            // var noMesin = document.getElementById("hasil-cek-nomor-mesin");
            // if(noMesin){
            //     noMesin.parentNode.removeChild(noMesin);
            // }
        }

        function renderHasilPencarianTrayek(data){
            if ('content' in document.createElement('template')) {
                //delete old element
                var element=document.getElementById("hasil-pencarian-trayek");
                if(element){
                    element.parentNode.removeChild(element);
                }

                //clone template
                var template = document.getElementById("template-hasil-pencarian-trayek")
                var clone = template.content.cloneNode(true)

                //insert data to template
                var rowspan=data.perusahaans.length.toString();
                console.log("rowspan",rowspan);
                clone.querySelector('#kolom-trayek').innerHTML=data.trayek;
                clone.querySelector('#kolom-trayek').rowSpan=rowspan;
                clone.querySelector('#kolom-jumlah-armada').innerHTML=data.jumlahArmada;
                clone.querySelector('#kolom-jumlah-armada').rowSpan=rowspan;
                clone.querySelector('#first-perusahaan').innerHTML=data.perusahaans[0].namaPerusahaan;
                clone.querySelector('#first-jumlah-unit-per-perusahaan').innerHTML=data.perusahaans[0].jumlahUnit;

                var containingElement = document.getElementById("box-pencarian-trayek")
                containingElement.appendChild(clone)

            }
        }

        function renderHasilCekNomorMesin(data){
            if ('content' in document.createElement('template')) {

                //delete old element
                var element=document.getElementById("hasil-cek-nomor-mesin");
                if(element){
                    element.parentNode.removeChild(element);
                }
                
                //clone template
                var template = document.getElementById("template-hasil-cek-nomor-mesin")
                var clone = template.content.cloneNode(true)

                //insert data to template
                clone.querySelector('#nomesin').innerHTML=data.nomesin;
                clone.querySelector('#status-kendaraan').innerHTML="Aktif";
                clone.querySelector('#nopol').innerHTML=data.nopol;
                clone.querySelector('#kodeperusahaan').innerHTML=data.kodeperusahaan;
                clone.querySelector('#namaperusahaan').innerHTML=data.namaperusahaan;
                clone.querySelector('#trayek').innerHTML=data.trayek;
                clone.querySelector('#masaberlaku').innerHTML=data.masaberlaku;

                
                //add to containing element
                var containingElement = document.getElementById("box-pengecekan-nomor-mesin")
                containingElement.appendChild(clone)
            }else{
            //find another way not using template tag
            }

        }

        function cariTrayek(){
            var namaTrayek = document.getElementById("input-nama-trayek").value
            fetch(`/pencarian-trayek?namaTrayek=${namaTrayek}`,{
                method:"GET",
            })
            .then(res=>{
                return res.json()
            })
            .then(data=>{
                console.log("data",data);
                console.log("jumlah armada",data.jumlahArmada);
                console.log("perusahaans",data.perusahaans);
                renderHasilPencarianTrayek(data);
            })
            .catch((error)=>{
                console.log("error",error)
            });
        }

        function cekNomorMesin(){
            var nomorMesin = document.getElementById("input-nomor-mesin").value
            fetch(`/cek-nomor-mesin?nomorMesin=${nomorMesin}`,{
                method:"GET",
            })
            .then(res=>{
                return res.json()
            })
            .then(data=>{
                console.log("data nopol",data["kendaraan"][0].nopol)
                //render the data
                renderHasilCekNomorMesin(data["kendaraan"][0]);
            })
            .catch((error)=>{
                console.log("error",error)
            });
        }
    </script>
</body>

</html>