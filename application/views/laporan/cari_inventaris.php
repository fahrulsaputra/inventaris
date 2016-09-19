<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Kode Inventaris</td>
            <td>Tanggal Inventaris</td>
        </tr>
    </thead>
    <?php $no=0; foreach($lap as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><a href="<?php echo site_url('laporan/detail_inventaris/'.$row->kode_inventaris);?>"><?php echo $row->kode_inventaris;?></a></td>
        <td><?php echo $row->tgl_inventaris;?></td>
    </tr>
    <?php endforeach;?>
</table>