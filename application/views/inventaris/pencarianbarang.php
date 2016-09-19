<table class="table table-striped">
        <thead>
            <tr>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($barang as $tmp):?>
        <tr>
            <td><?php echo $tmp->kode_barang;?></td>
            <td><?php echo $tmp->nama_barang;?></td>
            <td><a href="#" class="tambah" kode="<?php echo $tmp->kode_barang;?>"
            nama="<?php echo $tmp->nama_barang;?>"><i class="glyphicon glyphicon-plus"></i></a></td>
        </tr>
        <?php endforeach;?>
    </table>