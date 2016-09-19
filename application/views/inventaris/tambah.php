<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Kode Inventaris</label>
        <div class="col-lg-5">
            <input type="text" name="kode" class="form-control" value="<?=$kodeunik?>" readonly="readonly">
        </div>
    </div>

                    <div class="form-group">
                    <label class="col-lg-2 control-label">Kode Aset</label>
                    <div class="col-lg-4">
                        <input type="text" name="nis" class="form-control" id="nis" readonly="readonly">
                    </div>
                <label class="sr-only">Kode Aset</label>
                <button id="cari" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Barang</label>
        <div class="col-lg-5">
            <input type="text" name="merk" class="form-control" readonly="readonly">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Tahun Perolehan</label>
        <div class="col-lg-5">
            
        <input type='text' class="form-control">
       
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Baik</label>
        <div class="col-lg-5">
            <input type="text" name="merk" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Rusak</label>
        <div class="col-lg-5">
            <input type="text" name="merk" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Total</label>
        <div class="col-lg-5">
            <input type="text" name="merk" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Lokasi</label>
        <div class="col-lg-5">
            <input type="text" name="merk" class="form-control">
        </div>
    </div>


    
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('inventaris');?>" class="btn btn-default">Kembali</a>
    </div>
</form>