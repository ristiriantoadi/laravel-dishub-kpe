<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('HalAdmin/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('HalAdmin/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('HalAdmin/fonts/ionicons.min.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon">
                        <img src="{{ asset('gambar/dishub.png') }}" height="50px" width="40px">
                    </div>
                    <div class="sidebar-brand-text mx-3"><span>DISHUB NTB</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{url('/dashboard')}}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                        <a class="nav-link active" href="{{url('/input')}}">
                            <i class="fas fa-database"></i>
                            <span>Input Data</span></a>
                        <a class="nav-link active" href="{{url('/kendaraans')}}">
                            <i class="fas fa-edit"></i>
                            <span>Edit Data</span></a>
                        <a class="nav-link active" href="{{url('/delete')}}">
                            <i class="fas fa-times-circle"></i>
                            <span>Delete Data</span></a>
                        <a class="nav-link active" href="{{url('/print')}}">
                            <i class="fas fa-print"></i>
                            <span>Print</span></a>
                        <a class="nav-link active" href="{{url('/expired/kartu')}}">
                            <i class="fas fa-print"></i>
                            <span>Kartu Expired</span> | <span class="badge @if ($kartu_expired_notif_length>0) badge-warning @else badge-light  @endif">{{$kartu_expired_notif_length}}</span></a>
                        <a class="nav-link active" href="{{url('/expired/sk')}}">
                            <i class="fas fa-print"></i>
                            <span>SK Expired</span> | <span class="badge @if ($sk_expired_notif_length>0) badge-warning @else badge-light  @endif">{{$sk_expired_notif_length}}</span></a>
                        <a class="nav-link active" href="{{url('/rekap')}}">
                            <i class="fas fa-database"></i>
                            <span>Rekap Data</span></a>
                        <!--
                        <a class="nav-link active" href="index.html">
                            <i class="icon ion-android-settings"></i>
                            <span>Setting</span></a>
                            -->
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                @yield('container')

                <footer class="bg-white sticky-footer mt-5">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Dinas Perhubungan NTB © 2020</span></div>
                    </div>
                </footer>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        <script src="{{ asset('HalAdmin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('HalAdmin/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('HalAdmin/js/chart.min.js') }}"></script>
        <script src="{{ asset('HalAdmin/js/bs-charts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="{{ asset('HalAdmin/js/theme.js') }}"></script>
		
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

        <script>
        $(document).ready(function() {
            $('#datalol').DataTable();
        });
        console.log("this is a test")
        </script>
</body>

</html>