@php
    if (file_exists("app/Helpers/Helper.php")){
        include "app/Helpers/Helper.php";
    }
@endphp

@extends('layout/admin')

@section('title', 'Rekap Data')

@section('container')
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
            <i class="fas fa-bars"></i>
        </button>
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
        <h3 class="text-dark mb-0">Rekap Data</h3>
    </div>
	<div class="card shadow border-left-primary py-2">
        <div class="card-body">
            <a href="{{url('/rekap/export')}}" class="btn btn-info"><i class="fas fa-database"></i> Rekap Data (Perusahaan dan Trayek)</a>
            <a href="{{url('/rekap/export/jenis_pelayanan_angkutan')}}" class="btn btn-success"><i class="fas fa-database"></i> Rekap Data (Jenis Pelayanan Angkutan)</a>
        </div>
	</div>
</div>
@endsection