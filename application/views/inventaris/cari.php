<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('inventaris/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Kode / Nama Inventaris</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('inventaris/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
              <th>No.</th>
            <th>Kode Aset</th>
            <th>Supplier</th>
            <th>Nama Barang</th>
            <th>Kondisi</th>
            <th>Tanggal Masuk</th>
            <th>Merk</th>
            <th>Jumlah</th>
            <th>Harga (satuan)</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <?php $no=0; foreach($inventaris as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->kode_aset;?></td>
        <td><?php echo $row->supplier;?></td>
        <td><?php echo $row->nama_barang;?></td>
        <td><?php echo $row->kondisi;?></td>
        <td><?php echo $row->tanggal_masuk;?></td>
        <td><?php echo $row->merk;?></td>
        <td><?php echo $row->jumlah;?></td>
        <td><?php echo $row->harga;?></td>
        <td><a href="<?php echo site_url('inventaris/edit/'.$row->kode_aset);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->kode_aset;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>

<script>
    $(function(){
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");
            
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('inventaris/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('inventaris/index/delete_success');?>";
                }
            });
        });
    });
    
</script>