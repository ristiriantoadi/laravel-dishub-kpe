@extends('layout/admin')

@section('title', 'Input Dishub')

@section('container')
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid">
		
		<button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
            <i class="fas fa-bars"></i>
        </button>

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
                        class="d-none d-lg-inline mr-2 text-gray-600 small">{{ auth()->user()->name }}</span><img
                        class="border rounded-circle img-profile" src="{{ asset('HalLogin/img/loglogin.png') }}"></a>
                <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                    <a class="dropdown-item" role="presentation" href="{{url('/profils')}}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                    <!--
                    <a class="dropdown-item" role="presentation" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                    <div class="dropdown-divider"></div>
                    -->
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
        <h3 class="text-dark mb-0">Input Data</h3>
    </div>
	
	<div class="card shadow border-left-primary py-2">
    	<div class="card-body">

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
    </div>
    @endif

    <div class="row">

        <div class="col">
            <form enctype="multipart/form-data" method="post" action="/input">
                @csrf
                <div class="form-group">
                    <label for="nopol">TNKB / NOPOL</label>
                    <input type="text" class="form-control @error('nopol') is-invalid @enderror" id="nopol" name="nopol"
                        aria-describedby="nopol" placeholder="Masukan Nopol" value="{{ old('nopol') }}">
                    @error('nopol')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nomor_uji">NOMOR UJI</label>
                    <input type="text" class="form-control @error('nomor_uji') is-invalid @enderror" id="nomor_uji"
                        name="nomor_uji" aria-describedby="nomor_uji" placeholder="Masukan Nomor Uji"
                        value="{{ old('nomor_uji') }}">
                    @error('nomor_uji')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="merk">MERK</label>
                    <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk"
                        aria-describedby="merk" placeholder="Masukan Merk" value="{{ old('merk') }}">
                    @error('merk')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tahun_pembuatan">TAHUN PEMBUATAN</label>
                    <input type="text" class="form-control @error('tahun_pembuatan') is-invalid @enderror"
                        id="tahun_pembuatan" name="tahun_pembuatan" aria-describedby="tahun_pembuatan"
                        placeholder="Masukan Tahun Pembuatan" value="{{ old('tahun_pembuatan') }}">
                    @error('tahun_pembuatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nomor_rangka">NOMOR RANGKA</label>
                    <input type="text" class="form-control @error('nomor_rangka') is-invalid @enderror"
                        id="nomor_rangka" name="nomor_rangka" aria-describedby="nomor_rangka"
                        placeholder="Masukan Nomor Rangka" value="{{ old('nomor_rangka') }}">
                    @error('nomor_rangka')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nomesin">NOMOR MESIN</label>
                    <input type="text" class="form-control @error('nomesin') is-invalid @enderror" id="nomesin"
                        name="nomesin" aria-describedby="nomesin" placeholder="Masukan Nomor Mesin"
                        value="{{ old('nomesin') }}">
                    @error('nomesin')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="daya_orang">DAYA ANGKUT ORANG</label>
                    <input type="text" class="form-control @error('daya_orang') is-invalid @enderror" id="daya_orang"
                        name="daya_orang" aria-describedby="daya_orang" placeholder="Masukan Daya Angkut Orang"
                        value="{{ old('daya_orang') }}">
                    @error('daya_orang')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="daya_barang">DATA ANGKUT BARANG</label>
                    <input type="text" class="form-control @error('daya_barang') is-invalid @enderror" id="daya_barang"
                        name="daya_barang" aria-describedby="daya_barang" placeholder="Masukan Daya Angkut Barang"
                        value="{{ old('daya_barang') }}">
                    @error('daya_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="berkas_pdf">Berkas (dalam pdf)</label>
                    <input type="file" name="berkas_pdf" class="form-control-file mb-1" id="berkas_pdf">
                </div>
                <div class="form-group">
                    <label for="berkas_spm">Berkas Uji SPM (dalam jpg/png atau pdf)</label>
                    <input type="file" name="berkas_spm" class="form-control-file mb-1" id="berkas_spm">
                </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="trayek">TRAYEK</label>
                <input type="text" class="form-control @error('trayek') is-invalid @enderror" id="trayek" name="trayek"
                    aria-describedby="trayek" placeholder="Masukan Trayek" value="{{ old('trayek') }}">
                @error('trayek')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_perusahaan">NAMA PERUSAHAAN</label>
                <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror"
                    id="nama_perusahaan" name="nama_perusahaan" aria-describedby="nama_perusahaan"
                    placeholder="Masukan Nama Perusahaan" value="{{ old('nama_perusahaan') }}">
                @error('nama_perusahaan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat_perusahaan">ALAMAT PERUSAHAAN</label>
                <input type="text" class="form-control @error('alamat_perusahaan') is-invalid @enderror"
                    id="alamat_perusahaan" name="alamat_perusahaan" aria-describedby="alamat_perusahaan"
                    placeholder="Masukan Alamat Perusahaan" value="{{ old('alamat_perusahaan') }}">
                @error('alamat_perusahaan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_pemilik">NAMA PEMILIK</label>
                <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik"
                    name="nama_pemilik" aria-describedby="nama_pemilik" placeholder="Masukan Nama Pemilik"
                    value="{{ old('nama_pemilik') }}">
                @error('nama_pemilik')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_telepon">NOMOR TELEPON</label>
                <input type="text" class="form-control" id="no_telepon" placeholder="Masukkan nomor telepon" name="no_telepon" />
            </div>
            <div class="form-group">
                <label for="nomor_sk">NOMOR SK</label>
                <input type="text" class="form-control @error('nomor_sk') is-invalid @enderror" id="nomer_sk"
                    name="nomor_sk" aria-describedby="nomor_sk" placeholder="Masukan Nomor SK"
                    value="{{ old('nomor_sk') }}">
                @error('nomor_sk')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kode_perusahaan">KODE PERUSAHAAN</label>
                <input type="text" class="form-control @error('kode_perusahaan') is-invalid @enderror"
                    id="kode_perusahaan" name="kode_perusahaan" aria-describedby="kode_perusahaan"
                    placeholder="Masukan Kode Perusahaan" value="{{ old('kode_perusahaan') }}">
                @error('kode_perusahaan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_pelayanan_angkutan">Jenis Pelayanan Angkutan</label>
                    <select class="form-control" id="jenis_pelayanan_angkutan" name="jenis_pelayanan_angkutan">
                        <option value="">Pilih</option>
                        <option value="kspn">kspn</option>
                        <option value="AKDP">AKDP</option>
                        <option value="PARIWISATA">PARIWISATA</option>
                        <option value="SEWA">SEWA</option>
                        <option value="SEWA KHUSUS">SEWA KHUSUS</option>
                        <option value="ANTAR JEMPUT">ANTAR JEMPUT</option>
                        <option value="PEMADU MODA">PEMADU MODA</option>
                        <option value="TAKSI">TAKSI</option>
                    </select>
            </div>
            <div class="form-group">
                <label for="masa_sk">MASA BERLAKU KPE</label>
                <input type="date" class="form-control @error('masa_sk') is-invalid @enderror" name="masa_sk"
                    aria-describedby="masa_sk" placeholder="Masukan Masa Berlaku KPE" value="{{ old('masa_sk') }}">
                @error('masa_sk')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_sk">TANGGAL SK</label>
            </div>
            <div class="form-group">
                <input type="date" class="form-control @error('awal') is-invalid @enderror" name="awal"
                    aria-describedby="awal" placeholder="Awal" value="{{ old('awal') }}">
                @error('awal')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="date" class="form-control @error('akhir') is-invalid @enderror" name="akhir"
                    aria-describedby="akhir" placeholder="Akhir" value="{{ old('akhir') }}">
                @error('akhir')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_sk">TANGGAL UJI SPM</label>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="awal_spm"
                    aria-describedby="awal" placeholder="Awal">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="akhir_spm"
                    aria-describedby="awal" placeholder="Awal">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
		
	</div>
	</div>
		
</div>
@endsection