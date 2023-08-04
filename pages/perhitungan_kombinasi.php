                   
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
                 
<!-- <hr> -->

                                    <div class="row">
                                        <div class="col-lg-12">
                                           <h2>  PERHITUNGAN KOMBINASI SPK SAW DAN SPK TOPSIS</h2>
                                        </div>
                 
                                     <div class="col-lg-12">
                                             <div class="panel panel-default">
                                                 <div class="panel-heading"><b>MEMBUAT MATRIKS KEPUTUSAN</b></div>
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
                                                                     <th>Bobot Persen</th>
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
                                                 <div class="panel-heading"><b>DATA MATRIKS TERNORMALISASI</b></div>
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

                                                                     <?php
                                                                        $max=mysqli_query($konek, "select max(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show[kd_kriteria]' ");
                                                                        $smax=mysqli_fetch_array($max);

                                                                        $min=mysqli_query($konek, "select min(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show[kd_kriteria]' ");
                                                                        $smin=mysqli_fetch_array($min);
                                                                        ?>
                                                                         
                                                                         <td><?php echo $show['nm_pegawai'] ; ?></td>
                                                                         <td><?php echo $show['kri2']/10 ; ?></td>
                                                                         <td><?php echo $show['kri3']/10 ; ?></td>
                                                                         <td><?php echo $show['kri4']/10 ; ?></td>
                                                                         <td><?php echo 5/$show['kri5'] ; ?></td>
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
                                                 <div class="panel-heading"><b>DATA MATRIKS TERNORMALISASI TERBOBOT</b></div>
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

                                                                     <?php
                                                                        $max=mysqli_query($konek, "select max(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show[kd_kriteria]' ");
                                                                        $smax=mysqli_fetch_array($max);

                                                                        $min=mysqli_query($konek, "select min(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show[kd_kriteria]' ");
                                                                        $smin=mysqli_fetch_array($min);
                                                                        ?>
                                                                         
                                                                         <td><?php echo $show['nm_pegawai'] ; ?></td>
                                                                         <td><?php echo (0.3*($show['kri2']/10)) ; ?></td>
                                                                         <td><?php echo (0.3*($show['kri3']/10)) ; ?></td>
                                                                         <td><?php echo (0.1*($show['kri4']/10)) ; ?></td>
                                                                         <td><?php echo (0.3*(5/$show['kri5'])) ; ?></td>
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
                                                 <div class="panel-heading"><b>MATRIKS TOTAL (TABEL KUADRAT SELISIH) POSITIF</b></div>
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
                                                                     <th>POSITIF</th>
                                                                     <TH>AKAR POSITIF</TH>
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

                                                                     <?php
                                                                        $max=mysqli_query($konek, "select max(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show[kd_kriteria]' ");
                                                                        $smax=mysqli_fetch_array($max);

                                                                        $min=mysqli_query($konek, "select min(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show[kd_kriteria]' ");
                                                                        $smin=mysqli_fetch_array($min);
                                                                        ?>
                                                                         
                                                                         <td><?php echo $show['nm_pegawai'] ; ?></td>
                                                                         <td><?php echo $sastu=pow((0.3-(0.3*($show['kri2']/10))),2) ; ?></td>
                                                                         <td><?php echo $duas=pow((0.3-(0.3*($show['kri3']/10))),2) ; ?></td>
                                                                         <td><?php echo $tigas=pow((0.1-(0.1*($show['kri4']/10))),2) ; ?></td>
                                                                         <td><?php echo $empats=pow((0.15-(0.3*(5/$show['kri5']))),2) ; ?></td>
                                                                         <td><?php echo $sastu+$duas+$tigas+$empats ; ?></td>
                                                                         <td><?php echo $akarsatu=round(sqrt($sastu+$duas+$tigas+$empats),9) ; ?></td>
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
                                                 <div class="panel-heading"><b>MATRIKS TOTAL (TABEL KUADRAT SELISIH) NEGATIF</b></div>
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
                                                                     <th>NEGATIF</th>
                                                                     <th>AKAR NEGATIF</th>
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

                                                                     <?php
                                                                        $max=mysqli_query($konek, "select max(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show[kd_kriteria]' ");
                                                                        $smax=mysqli_fetch_array($max);

                                                                        $min=mysqli_query($konek, "select min(nilai_kriteria) as nilai from tb_d_alternatif where kd_kriteria='$show[kd_kriteria]' ");
                                                                        $smin=mysqli_fetch_array($min);
                                                                        ?>
                                                                         
                                                                         <td><?php echo $show['nm_pegawai'] ; ?></td>
                                                                         <td><?php echo $sastu=pow((0.15-(0.3*($show['kri2']/10))),2) ; ?></td>
                                                                         <td><?php echo $duas=pow((0.15-(0.3*($show['kri3']/10))),2) ; ?></td>
                                                                         <td><?php echo $tigas=pow((0.05-(0.1*($show['kri4']/10))),2) ; ?></td>
                                                                         <td><?php echo $empats=pow((0.3-(0.3*(5/$show['kri5']))),2) ; ?></td>
                                                                         <td><?php echo $sastu+$duas+$tigas+$empats ; ?></td>
                                                                         <td><?php echo $akardua=round(sqrt($sastu+$duas+$tigas+$empats),9) ; ?></td>
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
                                                 <div class="panel-heading"><b>PREFERENSI NILAI AKHIR</b></div>
                                                 <!-- /.panel-heading -->
                                                 <div class="panel-body">
                                                     <div class="table-responsive">
                                                     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                             <thead>
                                                                 <tr>
                                                                     <th>Nama Pegawai</th>
                                                                     <th>Akar Positif</th>
                                                                     <th>Akar Negatif</th>
                                                                     <th>Preferensi</th>
                                                                     <th>Urutan Solusi</th>
                                                                 </tr>
                                                             </thead>
                                                             <tbody>
                                                                 <?php  error_reporting(0);
                                             
                                                                 $view=mysqli_query($konek, "
                                                                 
                                                               select * from view_tess
                                                                 
                                                                 ");  
                                                                     
                                             
                                             
                                                                 while($show=mysqli_fetch_array($view)){
                                                                 $no++
                                                                 ?>
                                                                     <tr>
                                                                         <td><?php echo $show['nm_pegawai'] ; ?></td>
                                                                         <td><?php echo $show['Akar_Positif'] ; ?></td>
                                                                         <td><?php echo $show['Akar_Negatif'] ; ?></td>
                                                                         <td><b><?php echo $cis=round($show['Akar_Negatif']/($show['Akar_Negatif']+$show['Akar_Positif']),9) ; ?></b></td>
                                                                         <td><b>
                                                                         <?php 
                                                                                if($cis==1){
                                                                                    echo "1";
                                                                                }elseif($cis==0.592330317){
                                                                                    echo "2";
                                                                                }else{
                                                                                    echo "3";
                                                                                }
                                                                        ?>
                                                                         </b></td>
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