                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>DATA ALTERNATIF</b></div>
                                <div class="panel-heading"><a href="cetakalternatif.php" target="_blank" class="btn btn-primary">Cetak</a></div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Alternatif</th>
                                                    <th>Nama Pegawai</th>
                                                    <th>Tanggal Input</th>
                                                    <th>User Input</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view=mysqli_query($konek, "select * from tb_alternatif a
                                                inner join tb_pegawai p  on p.kd_pegawai=a.kd_pegawai
                                                inner join tb_user u on u.kd_user=a.kd_user
                                                ");

                                                while($show=mysqli_fetch_array($view)){
                                                $no++
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no ; ?></td>
                                                        <td><?php echo $show['kd_alternatif'] ; ?></td>
                                                        <td><?php echo $show['nm_pegawai'] ; ?></td>
                                                        <td><?php echo $show['tgl_alternatif'] ; ?></td>
                                                        <td><?php echo $show['nm_user'] ; ?></td>
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