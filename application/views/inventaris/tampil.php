<table class="table table-striped">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Tahun Perolehan</th>
                <th>Baik</th>
                <th>Rusak Total</th>
                <th>Perlu Perbaikan</th>
                <th>Lokasi</th>
                <th></th>
            </tr>
        </thead>
        <?php foreach($tmp as $tmp):?>
        <tr>
            <td><?php echo $tmp->kode_barang;?></td>
            <td><?php echo $tmp->tahun_perolehan;?></td>
            <td><?php echo $tmp->baik;?></td>
            <td><?php echo $tmp->rusak_total;?></td>
            <td><?php echo $tmp->perlu_perbaikan;?></td>
            <td><?php echo $tmp->lokasi;?></td>
            
            <td><a href="#" class="hapus" kode="<?php echo $tmp->kode_barang;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        <?php endforeach;?>
       
    </table>