<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Kode Pimpinan</label>
        <div class="col-lg-5">
            <input type="text" name="kode" class="form-control" value="<?=$kodeunik?>" readonly="readonly">
        </div>
    </div>

    
    <div class="form-group">
        <label class="col-lg-2 control-label">Jabatan</label>
        <div class="col-lg-5">
        <input type="text" name="jabatan" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Nama</label>
        <div class="col-lg-5">
            <input type="text" name="nama" class="form-control">
        </div>
    </div>

     
    
    <div class="form-group well">
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('pimpinan');?>" class="btn btn-default">Kembali</a>
    </div>
</form>