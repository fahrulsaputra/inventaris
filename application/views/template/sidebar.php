<div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close text-info">
                                        </span> Master</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-book"></span> <a href="<?php echo site_url('barang');?>">Barang</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-list-alt"></span> <a href="<?php echo site_url('lokasi');?>">Lokasi</a>
                                                </td>
                                            </tr>
                    
                                             <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil"></span> <a href="<?php echo site_url('pimpinan');?>">Pimpinan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-user"></span> <a href="<?php echo site_url('dashboard/petugas');?>">Administrator</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th text-info">
                            </span> Transaksi</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-barcode"></span> <a href="<?php echo site_url('inventaris');?>">Inventaris</a>
                                                </td>
                                            </tr>
                            
                                <tr>
                                    <td>
                                       <span class="glyphicon glyphicon-shopping-cart"></span> <a href="<?php echo site_url('pengadaan');?>"> Pengadaan</a>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file text-info">
                            </span> Laporan</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-user"></span><a href="<?php echo site_url('laporan/inventaris');?>"> Laporan Inventaris </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-book"></span><a href="<?php echo site_url('laporan/inventaris');?>"> Laporan Pengadaan </a>
                                    </td>
                                </tr>
                    
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="<?php echo site_url('dashboard/logout');?>"><span class="glyphicon glyphicon-off text-danger">
                            </span> Logout</a>
                        </h4>
                    </div>
                </div>
</div>