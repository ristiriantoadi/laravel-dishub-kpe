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

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <style>
        .swiper-container{
            /* height:300px; */
            /* width:100%; */
        }
    </style>


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
    <style>
        .btn-pencarian{
            /* border: 1px solid #ccc; */
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
    <header class="text-white text-center"
        style="background:url('home/img/tesaja.jpg')no-repeat center center;background-size:cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div style="padding-top:120px;padding-bottom:120px">
                        <h1 class="mb-5">DINAS PERHUBUNGAN PROVINSI NUSA TENGGARA BARAT</h1>
                        <h2 class="mb-1">SISTEM INFORMASI KARTU PENGAWASAN ELEKTRONIK</h2>
                        <span style="display:flex;justify-content: center;">
                            <button type="button" onclick="buttonPencarianClicked(this)" id="pengecekan-nomor-mesin" class="btn btn-secondary btn-pencarian aktif">Pengecekan Nomor Mesin</button>
                            <button type="button" onclick="buttonPencarianClicked(this)" id="pencarian-trayek" class="btn btn-secondary btn-pencarian">Pencarian Trayek</button>
                            <button type="button" onclick="buttonPencarianClicked(this)" id="pencarian-perusahaan" class="btn btn-secondary btn-pencarian">Pencarian Perusahaan</button>
                        </span>
                        <div id="box-pengecekan-nomor-mesin" class="box-pencarian visible"> 
                            <form class="mt-3" action="/" method="get">
                                @csrf
                                <div class="form-row">
                                    <div class="col-12 col-md-9 mb-2 mb-md-0">
                                        <input class="form-control form-control-lg" value="{{ old('cari') }}" name="cari"
                                            type="text" placeholder="Masukan nopol atau Nomer Mesin...">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <button class="btn btn-primary btn-block btn-lg" type="submit">CEK</button>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-4">
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
                                @endforeach
                            </div>
                        </div>
                        <div id="box-pencarian-trayek" class="box-pencarian">
                            <div class="mt-3">
                                <div class="form-row">
                                    <div class="col-12 col-md-9 mb-2 mb-md-0">
                                        <input list="trayeks" class="form-control form-control-lg" name="namaTrayek"
                                                type="text" id="input-nama-trayek" placeholder="Masukkan nama trayek...">
                                        <datalist id="trayeks">
                                            @foreach($trayeks as $trayek)
                                                <option value="{{$trayek}}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <button class="btn btn-primary btn-block btn-lg" onclick="cariTrayek()" type="button">Cari</button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div id="box-pencarian-perusahaan" class="box-pencarian">
                            <div class="mt-3">
                                <div class="form-row">
                                    <div class="col-12 col-md-9 mb-2 mb-md-0">
                                        <input list="namaPerusahaans" class="form-control form-control-lg" name="namaPerusahaan"
                                                type="text" id="input-nama-perusahaan" placeholder="Masukkan nama perusahaan ...">
                                        <datalist id="namaPerusahaans">
                                            @foreach($namaPerusahaans as $namaPerusahaan)
                                                <option value="{{$namaPerusahaan}}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <button class="btn btn-primary btn-block btn-lg" onclick="cariPerusahaan()" type="button">Cari</button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-top:15px;padding-bottom:15px" class="text-dark text-left col-md-4 pemberitahuan">
                    @if(count($pemberitahuans)>0)
                        <div class="card" style="height:600px;overflow:scroll">
                            <div class="card-body">
                                <h5 class="card-title">Pemberitahuan</h5>
                                <div class="swiper-container">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- Slides -->
                                        @foreach($pemberitahuans as $pemberitahuan)
                                            <div class="swiper-slide">
                                                <div class="mt-3">
                                                    <a href="{{$pemberitahuan->file_upload}}"><h6>{{$pemberitahuan->judul}}</h6></a>
                                                    <img style="max-width:100%;text-align:center;display:block;margin: 0 auto" src="{{$pemberitahuan->file_upload}}"/>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- If we need pagination -->
                                    <div class="swiper-pagination"></div>

                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>

                                    <!-- If we need scrollbar -->
                                    <div class="swiper-scrollbar"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-auto h-100 text-center text-lg-left">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="https://goo.gl/maps/7U3hXEdQuvwH77VC8">Alamat</a></li>
                        <li class="list-inline-item"><span>???</span></li>
                        <li class="list-inline-item"><a href="mailto:dishub@ntbprov.go.id">Email</a></li>
                        <li class="list-inline-item"><span>???</span></li>
                        <li class="list-inline-item"><a href="#">Tanggal :
                                {{ date('d-m-Y') }}</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">?? DISHUB NTB 2020.</p>
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
    <template id="template-row-perusahaan">
        <tr>
            <td id="kolom-nama-perusahaan">PO Amanah Express</td>
            <td id="kolom-jumlah-unit">3 Unit</td>
        </tr>
    </template>

    <template id="template-row-total">
        <tr>
            <td colspan="3"><b>Total</b></td>
            <td id="jumlah-unit-total">6 Unit</td>
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
    <template id="template-row-trayek">
        <tr>
            <td id="kolom-trayek">Terminal Mandalika - Pancor - PP</td>
        </tr>        
    </template>
    <template id="template-hasil-pencarian-perusahaan">
        <div id="hasil-pencarian-perusahaan" class="card mt-4">
            <div class="card-body">                                
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Trayek yang Dilayani</th>
                        </tr>
                    </thead>
                    <tbody id="body-table-pencarian-perusahaan">
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
        //there are three possible states:
        //1. pengecekan-nomor-mesin
        //2. pencarian-trayek
        //3. pencarian-perusahaan
        var state="pengecekan-nomor-mesin"; 
        function buttonPencarianClicked(item) {
            var targetElement = item
            if(targetElement.id == "pengecekan-nomor-mesin"){
                if(state != "pengecekan-nomor-mesin"){

                    //remove all boxes EXCEPT pengecekan-nomor-mesin
                    document.getElementById("pencarian-trayek").classList.remove("aktif");
                    document.getElementById("pencarian-perusahaan").classList.remove("aktif");
                    document.getElementById("box-pencarian-trayek").classList.remove("visible");
                    document.getElementById("box-pencarian-perusahaan").classList.remove("visible");

                    //initialized pengecekan-nomor-mesiin
                    document.getElementById("pengecekan-nomor-mesin").classList.add("aktif");
                    document.getElementById("box-pengecekan-nomor-mesin").classList.add("visible");
                    
                    //reset box-pencarian-trayek
                    // var element = document.getElementById("hasil-pencarian-trayek");
                    // if(element){
                    //     element.parentNode.removeChild(element);
                    // }

                    state="pengecekan-nomor-mesin"
                }
            }else if(targetElement.id == "pencarian-trayek"){
                if(state != "pencarian-trayek"){
                    
                    //remove all boxes EXCEPT pencarian-trayek
                    document.getElementById("pengecekan-nomor-mesin").classList.remove("aktif");
                    document.getElementById("pencarian-perusahaan").classList.remove("aktif");
                    document.getElementById("box-pengecekan-nomor-mesin").classList.remove("visible");
                    document.getElementById("box-pencarian-perusahaan").classList.remove("visible");

                    //initialized pencarian-trayek
                    document.getElementById("pencarian-trayek").classList.add("aktif");
                    document.getElementById("box-pencarian-trayek").classList.add("visible");

                    //reset box-pengecekan-nomor-mesin
                    // var element = document.getElementById("hasil-cek-nomor-mesin");
                    // if(element){
                    //     element.parentNode.removeChild(element);
                    // }

                    state="pencarian-trayek";
                }
            }else{
                if(state != "pencarian-perusahaan"){

                    //remove all boxes EXCEPT pencarian-perusahaan
                    document.getElementById("pengecekan-nomor-mesin").classList.remove("aktif");
                    document.getElementById("pencarian-trayek").classList.remove("aktif");
                    document.getElementById("box-pengecekan-nomor-mesin").classList.remove("visible");
                    document.getElementById("box-pencarian-trayek").classList.remove("visible");

                    //initialized pencarian-perusahaan
                    document.getElementById("pencarian-perusahaan").classList.add("aktif");
                    document.getElementById("box-pencarian-perusahaan").classList.add("visible");

                    state="pencarian-perusahaan"
                }
            }
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
                clone.querySelector('#kolom-trayek').innerHTML=data.trayek;
                clone.querySelector('#kolom-trayek').rowSpan=rowspan;
                clone.querySelector('#kolom-jumlah-armada').innerHTML=data.jumlahArmada;
                clone.querySelector('#kolom-jumlah-armada').rowSpan=rowspan;
                clone.querySelector('#first-perusahaan').innerHTML=data.perusahaans[0].namaPerusahaan;
                clone.querySelector('#first-jumlah-unit-per-perusahaan').innerHTML=data.perusahaans[0].jumlahUnit;

                //render the remaining rows
                for (i = 1; i < data.perusahaans.length; i++) {
                    var namaPerusahaan = data.perusahaans[i].namaPerusahaan;
                    var jumlahUnit = data.perusahaans[i].jumlahUnit;
                    
                    //clone template
                    var template = document.getElementById("template-row-perusahaan");
                    var cloneRowPerusahaan = template.content.cloneNode(true)

                    //insert data to template
                    cloneRowPerusahaan.querySelector('#kolom-nama-perusahaan').innerHTML=namaPerusahaan;
                    cloneRowPerusahaan.querySelector('#kolom-jumlah-unit').innerHTML=jumlahUnit;

                    var containingElement = clone.querySelector("#body-table-pencarian-trayek")
                    containingElement.appendChild(cloneRowPerusahaan);

                } 

                //render row total
                //clone template
                var template = document.getElementById("template-row-total")
                var cloneRowTotal = template.content.cloneNode(true)

                //insert data to template
                cloneRowTotal.querySelector('#jumlah-unit-total').innerHTML=data.jumlahArmada;
                
                var containingElement = clone.querySelector("#body-table-pencarian-trayek")
                containingElement.appendChild(cloneRowTotal);

                var containingElement = document.getElementById("box-pencarian-trayek")
                containingElement.appendChild(clone)
            }
        }

        function renderHasilPencarianPerusahaan(data){
            if ('content' in document.createElement('template')) {
                
                //delete old element
                var element=document.getElementById("hasil-pencarian-perusahaan");
                if(element){
                    element.parentNode.removeChild(element);
                }

                //clone template hasil pencarian
                var template = document.getElementById("template-hasil-pencarian-perusahaan")
                var cloneHasilPencarianPerusahaan = template.content.cloneNode(true)

                //insert data to template
                //render rows
                for (i = 0; i < data.trayeks.length; i++) {
                    var trayek = data.trayeks[i];
                    
                    //clone template
                    var template = document.getElementById("template-row-trayek");
                    var cloneRowTrayek = template.content.cloneNode(true)

                    //insert data to template
                    cloneRowTrayek.querySelector('#kolom-trayek').innerHTML=trayek;
                    
                    var containingElement = cloneHasilPencarianPerusahaan.querySelector("#body-table-pencarian-perusahaan")
                    containingElement.appendChild(cloneRowTrayek);
                } 

                var containingElement = document.getElementById("box-pencarian-perusahaan")
                containingElement.appendChild(cloneHasilPencarianPerusahaan)
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

        function cariPerusahaan(){
            var namaPerusahaan = document.getElementById("input-nama-perusahaan").value
            fetch(`/pencarian-perusahaan?namaPerusahaan=${namaPerusahaan}`,{
                method:"GET",
            })
            .then(res=>{
                return res.json()
            })
            .then(data=>{
                renderHasilPencarianPerusahaan(data);
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
    <script>
        const swiper = new Swiper('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            autoplay: {
                delay: 20000,
                disableOnInteraction: false,
            },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            // scrollbar: {
            //     el: '.swiper-scrollbar',
            // },
        });
    </script>
</body>

</html>