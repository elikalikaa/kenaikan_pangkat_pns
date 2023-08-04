                   
                   <ul class="nav nav-tabs">
  
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=perhitungan_kombinasi">Perhitungan KOMBINASI</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=perhitungan_topsis">Perhitungan TOPSIS</a>
  </li>
 <li class="nav-item">
    <a class="nav-link" href="index.php?page=perhitungan_saw">Perhitungan SAW</a>
  </li> 
</ul>
                   <div class="row">
                   <div class="col-lg-12">
                                           <h2>  PERHITUNGAN SPK SAW</h2>
                                        </div>

                    <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>ALTERNATIF NILAI</b></div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Alternatif</th>
                                                    <th colspan="4">Kriteria</th>
                                                    
                                                </tr>
                                                <tr>
                                                   
                                                    <th>C1</th>
                                                    <th>C2</th>
                                                    <th>C3</th>
                                                    <th>C4</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view=mysqli_query($konek, "select p.nm_pegawai,
                                                (select nilai_kriteria from tb_d_alternatif where kd_kriteria=2 and kd_alternatif=a.kd_alternatif ) as kri2,
                                                 (select nilai_kriteria from tb_d_alternatif where kd_kriteria=3 and kd_alternatif=a.kd_alternatif ) as kri3,
                                                 (select nilai_kriteria from tb_d_alternatif where kd_kriteria=4 and kd_alternatif=a.kd_alternatif ) as kri4,
                                                 (select nilai_kriteria from tb_d_alternatif where kd_kriteria=5 and kd_alternatif=a.kd_alternatif ) as kri5
                                                 
                       
                                                from tb_d_alternatif d
                                                INNER JOIN tb_alternatif a on a.kd_alternatif=d.kd_alternatif
                                                INNER JOIN tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                                                INNER JOIN tb_pegawai p on p.kd_pegawai=a.kd_pegawai
                                                GROUP BY a.kd_pegawai");  
                                                    
                            
                            
                                                while($show=mysqli_fetch_array($view)){
                                                $no++
                                                ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $show['nm_pegawai'] ; ?></td>
                                                        <td><?php echo $show['kri2'] ; ?></td>
                                                        <td><?php echo $show['kri3'] ; ?></td>
                                                        <td><?php echo $show['kri4'] ; ?></td>
                                                        <td><?php echo $show['kri5'] ; ?></td>
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

                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>KRITERIA BOBOT</b></div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Kriteria</th>
                                                    <th>Bobot %</th>
                                                    <th>Bobot Desimal</th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view=mysqli_query($konek, "select * from tb_kriteria"); 
                                                    
                            
                            
                                                while($show=mysqli_fetch_array($view)){
                                                $no++
                                                ?>
                                                    <tr>
                                                        <td><?php echo $show['kriteria'] ; ?></td>
                                                        <td><?php echo $show['bobot_persen'] ; ?>%</td>
                                                        <td><?php echo $show['bobot_desimal'] ; ?></td>
                                                    </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->

                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>DATA MAKSIMAL DAN MINIMAL</b></div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Kriteria</th>
                                                    <th>Nilai</th>
                                                   
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $vieww=mysqli_query($konek, "SELECT
                                                d.kd_kriteria,
                                                kriteria,
                                                atribut
                                                FROM
                                                    tb_d_alternatif d
                                                INNER JOIN tb_alternatif a ON a.kd_alternatif = d.kd_alternatif
                                                INNER JOIN tb_kriteria k ON k.kd_kriteria = d.kd_kriteria
                                                GROUP BY
                                                d.kd_kriteria"); 
                                                    
                            
                            
                                                while($showw=mysqli_fetch_array($vieww)){
                                                $no++
                                                ?>
                                                    <tr>
                                                        <td><?php echo $showw['kriteria'] ; ?></td>
                                                        <td><?php
                                                        if($showw['atribut']=="Benefit"){
                                                        $max=mysqli_query($konek, "select max(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$showw[kd_kriteria]' ");
                                                        $smax=mysqli_fetch_array($max);
                                                        }else{
                                                        $max=mysqli_query($konek, "select min(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$showw[kd_kriteria]' ");
                                                        $smax=mysqli_fetch_array($max);
                                                        }
                                                        
                                                        echo $smax['nilai'] ; ?></td>
                                                       
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->

                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>NORMALISASI</b></div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                <b>C1 Benefit : Nilai Kriteria/Nilai Maksimal</b>
                                                </div>
                                            </div>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Kriteria</th>
                                                    <th>Nilai</th>
                                                   
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view2=mysqli_query($konek, "select p.nm_pegawai, k.atribut, k.kd_kriteria,
                                                (select nilai_kriteria from tb_d_alternatif where kd_kriteria=2 and kd_alternatif=a.kd_alternatif ) as kri2
                                                from tb_d_alternatif d
                                                INNER JOIN tb_alternatif a on a.kd_alternatif=d.kd_alternatif
                                                INNER JOIN tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                                                INNER JOIN tb_pegawai p on p.kd_pegawai=a.kd_pegawai
                                                GROUP BY a.kd_pegawai"); 
                                                    
                            
                            
                                                while($show2=mysqli_fetch_array($view2)){
                                                $no++
                                                ?>
                                                    <tr>
                                                        <td><?php echo $show2['nm_pegawai'] ; ?></td>
                                                        <td><?php
                                                        if($show2['atribut']=="Benefit"){
                                                            $max=mysqli_query($konek, "select max(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show2[kd_kriteria]' ");
                                                            $smax=mysqli_fetch_array($max);
                                                            echo $show2['kri2']/$smax['nilai'] ;
                                                        }else{
                                                            $min=mysqli_query($konek, "select min(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show2[kd_kriteria]' ");
                                                            $smin=mysqli_fetch_array($min);
                                                            echo $show2['kri2']/$smin['nilai'] ;
                                                        }
                                                        
                                                    ?></td>
                                                       
                                                <?php }?>
                                            </tbody>
                                        </table>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="card">
                                                <div class="card-header">
                                                <b>C2 Benefit : Nilai Kriteria/Nilai Maksimal</b>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Kriteria</th>
                                                    <th>Nilai</th>
                                                   
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view3=mysqli_query($konek, "select p.nm_pegawai, k.atribut, k.kd_kriteria,
                                                (select nilai_kriteria from tb_d_alternatif where kd_kriteria=3 and kd_alternatif=a.kd_alternatif ) as kri3
                                                from tb_d_alternatif d
                                                INNER JOIN tb_alternatif a on a.kd_alternatif=d.kd_alternatif
                                                INNER JOIN tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                                                INNER JOIN tb_pegawai p on p.kd_pegawai=a.kd_pegawai
                                                GROUP BY a.kd_pegawai"); 
                                                    
                            
                            
                                                while($show3=mysqli_fetch_array($view3)){
                                                $no++
                                                ?>
                                                    <tr>
                                                        <td><?php echo $show3['nm_pegawai'] ; ?></td>
                                                        <td><?php
                                                        if($show3['atribut']=="Benefit"){
                                                            $max=mysqli_query($konek, "select max(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show3[kd_kriteria]' ");
                                                            $smax=mysqli_fetch_array($max);
                                                            echo $show3['kri3']/$smax['nilai'] ;
                                                        }else{
                                                            $min=mysqli_query($konek, "select min(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show3[kd_kriteria]' ");
                                                            $smin=mysqli_fetch_array($min);
                                                            echo $show3['kri3']/$smin['nilai'] ;
                                                        }
                                                        
                                                    ?></td>
                                                       
                                                <?php }?>
                                            </tbody>
                                        </table>
                                            </div>
                                    </div>
                                   
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->


                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>NORMALISASI</b></div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                <b>C3 Benefit : Nilai Kriteria/Nilai Maksimal</b>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Kriteria</th>
                                                    <th>Nilai</th>
                                                   
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view4=mysqli_query($konek, "select p.nm_pegawai, k.atribut, k.kd_kriteria,
                                                (select nilai_kriteria from tb_d_alternatif where kd_kriteria=4 and kd_alternatif=a.kd_alternatif ) as kri4
                                                from tb_d_alternatif d
                                                INNER JOIN tb_alternatif a on a.kd_alternatif=d.kd_alternatif
                                                INNER JOIN tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                                                INNER JOIN tb_pegawai p on p.kd_pegawai=a.kd_pegawai
                                                GROUP BY a.kd_pegawai"); 
                                                    
                            
                            
                                                while($show4=mysqli_fetch_array($view4)){
                                                $no++
                                                ?>
                                                    <tr>
                                                        <td><?php echo $show4['nm_pegawai'] ; ?></td>
                                                        <td><?php
                                                        if($show4['atribut']=="Benefit"){
                                                            $max=mysqli_query($konek, "select max(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show4[kd_kriteria]' ");
                                                            $smax=mysqli_fetch_array($max);
                                                            echo $show4['kri4']/$smax['nilai'] ;
                                                        }else{
                                                            $min=mysqli_query($konek, "select min(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show4[kd_kriteria]' ");
                                                            $smin=mysqli_fetch_array($min);
                                                            echo $show4['kri4']/$smin['nilai'] ;
                                                        }
                                                        
                                                    ?></td>
                                                       
                                                <?php }?>
                                            </tbody>
                                        </table>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="card">
                                                <div class="card-header">
                                                <b>C4 Benefit : Nilai Kriteria/Nilai Maksimal</b>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Kriteria</th>
                                                    <th>Nilai</th>
                                                   
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view5=mysqli_query($konek, "select p.nm_pegawai, k.atribut, k.kd_kriteria,
                                                (select nilai_kriteria from tb_d_alternatif where kd_kriteria=5 and kd_alternatif=a.kd_alternatif ) as kri5
                                                from tb_d_alternatif d
                                                INNER JOIN tb_alternatif a on a.kd_alternatif=d.kd_alternatif
                                                INNER JOIN tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                                                INNER JOIN tb_pegawai p on p.kd_pegawai=a.kd_pegawai
                                                GROUP BY a.kd_pegawai"); 
                                                    
                            
                            
                                                while($show5=mysqli_fetch_array($view5)){
                                                $no++
                                                ?>
                                                    <tr>
                                                        <td><?php echo $show5['nm_pegawai'] ; ?></td>
                                                        <td><?php
                                                        if($show5['atribut']=="cost"){
                                                            $max=mysqli_query($konek, "select max(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show5[kd_kriteria]' ");
                                                            $smax=mysqli_fetch_array($max);
                                                            echo $smax['nilai']/ $show5['kri5'] ;
                                                        }else{
                                                            $min=mysqli_query($konek, "select min(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show5[kd_kriteria]' ");
                                                            $smin=mysqli_fetch_array($min);
                                                            echo $smin['nilai']/ $show5['kri5'] ;
                                                        }
                                                        
                                                    ?></td>
                                                       
                                                <?php }?>
                                            </tbody>
                                        </table>    </div>
                                    </div>
                                   
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->


                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>MATRIKS TERNORMALISASI</b></div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Alternatif</th>
                                                    <th colspan="4">Kriteria</th>
                                                    
                                                </tr>
                                                <tr>
                                                   
                                                    <th>C1</th>
                                                    <th>C2</th>
                                                    <th>C3</th>
                                                    <th>C4</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view=mysqli_query($konek, "select p.nm_pegawai, k.atribut, k.kd_kriteria,
                                                (select nilai_kriteria from tb_d_alternatif where kd_kriteria=2 and kd_alternatif=a.kd_alternatif ) as kri2,
                                                 (select nilai_kriteria from tb_d_alternatif where kd_kriteria=3 and kd_alternatif=a.kd_alternatif ) as kri3,
                                                 (select nilai_kriteria from tb_d_alternatif where kd_kriteria=4 and kd_alternatif=a.kd_alternatif ) as kri4,
                                                 (select nilai_kriteria from tb_d_alternatif where kd_kriteria=5 and kd_alternatif=a.kd_alternatif ) as kri5
                                                 
                       
                                                from tb_d_alternatif d
                                                INNER JOIN tb_alternatif a on a.kd_alternatif=d.kd_alternatif
                                                INNER JOIN tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                                                INNER JOIN tb_pegawai p on p.kd_pegawai=a.kd_pegawai
                                                GROUP BY a.kd_pegawai");  
                                                    
                            
                            
                                                while($show=mysqli_fetch_array($view)){
                                                $no++
                                                ?>
                                                    <tr>
                                                        <?php
                                                         $max=mysqli_query($konek, "select max(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show[kd_kriteria]' ");
                                                         $smax=mysqli_fetch_array($max);

                                                         $min=mysqli_query($konek, "select min(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show[kd_kriteria]' ");
                                                         $smin=mysqli_fetch_array($min);
                                                        ?>
                                                        
                                                        <td><?php echo $show['nm_pegawai'] ; ?></td>
                                                        <td><?php if($show['atribut']=="Benefit"){
                                                           
                                                           echo  $show['kri2']/ $smax['nilai'] ;
                                                       }else{
                                                         
                                                           echo $show['kri2']/ $smin['nilai'] ;
                                                       } ?></td>
                                                        <td><?php if($show['atribut']=="Benefit"){
                                                           
                                                           echo  $show['kri3']/ $smax['nilai'] ;
                                                       }else{
                                                         
                                                           echo $show['kri3']/ $smin['nilai'] ;
                                                       } ?></td>
                                                        <td><?php if($show['atribut']=="Benefit"){
                                                           
                                                           echo  $show['kri4']/ $smax['nilai'] ;
                                                       }else{
                                                         
                                                           echo $show['kri4']/ $smin['nilai'] ;
                                                       } ?></td>
                                                        <td><?php if($show['atribut']=="Cost"){
                                                           
                                                           echo $smax['nilai']/ $show['kri5'] ;
                                                       }else{
                                                         
                                                           echo $smin['nilai']/ $show['kri5'] ;
                                                       } ?></td>
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


                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>PERENGKINGAN</b></div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                
                                                <tr>
                                                   <th>Alternatif</th>
                                                    <th>C1</th>
                                                    <th>C2</th>
                                                    <th>C3</th>
                                                    <th>C4</th>
                                                    <th>Total</th>
                                                    <th>Rangking</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view=mysqli_query($konek, "select p.nm_pegawai, k.atribut, k.kd_kriteria, 
                                                                                                (select bobot_desimal from tb_kriteria where kd_kriteria=2 ) as des2,
																								(select bobot_desimal from tb_kriteria where kd_kriteria=3 ) as des3,
																								(select bobot_desimal from tb_kriteria where kd_kriteria=4 ) as des4,
																								(select bobot_desimal from tb_kriteria where kd_kriteria=5 ) as des5,
                                                (select nilai_kriteria from tb_d_alternatif where kd_kriteria=2 and kd_alternatif=a.kd_alternatif ) as kri2,
                                                 (select nilai_kriteria from tb_d_alternatif where kd_kriteria=3 and kd_alternatif=a.kd_alternatif ) as kri3,
                                                 (select nilai_kriteria from tb_d_alternatif where kd_kriteria=4 and kd_alternatif=a.kd_alternatif ) as kri4,
                                                 (select nilai_kriteria from tb_d_alternatif where kd_kriteria=5 and kd_alternatif=a.kd_alternatif ) as kri5
                                                 
                       
                                                from tb_d_alternatif d
                                                INNER JOIN tb_alternatif a on a.kd_alternatif=d.kd_alternatif
                                                INNER JOIN tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                                                INNER JOIN tb_pegawai p on p.kd_pegawai=a.kd_pegawai
                                                GROUP BY a.kd_pegawai");  
                                                    
                            
                            
                                                while($show=mysqli_fetch_array($view)){
                                                $no++
                                                ?>
                                                    <tr>
                                                    
                                                    <?php
                                                    $max=mysqli_query($konek, "select max(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show[kd_kriteria]' ");
                                                    $smax=mysqli_fetch_array($max);

                                                    $min=mysqli_query($konek, "select min(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show[kd_kriteria]' ");
                                                    $smin=mysqli_fetch_array($min);
                                                    ?>

                                                        <td><?php echo $show['nm_pegawai'] ; ?></td>
                                                        <td><?php if($show['atribut']=="Benefit"){
                                                           
                                                           echo  $krit2=(($show['kri2']/ $smax['nilai'])*$show['des2']) ;
                                                       }else{
                                                         
                                                            echo $krit2=(($show['kri2']/ $smin['nilai'])*$show['des2']) ;
                                                       } ?></td>
                                                        <td><?php if($show['atribut']=="Benefit"){
                                                           
                                                           echo  $krit3=(($show['kri3']/ $smax['nilai'])*$show['des3']) ;
                                                       }else{
                                                         
                                                            echo $krit3=(($show['kri3']/ $smin['nilai'])*$show['des3']) ;
                                                       } ?></td>
                                                        <td><?php if($show['atribut']=="Benefit"){
                                                           
                                                           echo $krit4=(($show['kri4']/ $smax['nilai'])*$show['des4']) ;
                                                        }else{
                                                          
                                                             echo $krit4=(($show['kri4']/ $smin['nilai'])*$show['des4']) ;
                                                       } ?></td>
                                                        <td><?php if($show['atribut']=="Cost"){
                                                           
                                                           echo  $krit5=(($smax['nilai']/$show['kri5'])*$show['des5']) ;
                                                       }else{
                                                         
                                                            echo $krit5=(($smin['nilai']/$show['kri5'])*$show['des5']) ;
                                                       } ?></td>
                                                        <td><?php echo $cis=($krit2+$krit3+$krit4+$krit5) ; ?></td>
                                                        <td><?php 
                                                                   if($cis==1){
                                                                    echo "1";
                                                                   }elseif($cis==0.85){
                                                                    echo "2";
                                                                   }elseif($cis==0.7){
                                                                    echo "3";
                                                                   }else{
                                                                    echo "4";
                                                                   }
                                                         ?></td>
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



