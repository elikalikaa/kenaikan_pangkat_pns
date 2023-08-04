                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>DATA PEGAWAI</b></div>
                                <div class="panel-heading"><a href="cetakpegawai.php" target="_blank" class="btn btn-primary">Cetak</a></div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pegawai</th>
                                                    <th>NIP</th>
                                                    <th>Masa Kerja</th>
                                                    <th>Pendidikan Terakhir</th>
                                                    <th>Usia</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Agama</th>
                                                    <th>TMT</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view=mysqli_query($konek, "select * from tb_pegawai 
                                                ");  
                                                    
                            
                            
                                                while($show=mysqli_fetch_array($view)){
                                                $no++
                                                ?>
                                                    <tr>
                                                    <td><?php echo $no ; ?></td>
                                                    <td><?php echo $show['nm_pegawai'] ; ?></td>
                                                    <td><?php echo $show['nip'] ; ?></td>
                                                    <td><?php echo $show['masa_kerja'] ; ?></td>
                                                    <td><?php echo $show['pendidikan_akhir'] ; ?></td>
                                                    <td><?php echo $show['usia'] ; ?></td>
                                                    <td><?php echo $show['jk'] ; ?></td>
                                                    <td><?php echo $show['agama'] ; ?></td>
                                                    <td><?php echo $show['tmt'] ; ?></td>
                                                   
                                                    </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    <!-- <div class="well">
                                        <h4>DataTables Usage Information</h4>
                                        <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                        <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                                    </div> -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>