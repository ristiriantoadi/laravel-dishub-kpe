@extends('layout/admin')

@section('title', 'SK Expired')

@php
    if (file_exists("app/Helpers/Helper.php")){
        include "app/Helpers/Helper.php";
    }
@endphp

@section('container')
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
            <i class="fas fa-bars"></i>
        </button>

        <!-- @include('expired.form_cari_field_kendaraan_expired',['url' => '/expired/sk/cari']) -->
        @include('expired.form_cari_field_kendaraan_expired')

        <ul class="nav navbar-nav flex-nowrap ml-auto">
            <!-- <li class="nav-item dropdown d-sm-none no-arrow">
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
            </li> -->
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
        <h3 class="text-dark mb-0">SK Expired</h3>
    </div>
    
    @include('expired.form_tanggal_pencarian_expired')

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
                <th scope="col">Tanggal Awal SK</th>
                <th scope="col">Tanggal Akhir SK</th>
                <th scope="col">Status</th>
                <!-- <th scope="col">Aksi</th> -->
            </tr>
        </thead>
        <tbody>
        @foreach($kendaraans as $k)
                <tr>
                    @php
                        $loop->iteration = get_table_row_number($loop->iteration,$kendaraans->perPage(),$kendaraans->currentPage());
                    @endphp
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$k->namaperusahaan}}</td>
                    <td>{{$k->nomesin}}</td>
                    <td>{{$k->nopol}}</td>
                    <td>
                        @if ($k->tglawalsk)
                            @php
                                $k->tglawalsk = date("d-m-Y", strtotime($k->tglawalsk));
                            @endphp
                            {{$k->tglawalsk}}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($k->tglakhirsk)
                            @php
                                $k->tglakhirsk = date("d-m-Y", strtotime($k->tglakhirsk));
                            @endphp
                            {{$k->tglakhirsk}}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($k->status_sk == "expired")
                            @include('expired.status_badge_expired')
                        @elseif ($k->status_sk == "menjelang_expired")
                            @php
                                if(isset($tanggalPencarian)){
                                    $diff = days_diff(strtotime($k->tglakhirsk),strtotime($tanggalPencarian));
                                }else{
                                    $diff = days_diff(strtotime($k->tglakhirsk),time());
                                }        
                                $diff = abs($diff);
                            @endphp
                            @include('expired.status_badge_menjelang_expired')
                        @endif
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
	</div> <!-- tutup responsive -->
    
    @include('components.pagination')

	</div>
	</div>
</div>
@endsection