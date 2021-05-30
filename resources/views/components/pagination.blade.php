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
                        @php
                            $queryString=[];
                            if(isset($tanggalPencarian)){
                                $queryString['tanggal']=$tanggalPencarian;
                            }
                            if(isset($keyword)){
                                $queryString['keyword']=$keyword;
                            }
                        @endphp
                        
                        @if(count($queryString) > 0)
                            {{ $kendaraans->appends($queryString)->links() }}
                        @else
                            {{ $kendaraans->links() }}
                        @endif
                    </li>
                </ul>
            </nav>