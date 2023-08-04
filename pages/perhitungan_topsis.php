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
                                           <h2>  PERHITUNGAN SPK TOPSIS</h2>
                                        </div>
                 
                                     <div class="col-lg-12">
                                             <div class="panel panel-default">
                                                 <div class="panel-heading"><b>MEMBUAT MATRIKS KEPUTUSAN/NILAI ALTERNATIF</b></div>
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
                                                 <div class="panel-heading"><b>NORMALISASI NILAI ALTERNATIF KRITERIA (TABEL KUADRAT)</b></div>
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
                                                                         <td><?php $krit1=pow($show['kri2'],2);
                                                                         echo $krit1 ?></td>
                                                                         <td><?php echo pow($show['kri3'],2); ?></td>
                                                                         <td><?php echo pow($show['kri4'],2); ?></td>
                                                                         <td><?php echo pow($show['kri5'],2); ?></td>
                                                                     </tr>
                                                                     
                                                                    
                                                                 <?php }?>
                                                                 <tr>
                                                                    <th>TOTAL</th>
                                                                        <th><?php
                                                                         $tota=mysqli_query($konek, "select sum(kri2) as kri2 from nilai_kriteria"); 
                                                                         $stota=mysqli_fetch_array($tota);
                                                                         echo $tot2=$stota['kri2'] ;
                                                                        ?></th>
                                                                        <th><?php
                                                                         $tota=mysqli_query($konek, "select sum(kri3) as kri3 from nilai_kriteria"); 
                                                                         $stota=mysqli_fetch_array($tota);
                                                                         echo $tot3=$stota['kri3'] ;
                                                                        ?></th>
                                                                        <th><?php
                                                                         $tota=mysqli_query($konek, "select sum(kri4) as kri4 from nilai_kriteria"); 
                                                                         $stota=mysqli_fetch_array($tota);
                                                                         echo $tot4=$stota['kri4'] ;
                                                                        ?></th>
                                                                        <th><?php
                                                                         $tota=mysqli_query($konek, "select sum(kri5) as kri5 from nilai_kriteria"); 
                                                                         $stota=mysqli_fetch_array($tota);
                                                                         echo $tot5=$stota['kri5'] ;
                                                                        ?></th>
                                                                     </tr>
                                                                
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
                                                 <div class="panel-heading"><b>NORMALISASI NILAI ALTERNATIF KRITERIA (TABEL TOTAL KUADRAT)</b></div>
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
                                                                         <td><?php echo round($show['kri2']/sqrt($tot2),8); ?></td>
                                                                         <td><?php echo round($show['kri3']/sqrt($tot3),9); ?></td>
                                                                         <td><?php echo round($show['kri4']/sqrt($tot4),8); ?></td>
                                                                         <td><?php echo round($show['kri5']/sqrt($tot5),8); ?></td>
                                                                     </tr>
                                                                     
                                                                    
                                                                 <?php }?>
                                                                                                                                
                                                             </tbody>
                                                         </table>
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
                                                 <div class="panel-heading"><b>NORMALISASI TERBOBOT</b></div>
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

                                                               
                                                                $k2=mysqli_query($konek, "select bobot_desimal from tb_kriteria where kd_kriteria=2"); 
                                                                $sk2=mysqli_fetch_array($k2);
                                                                $skk2=$sk2['bobot_desimal'] ;
                                                                $k3=mysqli_query($konek, "select bobot_desimal from tb_kriteria where kd_kriteria=3"); 
                                                                $sk3=mysqli_fetch_array($k3);
                                                                $skk3=$sk3['bobot_desimal'] ;
                                                                $k4=mysqli_query($konek, "select bobot_desimal from tb_kriteria where kd_kriteria=4"); 
                                                                $sk4=mysqli_fetch_array($k4);
                                                                $skk4=$sk4['bobot_desimal'] ;
                                                                $k5=mysqli_query($konek, "select bobot_desimal from tb_kriteria where kd_kriteria=5"); 
                                                                $sk5=mysqli_fetch_array($k5);
                                                                $skk5=$sk5['bobot_desimal'] ;
                                                                
                                             
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
                                                                         <td><?php echo (round($show['kri2']/sqrt($tot2),8)*$skk2); ?></td>
                                                                         <td><?php echo (round($show['kri3']/sqrt($tot3),9)*$skk3); ?></td>
                                                                         <td><?php echo (round($show['kri4']/sqrt($tot4),8)*$skk4); ?></td>
                                                                         <td><?php echo (round($show['kri5']/sqrt($tot5),8)*$skk5); ?></td>
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
                                                 <div class="panel-heading"><b>MATRIKS TOTAL POSITIF</b></div>
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
                                                                     <th>Positif</th>
                                                                     <th>Akar   Positif</th>
                                                                 </tr>
                                                             </thead>
                                                             <tbody>
                                                                 <?php  error_reporting(0);

                                                               
                                                                $k2=mysqli_query($konek, "select bobot_desimal from tb_kriteria where kd_kriteria=2"); 
                                                                $sk2=mysqli_fetch_array($k2);
                                                                $skk2=$sk2['bobot_desimal'] ;
                                                                $k3=mysqli_query($konek, "select bobot_desimal from tb_kriteria where kd_kriteria=3"); 
                                                                $sk3=mysqli_fetch_array($k3);
                                                                $skk3=$sk3['bobot_desimal'] ;
                                                                $k4=mysqli_query($konek, "select bobot_desimal from tb_kriteria where kd_kriteria=4"); 
                                                                $sk4=mysqli_fetch_array($k4);
                                                                $skk4=$sk4['bobot_desimal'] ;
                                                                $k5=mysqli_query($konek, "select bobot_desimal from tb_kriteria where kd_kriteria=5"); 
                                                                $sk5=mysqli_fetch_array($k5);
                                                                $skk5=$sk5['bobot_desimal'] ;
                                                                
                                             
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
                                                                         <td><?php echo $potas1=round (pow(((($show['kri2']/sqrt($tot2))*$skk2)-0.145521375),2),9) ; ?></td>
                                                                         <td><?php echo $potas2=round (pow(((($show['kri3']/sqrt($tot3))*$skk3)-0.1603567452),2),9); ?></td>
                                                                         <td><?php echo $potas3=round (pow(((($show['kri4']/sqrt($tot4))*$skk4)-0.048507125),2),9); ?></td>
                                                                         <td><?php echo $potas4=round (pow(((($show['kri5']/sqrt($tot5))*$skk5)-0.072760689),2),9); ?></td>
                                                                         <td><b><?php echo $pos=$potas1+$potas2+$potas3+$potas4 ; ?></b></td>
                                                                         <td><b><?php echo sqrt($pos) ; ?></b></td>
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
                                                 <div class="panel-heading"><b>MATRIKS TOTAL NEGATIF</b></div>
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
                                                                    <th>Negitif</th>
                                                                    <th>Akar Negatif</th>
                                                                 </tr>
                                                             </thead>
                                                             <tbody>
                                                                 <?php  error_reporting(0);

                                                               
                                                                $k2=mysqli_query($konek, "select bobot_desimal from tb_kriteria where kd_kriteria=2"); 
                                                                $sk2=mysqli_fetch_array($k2);
                                                                $skk2=$sk2['bobot_desimal'] ;
                                                                $k3=mysqli_query($konek, "select bobot_desimal from tb_kriteria where kd_kriteria=3"); 
                                                                $sk3=mysqli_fetch_array($k3);
                                                                $skk3=$sk3['bobot_desimal'] ;
                                                                $k4=mysqli_query($konek, "select bobot_desimal from tb_kriteria where kd_kriteria=4"); 
                                                                $sk4=mysqli_fetch_array($k4);
                                                                $skk4=$sk4['bobot_desimal'] ;
                                                                $k5=mysqli_query($konek, "select bobot_desimal from tb_kriteria where kd_kriteria=5"); 
                                                                $sk5=mysqli_fetch_array($k5);
                                                                $skk5=$sk5['bobot_desimal'] ;
                                                                
                                             
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
                                                                         <td><?php echo $ptas1=round (pow(((($show['kri2']/sqrt($tot2))*$skk2)-0.072760689),2),9); ?></td>
                                                                         <td><?php echo $ptas2=round (pow(((($show['kri3']/sqrt($tot3))*$skk3)-0.0801783726),2),9); ?></td>
                                                                         <td><?php echo $ptas3=round (pow(((($show['kri4']/sqrt($tot4))*$skk4)-0.024253563),2),9); ?></td>
                                                                         <td><?php echo $ptas4=round (pow(((($show['kri5']/sqrt($tot5))*$skk5)-0.145521375),2),9); ?></td>
                                                                         <td><b><?php echo $pot=$ptas1+$ptas2+$ptas3+$ptas4 ; ?></b></td>
                                                                         <td><b><?php echo sqrt($pot) ; ?></b></td>
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
                                                 <div class="panel-heading"><b>PREFERENSI (NILAI AKHIR)</b></div>
                                                 <!-- /.panel-heading -->
                                                 <div class="panel-body">
                                                     <div class="table-responsive">
                                                     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                             <!-- <thead>
                                                                 <tr>
                                                                     <th>No</th>
                                                                     <th>Kode Pegawai</th>
                                                                    
                                                                 </tr>
                                                             </thead> -->
                                                             <tbody>
                                                                 <?php  error_reporting(0);
                                             
                                                                 $view=mysqli_query($konek, "select * from tb_pegawai");  
                                                                     
                                             
                                             
                                                                 while($show=mysqli_fetch_array($view)){
                                                                 $no++
                                                                 ?>
                                                                     <tr>
                                                                         <td><?php echo $show['nm_pegawai'] ; ?></td>
                                                                         <!-- <td><?php echo ""; ?></td> -->
                                                                         
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