<?php
// Tambah Data
if(isset($_GET['kode'])){
  $kd_peg=$_GET['kode'];
  $tanggal=date('y-m-d');

  $w=mysqli_query($konek, "select * from tb_alternatif where kd_pegawai='$kd_peg'");
  $piu=mysqli_fetch_array($w);

  $query = mysqli_query($konek, "SELECT max(kd_alternatif) as kodeTerbesar FROM tb_alternatif");
  $data = mysqli_fetch_array($query);
  $kodeBarang = $data['kodeTerbesar'];
  $urutan = (int)$kodeBarang;
  $urutan++;
  $kodealternatif = sprintf($urutan);

  $waw=mysqli_query($konek, "select * from tb_kriteria");

if($kd_peg == $piu['kd_pegawai'] ){
echo"<script>
document.location='index.php?page=detail&id=".$piu['kd_alternatif']."';
</script>";
}else{

    mysqli_query($konek, "insert into tb_alternatif values('$kodealternatif', '$kd_peg', '$tanggal','$_SESSION[kd_user]')" );

while($putar=mysqli_fetch_array($waw)){

    mysqli_query($konek, "insert into tb_d_alternatif
                      VALUES
                      ('$kodealternatif','$putar[kd_kriteria]','Belum Tuntas','','$tanggal')             
");

}
$num=mysqli_affected_rows($konek);

if($num > 0){
  echo"<script>
  alert('Berhasil Tambah Data');
  document.location='index.php?page=detail&id=".$kodealternatif."';
  </script>";
  }else{
      echo"<script>
  alert('gagal Tambah Data');
  </script>";
      }

}

}

?>

                    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                   <b>Form Data Alternatif</b> 
                                </div>
                        </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <!-- <div class="panel-heading">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                        Tambah
                                    </button>
                                </div> -->
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
                                                    <th>Action</th>
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
                                                    <td><?php echo $show['masa_kerja'] ; ?> Tahun</td>
                                                    <td><?php echo $show['pendidikan_akhir'] ; ?></td>
                                                    <td><?php echo $show['usia'] ; ?></td>
                                                    <td><?php echo $show['jk'] ; ?></td>
                                                    <td><?php echo $show['agama'] ; ?></td>
                                                    <td><?php echo $show['tmt'] ; ?></td>
                                                        <td>
                                                            <a href="index.php?page=alternatif&kode=<?php echo $show['kd_pegawai'] ; ?>" class="btn btn-success btn-xs" >Nilai</a> &nbsp;
                                                           </td>
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
                    </div>

                   
     
