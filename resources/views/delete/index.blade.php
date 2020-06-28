@extends('layout/admin')

@section('title', 'Hapus Data')

@section('container')
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
            <i class="fas fa-bars"></i>
        </button>

        <form action="/delete/cari" method="GET"
            class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input class="bg-light form-control border-0 small" type="text" placeholder="Cari Nomor Mesin ..."
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
                    <form class="form-inline mr-auto navbar-search w-100" action="/delete/cari" method="GET">
                        <div class="input-group">
                            <input class="bg-light form-control border-0 small" type="text"
                                placeholder="Cari Nomor Mesin ..." name="cari" value="{{ old('cari') }}">
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
        <h3 class="text-dark mb-0">Delete Data</h3>
    </div>

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
    </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Mesin</th>
                <th scope="col">Nama Pemilik</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kendaraans as $k)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $k->nomesin }}</td>
                <td>{{ $k->namapemilik }}</td>

                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#exampleModalLong{{$loop->iteration}}">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong{{$loop->iteration}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Data
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!-- EDIT DATA -->
                                <div class="modal-body">

                                    <div class="row">

                                        <div class="col">
                                            <form method="post" action="/delete/{{ $k->id }}">
                                                @method('delete')
                                                @csrf
                                                <div class="form-group">
                                                    <label for="nopol">TNKB / NOPOL</label>
                                                    <input type="text"
                                                        class="form-control @error('nopol') is-invalid @enderror"
                                                        id="nopol" name="nopol" aria-describedby="nopol"
                                                        placeholder="Nopol" value="{{ $k->nopol }}">
                                                    @error('nopol')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="nomor_uji">NOMOR UJI</label>
                                                    <input type="text"
                                                        class="form-control @error('nomor_uji') is-invalid @enderror"
                                                        id="nomor_uji" name="nomor_uji" aria-describedby="nomor_uji"
                                                        placeholder="Nomor Uji" value="{{ $k->nouji }}">
                                                    @error('nomor_uji')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="merk">MERK</label>
                                                    <input type="text"
                                                        class="form-control @error('merk') is-invalid @enderror"
                                                        id="merk" name="merk" aria-describedby="merk" placeholder="Merk"
                                                        value="{{ $k->merk }}">
                                                    @error('merk')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="tahun_pembuatan">TAHUN PEMBUATAN</label>
                                                    <input type="text"
                                                        class="form-control @error('tahun_pembuatan') is-invalid @enderror"
                                                        id="tahun_pembuatan" name="tahun_pembuatan"
                                                        aria-describedby="tahun_pembuatan" placeholder="Tahun Pembuatan"
                                                        value="{{ $k->thpembuatan }}">
                                                    @error('tahun_pembuatan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="nomor_rangka">NOMOR RANGKA</label>
                                                    <input type="text"
                                                        class="form-control @error('nomor_rangka') is-invalid @enderror"
                                                        id="nomor_rangka" name="nomor_rangka"
                                                        aria-describedby="nomor_rangka" placeholder="Nomor Rangka"
                                                        value="{{ $k->norangka }}">
                                                    @error('nomor_rangka')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="nomor_mesin">NOMOR MESIN</label>
                                                    <input type="text"
                                                        class="form-control @error('nomor_mesin') is-invalid @enderror"
                                                        id="nomor_mesin" name="nomor_mesin"
                                                        aria-describedby="nomor_mesin" placeholder="Nomor Mesin"
                                                        value="{{ $k->nomesin }}">
                                                    @error('nomor_mesin')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="daya_orang">DAYA ANGKUT ORANG</label>
                                                    <input type="text"
                                                        class="form-control @error('daya_orang') is-invalid @enderror"
                                                        id="daya_orang" name="daya_orang" aria-describedby="daya_orang"
                                                        placeholder="Daya Angkut Orang"
                                                        value="{{ $k->dayaangkutorang }}">
                                                    @error('daya_orang')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="daya_barang">DATA ANGKUT BARANG</label>
                                                    <input type="text"
                                                        class="form-control @error('daya_barang') is-invalid @enderror"
                                                        id="daya_barang" name="daya_barang"
                                                        aria-describedby="daya_barang" placeholder="Daya Angkut Barang"
                                                        value="{{ $k->dayaangkutbarang }}">
                                                    @error('daya_barang')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="trayek">TRAYEK</label>
                                                <input type="text"
                                                    class="form-control @error('trayek') is-invalid @enderror"
                                                    id="trayek" name="trayek" aria-describedby="trayek"
                                                    placeholder="Trayek" value="{{ $k->trayek }}">
                                                @error('trayek')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_perusahaan">NAMA PERUSAHAAN</label>
                                                <input type="text"
                                                    class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                                    id="nama_perusahaan" name="nama_perusahaan"
                                                    aria-describedby="nama_perusahaan" placeholder="Nama Perusahaan"
                                                    value="{{ $k->namaperusahaan }}">
                                                @error('nama_perusahaan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_perusahaan">ALAMAT PERUSAHAAN</label>
                                                <input type="text"
                                                    class="form-control @error('alamat_perusahaan') is-invalid @enderror"
                                                    id="alamat_perusahaan" name="alamat_perusahaan"
                                                    aria-describedby="alamat_perusahaan" placeholder="Alamat Perusahaan"
                                                    value="{{ $k->alamatperusahaan }}">
                                                @error('alamat_perusahaan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pemilik">NAMA PEMILIK</label>
                                                <input type="text"
                                                    class="form-control @error('nama_pemilik') is-invalid @enderror"
                                                    id="nama_pemilik" name="nama_pemilik"
                                                    aria-describedby="nama_pemilik" placeholder="Nama Pemilik"
                                                    value="{{ $k->namapemilik }}">
                                                @error('nama_pemilik')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nomor_sk">NOMOR SK</label>
                                                <input type="text"
                                                    class="form-control @error('nomor_sk') is-invalid @enderror"
                                                    id="nomer_sk" name="nomor_sk" aria-describedby="nomor_sk"
                                                    placeholder="Nomor SK" value="{{ $k->nosk }}">
                                                @error('nomor_sk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="kode_perusahaan">KODE PERUSAHAAN</label>
                                                <input type="text"
                                                    class="form-control @error('kode_perusahaan') is-invalid @enderror"
                                                    id="kode_perusahaan" name="kode_perusahaan"
                                                    aria-describedby="kode_perusahaan" placeholder="Kode Perusahaan"
                                                    value="{{ $k->kodeperusahaan }}">
                                                @error('kode_perusahaan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="masa_sk">MASA BERLAKU SK</label>
                                                <input type="text"
                                                    class="form-control @error('masa_sk') is-invalid @enderror"
                                                    id="masa_sk" name="masa_sk" aria-describedby="masa_sk"
                                                    placeholder="Masa Berlaku SK" value="{{ $k->masaberlaku }}">
                                                @error('masa_sk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_sk">TANGGAL SK</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="date"
                                                    class="form-control @error('awal') is-invalid @enderror" id="awal"
                                                    name="awal" aria-describedby="awal" placeholder="Awal"
                                                    value="{{ $k->tglawalsk }}">
                                                @error('awal')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="date"
                                                    class="form-control @error('akhir') is-invalid @enderror" id="akhir"
                                                    name="akhir" aria-describedby="akhir" placeholder="Akhir"
                                                    value="{{ $k->tglakhirsk }}">
                                                @error('akhir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <!-- ENDEDIT DATA -->

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Dalete Data</button>
                                </div>
                                </form>
                                <!--END FORM-->
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Halaman
                    <span class="badge badge-primary badge-pill">{{ $kendaraans->currentPage() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Jumlah Data
                    <span class="badge badge-primary badge-pill">{{ $kendaraans->total() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Data Per Halaman
                    <span class="badge badge-primary badge-pill">{{ $kendaraans->perPage() }}</span>
                </li>
            </ul>
        </div>
    </div>


    <nav aria-label="Page navigation example">
        <ul class="pagination mt-3">
            <li class="page-item">
                {{ $kendaraans->links() }}
            </li>
        </ul>
    </nav>

</div>
@endsection