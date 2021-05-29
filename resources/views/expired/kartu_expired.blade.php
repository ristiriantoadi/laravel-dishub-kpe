@php
    if (file_exists("app/Helpers/Helper.php")){
        include "app/Helpers/Helper.php";
    }
@endphp

@extends('layout/admin')

@section('title', 'Kartu Expired')

@section('container')
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
            <i class="fas fa-bars"></i>
        </button>

        <form action="/expired/kartu/cari" method="GET"
            class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input class="bg-light form-control border-0 small" type="text" placeholder="Cari Data Kendaraan ..."
                    value="{{ old('cari') }}" name="cari">
                <input class="bg-light form-control border-0 small" type="text" placeholder="Cari Data Kendaraan ..."
                    value="{{ old('cari') }}" name="cari">
                <div class="input-group-append">
                    <button class="btn btn-primary py-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <ul class="nav navbar-nav flex-nowrap ml-auto">
            <li class="nav-item dropdown d-sm-none no-arrow">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                    <i class="fas fa-search"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto navbar-search w-100" action="/kendaraans/cari" method="GET">
                        <div class="input-group">
                            <input class="bg-light form-control border-0 small" type="text"
                                placeholder="Cari Data Kendaraan ..." name="cari" value="{{ old('cari') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary py-0" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                </div>
            </li>
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown no-arrow" role="presentation">
            <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                    aria-expanded="false" href="#"><span
                        class="d-none d-lg-inline mr-2 text-gray-600 small">{{ auth()->user()->name }}</span><img
                        class="border rounded-circle img-profile" src="{{ asset('HalLogin/img/loglogin.png') }}"></a>
                <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a
                        class="dropdown-item" role="presentation" href="{{url('/profils')}}"><i
                            class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                    <a class="dropdown-item" role="presentation" href="{{url('/logout')}}">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                </div>
            </li>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Kartu Expired</h3>
    </div>
    @include('expired.form_tanggal_pencarian_expired',['url' => '/expired/kartu/cari'])
	<div class="card shadow border-left-primary py-2">
    <div class="card-body">

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
    </div>
    @endif

	<div class="table-responsive">
    <table style="width:100%" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Perusahaan</th>
                <th scope="col">Nomor Mesin</th>
                <th scope="col">TNKB / NOPOL</th>
                <th scope="col">Masa Berlaku</th>
                <th scope="col">Status</th>
                <!-- <th scope="col">Aksi</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($kendaraans as $k)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$k->namaperusahaan}}</td>
                    <td>{{$k->nomesin}}</td>
                    <td>{{$k->nopol}}</td>
                    <td>
                        @if ($k->masaberlaku)
                            {{$k->masaberlaku}}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($k->status_kartu == "expired")
                            @include('expired.status_badge_expired')
                        @elseif ($k->status_kartu == "menjelang_expired")
                            @php
                                $diff = days_diff(strtotime($k->masaberlaku),time())        
                            @endphp
                            @include('expired.status_badge_menjelang_expired')
                        @endif
                    </td>
                </tr>
                <!-- <tr>
                <td colspan="6" style="font-weight:600">Rabu, 26 Mei 2021</td>
                <tr>
                    <th scope="row">1</th>
                    <td>Adi Sobri</td>
                    <td>4D31-046759</td>
                    <td>DR 7779 KZ</td>
                    <td>2021-02-10</td>
                    <td>
                        <button type="button" style="background-color:#f5a003;color:#ffffff;font-weight:600;font-size:95%" class="btn"><i class="fas fa-exclamation-circle"></i> 30 hari menjelang expired</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Adi Sobri</td>
                    <td>4D31-046759</td>
                    <td>DR 7779 KZ</td>
                    <td>2021-02-10</td>
                    <td>
                        <button type="button" style="font-size:95%;background-color:#f5a003;color:#ffffff;font-weight:600" class="btn"><i class="fas fa-exclamation-circle"></i> 14 hari menjelang expired</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="font-weight:600">Selasa, 25 Mei 2021</td>
                <tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Adi Sobri</td>
                    <td>4D31-046759</td>
                    <td>DR 7779 KZ</td>
                    <td>2021-02-10</td>
                    <td>
                        <button type="button" style="font-size:95%;background-color:#f5a003;color:#ffffff;font-weight:600" class="btn"><i class="fas fa-exclamation-circle"></i> 7 hari menjelang expired</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="font-weight:600">Senin, 24 Mei 2021</td>
                <tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Adi Sobri</td>
                    <td>4D31-046759</td>
                    <td>DR 7779 KZ</td>
                    <td>2021-02-10</td>
                    <td>
                        <button type="button" style="font-size:95%;background-color:#fe0000;color:#ffffff;font-weight:600" class="btn"><i class="fas fa-exclamation-circle"></i> Expired</button>
                    </td>
                </tr> -->
            @endforeach
        </tbody>
    </table>
	</div> <!-- tutup responsive -->

	</div>
	</div>
</div>
@endsection