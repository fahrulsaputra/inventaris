<legend><?php echo $title;?></legend>
<?php echo $message;?>
<?php echo validation_errors();?>
<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="col-lg-3 control-label">Kode Pimpinan</label>
        <div class="col-lg-5">
            <input type="text" name="kode" value="<?php echo $pimpinan['kode_pimpinan'];?>" readonly="readonly" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3 control-label">Jabatan</label>
        <div class="col-lg-5">
            <input type="text" name="jabatan" value="<?php echo $pimpinan['jabatan'];?>" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">nama_pimpinan</label>
        <div class="col-lg-5">
            <input type="text" name="nama" value="<?php echo $pimpinan['nama_pimpinan'];?>" class="form-control">
        </div>
    </div>
    
    <div class="form-group well">
        <div class="col-lg-5">
            <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            <a href="<?php echo site_url('pimpinan/index');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>