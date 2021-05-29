<!-- tanggal pencarian -->
<!-- {{$url}} -->
<div class="col-md-4 mb-3" style="padding:0">
    <form method="GET" action="<?php echo $url; ?>" >
        <div class="form-group">
            <label for="exampleFormControlFile1">Tanggal notifikasi</label>
            <div style="display:flex">
                    <input type="date" class="form-control" id="exampleFormControlFile1">
                    <button class="btn btn-primary py-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
            </div>
        </div>
        <button type="button" class="btn btn-primary"><i class="fas fa-download"></i> Ekspor Tabel</button>
    </form>
</div>