<script>
    $(function(){
        
        function loadData(args) {
            //code
            $("#tampil").load("<?php echo site_url('inventaris/tampil');?>");
        }
        loadData();
        
        function kosong(args) {
            //code
            $("#kode").val('');
            $("#tahun").val('');
            $("#baik").val('');
            $("#rusak").val('');
            $("#perlu").val('');
            $("#lokasi").val('');
        }
        
        $("#kode").click(function(){
            var kode=$("#kode").val();
            
            $.ajax({
                url:"<?php echo site_url('inventaris/cariBarang');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    $("#nama").val(html);
                }
            })
        })

         $("#kode1").click(function(){
            var kode=$("#kode1").val();
            
            $.ajax({
                url:"<?php echo site_url('inventaris/cariLokasi');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    $("#nama").val(html);
                }
            })
        })
        

        
        $("#tambah").click(function(){
            var kode=$("#kode").val();
            var tahun=$("#tahun").val();
            var baik=$("#baik").val();
            var rusak=$("#rusak").val();
            var perlu=$("#perlu").val();
            var lokasi=$("#lokasi").val();
            
            if (kode=="") {
                //code
                alert("Kode Barang Masih Kosong");
                return false;
            }else if (lokasi=="") {
                //code
                alert("Lokasi masih kosong");
                return false
            }else{
                $.ajax({
                    url:"<?php echo site_url('inventaris/tambah');?>",
                    type:"POST",
                    data:"kode="+kode+"&tahun="+tahun+"&baik="+baik+"&rusak"+rusak+"&perlu"+perlu+"&lokasi"+lokasi,
                    cache:false,
                    success:function(html){
                        loadData();
                        kosong();
                    }
                })    
            }
            
        })
        
        
        $("#simpan").click(function(){
            var kode=$("#kode").val();
            var tanggal=$("#tanggal").val();
            
            if (kode=="") {
                alert("Pilih kode transaksi");
                return false;
            }else if (tanggal=="") {
                alert("pilih tanggal");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('inventaris/sukses');?>",
                    type:"POST",
                    data:"kode="+kode+"&tanggal="+tanggal,
                    cache:false,
                    success:function(html){
                        alert("Transaksi inventaris berhasil");
                        location.reload();
                    }
                })
            }
            
        })
        
        $(".hapus").live("click",function(){
            var kode=$(this).attr("kode");
            
            $.ajax({
                url:"<?php echo site_url('inventaris/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    loadData();
                }
            });
        });
        
        $("#cari").click(function(){
            $("#myModal2").modal("show");
        })
        
        $("#caribarang").keyup(function(){
            var caribarang=$("#caribarang").val();
            
            $.ajax({
                url:"<?php echo site_url('inventaris/pencarianbarang');?>",
                type:"POST",
                data:"caribarang="+caribarang,
                cache:false,
                success:function(html){
                    $("#tampilbarang").html(html);
                }
            })
        })
        
        $(".tambah").live("click",function(){
            var kode=$(this).attr("kode");
            var tahun=$(this).attr("tahun");
            var baik=$(this).attr("baik");
            var rusak=$(this).attr("rusak");
            var perlu=$(this).attr("perlu");
            var lokasi=$(this).attr("lokasi");


            $("#kode").val(kode);
            $("#tahun").val(tahun);
            $("#baik").val(baik);
            $("#rusak").val(rusak);
            $("#perlu").val(perlu);
            $("#lokasi").val(lokasi);
        })
        
    })
</script>

<legend><?php echo $title;?></legend>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="<?php echo site_url('inventaris/simpan');?>" method="post">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Kode Inventaris</label>
                    <div class="col-lg-7">
                        <input type="text" id="no" name="no" class="form-control" value="<?php echo $kodeunik;?>" readonly="readonly">
                    </div>
                </div>
                
                
            </div>
            <div class="col-md-6">
          <div class="form-group">
                    <label class="col-lg-4 control-label">Tgl Inventaris</label>
                    <div class="col-lg-7">
                        <input type="text" id="tanggal" name="tanggal" class="form-control" value="<?php echo $tanggalinventaris;?>" readonly="readonly">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        Data Transaksi
    </div>
    

<div class="panel-body">
        <form class="form-horizontal">
            <div class="col-md-6">
            <div class="form-group">
                    <label class="col-lg-4 control-label">Kode Barang</label>
                    <div class="col-lg-7">
                        <select name="kode" class="form-control" id="kode">
                            <option></option>
                            <?php foreach($barang as $barang):?>
                            <option value="<?php echo $barang->kode_barang;?>"><?php echo $barang->kode_barang;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tahun Perolehan</label>
                    <div class="col-lg-7">
                        <input type="text" id="tahun" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Baik</label>
                    <div class="col-lg-7">
                        <input type="text" id="baik" class="form-control" >
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-lg-4 control-label">Rusak Total</label>
                    <div class="col-lg-7">
                        <input type="text" id="rusak" class="form-control" >
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-lg-4 control-label">Perlu Perbaikan</label>
                    <div class="col-lg-7">
                        <input type="text" id="perlu" class="form-control" >
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-lg-4 control-label">Lokasi</label>
                    <div class="col-lg-7">
                        <select name="lokasi" class="form-control" id="kode1">
                            <option></option>
                            <?php foreach($lokasi as $lokasi):?>
                            <option value="<?php echo $lokasi->nama_lokasi;?>"><?php echo $lokasi->nama_lokasi;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                <label>Tambah</label>
                <button id="tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
                </div>
                </form>

     </div>
    
    <div id="tampil"></div>
    
    <div class="panel-footer">
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
    </div>
</div>




 <!-- Modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cari Barang</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-horizontal">
                            <label class="col-lg-3 control-label">Cari Nama Barang</label>
                            <div class="col-lg-5">
                                <input type="text" name="caribarang" id="caribarang" class="form-control">
                            </div>
                        </div>
                        
                        <div id="tampilbarang"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
