<legend>Data Pimpinan</legend>
<a href="<?php echo site_url('pimpinan/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Pimpinan</th>
            <th>Jabatan</th>
            <th>Nama</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <?php $no=0; foreach($pimpinan as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->kode_pimpinan;?></td>
        <td><?php echo $row->jabatan;?></td>
        <td><?php echo $row->nama_pimpinan;?></td>
        <td><a href="<?php echo site_url('pimpinan/edit/'.$row->kode_pimpinan);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->kode_pimpinan;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
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
                url:"<?php echo site_url('pimpinan/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('pimpinan/index/delete_success');?>";
                }
            });
        });
    });
    
</script>