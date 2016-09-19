<legend>Transaksi Pengadaan</legend>
<a href="<?php echo site_url('pengadaan/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<?php echo $message;?>

<br></br>

<div class="panel panel-warning">
    <div class="panel-heading">
        Data Pra-Pengadaan 
    </div>
    
    <div class="panel-body">
        <div class="form-inline">
<Table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Pengadaan</th>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Keterangan</th>
            <th colspan="4"></th>
        </tr>
    </thead>
    <?php $no=0; foreach($pengadaan as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->id_pengadaan;?></td>
        <td><?php echo $row->tgl_pengadaan;?></td>
        <td><?php echo $row->jenis_pengadaan?></td>
        <td><?php echo $row->nama_barang?></td>
        <td><?php echo $row->jumlah;?></td>
        <td><?php echo $row->harga;?></td>
        <td><?php echo $row->total;?></td>
        <td><?php echo $row->keterangan;?></td>
         <td><i class="glyphicon glyphicon-ok-sign"></i></a></td>
          <td><i class="glyphicon glyphicon-print"></i></a></td>
        <td><a href="<?php echo site_url('pengadaan/edit/'.$row->id_pengadaan);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->id_pengadaan;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>
<?php echo $pagination;?>

<div class="panel panel-success">
    <div class="panel-heading">
        Data Pengadaan
    </div>
    
    <div class="panel-body">
        <div class="form-inline">
<Table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Pengadaan</th>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Keterangan</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <?php $no=0; foreach($pengadaan as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->id_pengadaan;?></td>
        <td><?php echo $row->tgl_pengadaan;?></td>
        <td><?php echo $row->jenis_pengadaan?></td>
        <td><?php echo $row->nama_barang?></td>
        <td><?php echo $row->jumlah;?></td>
        <td><?php echo $row->harga;?></td>
        <td><?php echo $row->total;?></td>
        <td><?php echo $row->keterangan;?></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->id_pengadaan;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
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
                url:"<?php echo site_url('pengadaan/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('pengadaan/index/delete_success');?>";
                }
            });
        });
    });
    
</script>