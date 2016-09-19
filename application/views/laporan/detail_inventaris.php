<legend>Detail Peminjaman</legend>
<div class="col-md-6">
    <div class="form-horizontal">
    <div class="form-group">
        <label class="col-lg-5">Kode Inventaris</label>
        <div class="col-lg-5">
            : <?php echo $header_inventaris['kode_inventaris'];?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-5">Tanggal Inventaris</label>
        <div class="col-lg-5">
            : <?php echo $tgl_inventaris['tgl_inventaris'];?>
        </div>
    </div>
    
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <td>Kode Buku</td>
            <td>Judul Buku</td>
            <td>Pengarang</td>
        </tr>
    </thead>
    <?php foreach($detail as $row):?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php endforeach;?>
</table>