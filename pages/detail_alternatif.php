<?php
// Tambah Data
if(isset($_POST['edit'])){
    $kd_kriteria=$_POST['kd_kriteria'];
    $kd_alternatif=$_POST['kd_alternatif'];
    $nilai_kriteria=$_POST['nilai_kriteria'];
 

    $yuhu=mysqli_query($konek, "update tb_d_alternatif set nilai_kriteria='$nilai_kriteria'
    where kd_kriteria='$kd_kriteria' and kd_alternatif='$kd_alternatif'
    " );

     $num=mysqli_affected_rows($konek);
    
    if($num > 0){
        echo"<script>
        alert('Berhasil Nilai Data');
        document.location='index.php?page=detail&id=".$kd_alternatif."';
        </script>";
		}else{
			echo"<script>
        alert('gagal Nilai Data');
        </script>";
			}
}

if(isset($_GET['norma'])){
    $alternatif=$_GET['norma'];
    $kriteria=$_GET['kriteria'];
    $nilai=$_GET['nilai_n'];
    
    mysqli_query($konek,"insert into normalisasi_kombinasi values('$alternatif','$kriteria','$nilai')");

    $num=mysqli_affected_rows($konek);
    if($num > 0){
        echo"<script>
        alert('Nilai Bobot Berhasil');
        document.location='index.php?page=detail&id=".$alternatif."';
        </script>";
		}else{
			echo"<script>
        alert('Nilai Bobot Gagal');
        </script>";
			}
}

if(isset($_GET['akhir'])){
    $alternatif=$_GET['kode'];
    $nilai=$_GET['akhir'];
    
    mysqli_query($konek,"insert into tb_nilai_akhir values('','$alternatif','$nilai','Penilaian Data Akhir','Lulus')");

    $num=mysqli_affected_rows($konek);
    if($num > 0){
        echo"<script>
        alert('Input Nilai Akhir Berhasil');
        document.location='index.php?page=nilaiakhir';
        </script>";
		}else{
			echo"<script>
        alert('Input Nilai Gagal');
        </script>";
			}
}

?>

                    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                   <b>Detail Alternatif</b> 
                                </div>
                               
                               <?php if(isset($_GET['ubah'])){
                $uk=mysqli_query($konek, "select * from tb_d_alternatif d
                inner join tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                 where d.kd_kriteria='$_GET[krit]' and d.kd_alternatif='$_GET[ubah]'");
                $pasd=mysqli_fetch_array($uk);
            ?>
            <div class="container">
                <div class="card card-secondary">
                    <div class="card-header">
                    <h3 class="card-title">Form Penilaian</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form role="form" action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode Kriteria</label>
                            <input type="text" class="form-control"  value="<?php echo $pasd['kd_kriteria'] ; ?>" name="kd_kriteria" readonly >
                            <input type="hidden" class="form-control"  value="<?php echo $pasd['kd_alternatif'] ; ?>" name="kd_alternatif" readonly >
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kriteria</label>
                            <input type="text" required class="form-control"  value="<?php echo $pasd['kriteria'] ; ?>" readonly name="kriteria" placeholder="Masukkan Kriteria">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Bobot</label>
                            <input type="text" required class="form-control"  value="<?php echo $pasd['bobot_persen'] ; ?>%" readonly name="bobot" placeholder="Masukkan Bobot" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nilai</label>
                           <select name="nilai_kriteria" class="form-control" id="">
                            <option value=""></option>
                            <?php 
                            $biar=mysqli_query($konek, "select * from tb_sub_kriteria where kd_kriteria = '$pasd[kd_kriteria]' ");

                            while($put=mysqli_fetch_array($biar)){
                            ?>
                            <option value="<?php echo $put['bobot'] ; ?>"><?php echo $put['sub_kriteria'] ; ?></option>
                            <?php } ?>
                           </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="edit" class="btn btn-success">Ubah</button> &nbsp;
                        <a href="index.php?page=detail&id=<?php echo $_GET['ubah']  ; ?>" class="btn btn-danger">Kembali</a> &nbsp;
                    </div>
                </form>
            </div>
        </div>
        <br>
        <?php }else{ ?> 
                        </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                        Tambah
                                    </button> -->
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kriteria</th>
                                                    <th>Bobot</th>
                                                    <th>Nilai Kriteria</th>
                                                    <th>Action</th>
                                                    <th>Matriks Max/Min</th>
                                                    <th>Matriks Ternormalisasi</th>
                                                    <th>Ternormalisasi Bobot</th>
                                                    <th>P & N</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);

                                                
                            
                                                $view=mysqli_query($konek, "select *, d.kd_kriteria as kode_kriteria from tb_d_alternatif d
                                                inner join tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                                                where kd_alternatif='$_GET[id]'
                                                ");  

                                                while($show=mysqli_fetch_array($view)){
                                                $no++
                                                ?>
                                                    <tr>
                                                    <td><?php echo $no ; ?></td>
                                                    <td><?php echo $show['kriteria'] ; ?></td>
                                                  
                                                    <td><?php echo $show['bobot_persen'] ; ?>%</td>
                                                    <td><?php echo $show['nilai_kriteria'] ; ?></td>
                                                    <td>
                                                        <a href="index.php?page=detail&ubah=<?php echo $show['kd_alternatif'] ; ?>&krit=<?php echo $show['kd_kriteria'] ; ?>" class="btn btn-success btn-xs" title="Ubah">Edit Nilai Kriteria</a> &nbsp;
                                                          </td>
                                                         
                                                    <td><?php

                                                    
                                                    if($show['atribut'] == "Benefit"){
                                                    $maxmin=mysqli_query($konek, "select max(nilai_kriteria) as nilai_kriteria from tb_d_alternatif 
                                                    where kd_kriteria = '$show[kode_kriteria]'
                                                    ");
                                                    }else{ 
                                                        $maxmin=mysqli_query($konek, "select min(nilai_kriteria) as nilai_kriteria from tb_d_alternatif 
                                                    where kd_kriteria = '$show[kode_kriteria]'
                                                    ");
                                                    }
                                                    
                                                    $pii=mysqli_fetch_array($maxmin);

                                                    echo $pii['nilai_kriteria'] ;   ?></td>
                                                     <td><?php 
                                                     if($show['atribut'] == "Benefit"){
                                                     echo $satu=$show['nilai_kriteria']/$pii['nilai_kriteria'] ;
                                                     }else{
                                                        echo $dua=$pii['nilai_kriteria']/$show['nilai_kriteria'] ;
                                                     }
                                                     ?></td>
                                                     <td>
                                                        <?php
                                                         if($show['atribut'] == "Benefit"){
                                                        echo $nilai_n=$satu*$show['bobot_desimal'];
                                                         }else{
                                                            echo $nilai_n=$dua*$show['bobot_desimal']; 
                                                         }
                                                        ?>
                                                        <a href="index.php?page=detail&norma=<?php echo $show['kd_alternatif'] ; ?>&kriteria=<?php echo $show['kode_kriteria'] ; ?>&nilai_n=<?php echo $nilai_n ; ?>" class="btn btn-warning btn-xs" >Check Bobot</a>
                                                     </td>
                                                     <td>
                                                            <?php 

                                                            if($show['atribut'] == "Benefit"){
                                                            $frmax=mysqli_query($konek, "select max(nilai_bobot) as nilai_bobot from normalisasi_kombinasi where kd_kriteria='$show[kode_kriteria]'");
                                                            $bbmax=mysqli_fetch_array($frmax);
                                                            }else{
                                                            $frmax=mysqli_query($konek, "select min(nilai_bobot) as nilai_bobot from normalisasi_kombinasi where kd_kriteria='$show[kode_kriteria]'");
                                                            $bbmax=mysqli_fetch_array($frmax);
                                                            }

                                                            if($show['atribut'] == "Benefit"){
                                                            $frmin=mysqli_query($konek, "select min(nilai_bobot) as nilai_bobot from normalisasi_kombinasi where kd_kriteria='$show[kode_kriteria]'");
                                                            $bbmin=mysqli_fetch_array($frmin);
                                                            }else{
                                                            $frmin=mysqli_query($konek, "select max(nilai_bobot) as nilai_bobot from normalisasi_kombinasi where kd_kriteria='$show[kode_kriteria]'");
                                                            $bbmin=mysqli_fetch_array($frmin);
                                                            }
                                                            echo $bbmax['nilai_bobot']." & ".$bbmin['nilai_bobot'] ; ?>
                                                            </td>
                                                    </tr>
                                                   
                                                <?php }?>
                                                <tr>
                                                    <?php

                                                    // Ideal Positif dan Negatif

                                                    //     $dua=mysqli_query($konek, "select *, d.kd_kriteria as kode_kriteria from tb_d_alternatif d
                                                    //     inner join tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                                                    //     where kd_alternatif='$_GET[id]'
                                                    //     ");

                                                    //     $sdua=mysqli_fetch_array($dua);
                                                    
                                                    // if($sdua['atribut'] == "Benefit"){
                                                    //     $maxmin2=mysqli_query($konek, "select max(nilai_kriteria) as nilai_kriteria from tb_d_alternatif 
                                                    //     where kd_kriteria = '$sdua[kode_kriteria]'
                                                    //     ");
                                                    //     }else{ 
                                                    //         $maxmin2=mysqli_query($konek, "select min(nilai_kriteria) as nilai_kriteria from tb_d_alternatif 
                                                    //     where kd_kriteria = '$sdua[kode_kriteria]'
                                                    //     ");
                                                    //     }
                                                        
                                                    //     $pii2=mysqli_fetch_array($maxmin2);
    
                                                    //     $pii2['nilai_kriteria'] ;   
                                                    //      if($sdua['atribut'] == "Benefit"){
                                                    //      $satu=$sdua['nilai_kriteria']/$pii2['nilai_kriteria'] ;
                                                    //      }else{
                                                    //         $dua=$pii2['nilai_kriteria']/$sdua['nilai_kriteria'] ;
                                                    //      }
                                                        
                                                    //          if($sdua['atribut'] == "Benefit"){
                                                    //         $nilai_n=$satu*$sdua['bobot_desimal'];
                                                    //          }else{
                                                    //            $nilai_n=$dua*$sdua['bobot_desimal']; 
                                                    //          }


                                                    //         //  Data Kriteria Positif dan Negatif
                                                    //         $dua=mysqli_query($konek, "select *, d.kd_kriteria as kode_kriteria from tb_d_alternatif d
                                                    //         inner join tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                                                    //         where kd_alternatif='$_GET[id]'
                                                    //         ");     

                                                    //         $sdua=mysqli_fetch_array($dua);

                                                    //         if($show['atribut'] == "Benefit"){
                                                    //         $frmax=mysqli_query($konek, "select max(nilai_bobot) as nilai_bobot from normalisasi_kombinasi where kd_kriteria='$show[kode_kriteria]'");
                                                    //         $bbmax=mysqli_fetch_array($frmax);
                                                    //         }else{
                                                    //         $frmax=mysqli_query($konek, "select min(nilai_bobot) as nilai_bobot from normalisasi_kombinasi where kd_kriteria='$show[kode_kriteria]'");
                                                    //         $bbmax=mysqli_fetch_array($frmax);
                                                    //         }

                                                    //         if($show['atribut'] == "Benefit"){
                                                    //         $frmin=mysqli_query($konek, "select min(nilai_bobot) as nilai_bobot from normalisasi_kombinasi where kd_kriteria='$show[kode_kriteria]'");
                                                    //         $bbmin=mysqli_fetch_array($frmin);
                                                    //         }else{
                                                    //         $frmin=mysqli_query($konek, "select max(nilai_bobot) as nilai_bobot from normalisasi_kombinasi where kd_kriteria='$show[kode_kriteria]'");
                                                    //         $bbmin=mysqli_fetch_array($frmin);
                                                    //         }

                                                    //         $bbmax['nilai_bobot']." & ".$bbmin['nilai_bobot'] ; 
                                                    ?>

                                                          
                                                <!-- <th>No</th>
                                                    <th>Kriteria</th>
                                                    <th>Bobot</th>
                                                    <th>Nilai Kriteria</th>
                                                    <th>Action</th>
                                                  
                                                    <th>Positif : 
                                                            <?php echo $nilai_n ; ?>
                                                    </th>
                                                    <th>Negatif : 
                                                        <?php echo $nilai_n ; ?>
                                                    </th> -->

                                                    <?php
                                                    $tit=mysqli_query($konek, "
                                                                 
                                                    select * from view_tess where kd_alternatif='$_GET[id]'
                                                      
                                                      ");  
                                                          
                                  
                                  
                                                      $tut=mysqli_fetch_array($tit);
                                                    ?>
                                                    <th colspan="8">Nilai Akhir</th>
                                                    <th><?php echo $cis=round($tut['Akar_Negatif']/($tut['Akar_Negatif']+$tut['Akar_Positif']),9) ; ?></th>
                                                    <!-- <th>P & N</th> -->
                                                 
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="index.php?page=detail&akhir=<?php echo $cis ; ?>&kode=<?php echo $tut['kd_alternatif'] ; ?>" class="btn btn-primary" onclick="">Input Nilai Akhir</a>
                                        
                                    </div>
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                   
     
<?php } ?>