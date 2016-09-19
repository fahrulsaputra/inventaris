<legend>Data Lokasi</legend>
<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('lokasi/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Kode / Nama Lokasi</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('lokasi/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <th style="width:10%">No.</th>
            <th style="width:30%">Kode Lokasi</th>
            <th style="width:50%">Nama Lokasi</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <?php $no=0; foreach($lokasi as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->kode_lokasi;?></td>
        <td><?php echo $row->nama_lokasi;?></td>
        <td><a href="<?php echo site_url('lokasi/edit/'.$row->kode_lokasi);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->kode_lokasi;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>
<?php echo $pagination;?>

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
                url:"<?php echo site_url('lokasi/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('lokasi/index/delete_success');?>";
                }
            });
        });
    });
    
</script>