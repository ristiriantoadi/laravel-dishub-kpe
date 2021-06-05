<?php 
    if (file_exists("app/Helpers/Helper.php")){
        include "app/Helpers/Helper.php";
    }
?>

@extends('layout/admin')

@section('title', 'Upload Pemberitahuan')

@section('container')
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid">

        <ul class="nav navbar-nav flex-nowrap ml-auto">
            <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                </div>
            </li>
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown no-arrow" role="presentation">
            <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                    aria-expanded="false" href="#"><span
                        class="d-none d-lg-inline mr-2 text-gray-600 small">Admin</span><img
                        class="border rounded-circle img-profile" src="{{ asset('HalLogin/img/loglogin.png') }}"></a>
                <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                    <a class="dropdown-item" role="presentation" href="{{url('/profils')}}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                    <a class="dropdown-item" role="presentation" href="{{url('/logout')}}">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                </div>
            </li>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <!-- <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Upload Pemberitahuan</h3>
    </div> -->
    <div class="row">
        <div class="col">
            <div class="d-sm-flex justify-content-between align-items-center mb-3">
                <h4 class="text-dark mb-0">Daftar Pemberitahuan</h4>
            </div>
            <ol>
                @foreach($pemberitahuans as $pemberitahuan)
                    <li>
                        <div class="mb-5">
                            <h5>{{$pemberitahuan->judul}}</h5>
                            <form method="POST" enctype="multipart/form-data" action="/pemberitahuan/edit/{{$pemberitahuan->id}}">
                                @csrf
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" required name="judul" value="{{$pemberitahuan->judul}}" class="form-control" id="judul" placeholder="Judul pemberitahuan ... ">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea required class="form-control" id="keterangan" name="keterangan" rows="3">{{$pemberitahuan->keterangan}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file">Berkas</label>
                                    <input type="file" class="form-control-file mb-1" id="file" name="file">
                                    @if($pemberitahuan->file_upload)
                                        <span>File: <a href="{{url($pemberitahuan->file_upload)}}">{{get_filename($pemberitahuan->file_upload)}}</a></span>
                                    @else
                                        <span>File: -</span>
                                    @endif
                                </div>
                                <span>
                                    <!-- <a href="#" class="btn btn-success">Simpan</a> -->
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <button type="button" onclick="hapus({{$pemberitahuan->id}})" class="btn btn-danger">Hapus</button>
                                    <!-- <button type="button" class="btn btn-danger">Hapus</button> -->
                                    <!-- <a href="/pemberitahuan/delete/{{$pemberitahuan->id}}" class="btn btn-danger">Hapus</a> -->
                                    <!-- <button type="button" class="btn btn-success">Simpan</button> -->
                                    <!-- <button type="button" class="btn btn-danger">Hapus</button> -->
                                </span>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
        <div class="col">
            <div class="d-sm-flex justify-content-between align-items-center mb-3">
                <h4 class="text-dark mb-0">Upload Pemberitahuan</h4>
            </div>
            <form action="/pemberitahuan" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input required type="text" name="judul" class="form-control" id="judul" placeholder="Judul pemberitahuan ... ">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea required class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="file">Berkas</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    console.log("f");
    function hapus(id){
        if(confirm("Anda yakin ingin menghapus pemberitahuan?")){
            // console.log("yes");
            window.location.replace(`/pemberitahuan/delete/${id}`);
        }
    }
</script>
@endsection