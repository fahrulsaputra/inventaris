<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Kode Inventaris</label>
        <div class="col-lg-5">
            <input type="text" name="kode" class="form-control" value="<?php echo $inventaris['kode_aset'];?>" readonly="readonly">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Supplier</label>
        <div class="col-lg-5">
            <select name="supplier" class="form-control" value="<?php echo $inventaris['supplier'];?>">
            <option><?php echo $inventaris['supplier'];?></option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Barang</label>
        <div class="col-lg-5">
            <input type="text" name="nama_barang" class="form-control" value="<?php echo $inventaris['nama_barang'];?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Kondisi</label>
        <div class="col-lg-5">
            <input type="text" name="kondisi" class="form-control" value="<?php echo $inventaris['kondisi'];?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Tanggal Masuk</label>
        <div class="col-lg-5">
        <div class='input-group date' id='datetimepicker'>
            <input type="text" name="tanggal_masuk" class="form-control" value="<?php echo $inventaris['tanggal_masuk'];?>">
            <span class="input-group-addon">
         <span class="glyphicon glyphicon-calendar"></span>
        </span>
        </div>
    </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Merk</label>
        <div class="col-lg-5">
            <input type="text" name="merk" class="form-control" value="<?php echo $inventaris['merk'];?>">
        </div>
    </div>
    
   <div class="form-group">
        <label class="col-lg-2 control-label">Jumlah</label>
        <div class="col-lg-5">
        <div class="input-group">
            <span class="input-group-btn">
              <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" style="text-align:center;" name="quant[2]" class="form-control input-number" value="<?php echo $inventaris['jumlah'];?>">
          <span class="input-group-btn">
              <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
          </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Harga (satuan)</label>
        <div class="col-lg-5">
            <input type="text" name="merk" class="form-control" value="<?php echo $inventaris['harga'];?>">
        </div>
    </div>
    
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('inventaris');?>" class="btn btn-default">Kembali</a>
    </div>
</form>