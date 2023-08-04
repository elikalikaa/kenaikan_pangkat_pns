<?php
// Tambah Data
if(isset($_POST['tambah'])){
//   $kd_pegawai=$_POST['kd_pegawai'];
  $nm_pegawai=$_POST['nm_pegawai'];
  $nip=$_POST['nip'];
  $masa_kerja=$_POST['masa_kerja'];
  $pendidikan_akhir=$_POST['pendidikan_akhir'];
  $tgl_lahir=$_POST['tgl_lahir'];
  $tmpt_lhr=$_POST['tmpt_lhr'];
  $jk=$_POST['jk'];
  $agama=$_POST['agama'];
  $tmt=$_POST['tmt'];

  $birthDate = new DateTime($tgl_lahir);
	$today = new DateTime("today");
	$usia = $today->diff($birthDate)->y;

    $yuhu=mysqli_query($konek, "insert into tb_pegawai values('', '$nm_pegawai', '$nip', '$masa_kerja',
    '$pendidikan_akhir', '$usia', '$tgl_lahir', '$tmpt_lhr', '$jk', '$agama', '$tmt')" );

    


     $num=mysqli_affected_rows($konek);
    
    if($num > 0){
        echo"<script>
        alert('Berhasil Tambah Data');
        document.location='index.php?page=pegawai';
        </script>";
		}else{
			echo"<script>
        alert('gagal Tambah Data');
        </script>";
			}


}

// Ubah Data
if(isset($_POST['ubah'])){
    $kd_pegawai=$_POST['kd_pegawai'];
    $nm_pegawai=$_POST['nm_pegawai'];
    $nip=$_POST['nip'];
    $masa_kerja=$_POST['masa_kerja'];
    $pendidikan_akhir=$_POST['pendidikan_akhir'];
    $tgl_lahir=$_POST['tgl_lahir'];
    $tmpt_lhr=$_POST['tmpt_lhr'];
    $jk=$_POST['jk'];
    $agama=$_POST['agama'];
    $kd_golongan=$_POST['kd_golongan'];
    $tmt=$_POST['tmt'];

    $birthDate = new DateTime($tgl_lahir);
	$today = new DateTime("today");
	$usia = $today->diff($birthDate)->y;
    

    $yuhu=mysqli_query($konek, "update tb_pegawai set nm_pegawai='$nm_pegawai', nip='$nip', masa_kerja='$masa_kerja',
                                pendidikan_akhir='$pendidikan_akhir', usia='$usia', tgl_lahir='$tgl_lahir', tmpt_lhr='$tmpt_lhr', 
                                jk='$jk', agama='$agama', tmt='$tmt'
    where kd_pegawai='$kd_pegawai'
    " );
  
    

     $num=mysqli_affected_rows($konek);
    
    if($num > 0){
        echo"<script>
        alert('Berhasil Ubah Data');
        document.location='index.php?page=pegawai';
        </script>";
		}else{
			echo"<script>
        alert('gagal Ubah Data');
        </script>";
			}

}


// hapus data
if(isset($_GET['hpegawai'])){
	
	$sql=mysqli_query($konek, "delete from tb_pegawai where kd_pegawai='$_GET[hpegawai]'
            ");		
	$num=mysqli_affected_rows($konek);
	
	if($num > 0){
		echo"<script>
        alert('Berhasil Hapus Data');
        document.location='index.php?page=pegawai';
        </script>";
		}else{
			echo"<script>
        alert('gagal Hapus Data');
        </script>";
			}
	
	}

?>

<section class="content">
    <div class="row mb-2">
        <div class="col-sm-12">
            <!--YANG DI UBAH -->
            <?php if(isset($_GET['upegawai'])){
                $uk=mysqli_query($konek, "select * from tb_pegawai where kd_pegawai='$_GET[upegawai]'");
                $pasd=mysqli_fetch_array($uk);
            ?>
            <div class="container">
                <div class="card card-secondary">
                    <div class="card-header">
                    <h3 class="card-title">Form Ubah Data Pegawai</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form role="form" action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode Pegawai</label>
                            <input type="text" class="form-control"  value="<?php echo $pasd['kd_pegawai'] ; ?>" name="kd_pegawai" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Pegawai</label>
                            <input type="text" required class="form-control"  value="<?php echo $pasd['nm_pegawai'] ; ?>" name="nm_pegawai" placeholder="Masukkan Nama Pegawai">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">NIP</label>
                            <input type="number" required class="form-control"  value="<?php echo $pasd['nip'] ; ?>" name="nip" placeholder="Masukkan NIP">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Masa Kerja</label>
                            <input type="number" required class="form-control"  value="<?php echo $pasd['masa_kerja'] ; ?>" name="masa_kerja" placeholder="Masukkan Masa Kerja">
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput">Pendidikan Akhir</label>
                            <input type="text" required class="form-control"  value="<?php echo $pasd['pendidikan_akhir'] ; ?>" name="pendidikan_akhir" placeholder="Contoh: S1/S2/D4/D3/SMK/SMA">
                        </div>
                       
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tgl.Lahir</label>
                            <input type="date" required class="form-control"  value="<?php echo $pasd['tgl_lahir'] ; ?>" name="tgl_lahir">
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput">Tempat Lahir</label>
                            <input type="text" required class="form-control"  value="<?php echo $pasd['tmpt_lhr'] ; ?>" name="tmpt_lhr" placeholder="Masukkan Tempat Lahir">
                        </div>

                        <?php if($pasd['jk']=='Laki-laki'){?>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" checked value="Laki-laki">
                                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" value="Perempuan">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                        </div>
                        <?php }elseif($pasd['jk']=='Perempuan'){?>
                        <div class="form-group">  
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" value="Laki-laki">
                                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" checked name="jk" value="Perempuan">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                        </div>  
                        <?php }else{  ?>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" value="Laki-laki">
                                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" value="Perempuan">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                        </div>

                        <?php } ?>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Agama</label>
                           <select name="agama" id="" class="form-control">
                                     <option style="background-color:aqua;" value="<?php echo $pasd['agama']; ?>"><?php echo $pasd['agama']; ?></option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                           </select>
                        </div>
                       
                        <div class="form-group">
                            <label for="formGroupExampleInput">TMT</label>
                            <input type="date" required class="form-control"  value="<?php echo $pasd['tmt'] ; ?>" name="tmt" placeholder="Masukkan TMT">
                        </div>
                       
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="ubah" class="btn btn-success">Ubah</button> &nbsp;
                        <a href="index.php?page=pegawai" class="btn btn-danger">Kembali</a> &nbsp;
                    </div>
                </form>
            </div>
        </div>
<?php }else{ ?>
<!-- TUTUP UBAH -->
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                <b>Form Pegawai</b> 
                                </div>
                        </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                        Tambah
                                    </button>
                                </div>
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
                                                            <a href="index.php?page=pegawai&upegawai=<?php echo $show['kd_pegawai'] ; ?>" class="btn btn-success btn-xs" title="Ubah">Ubah</a> &nbsp;
                                                            <a href="index.php?page=pegawai&hpegawai=<?php echo $show['kd_pegawai'] ; ?>" class="btn btn-danger btn-xs" title="Hapus">Hapus</a> &nbsp;
                                                            <!-- <a href="" class="btn btn-primary btn-xs" title="Hapus">Tambah</a> &nbsp; -->
                                                        </td>
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

                     <!-- modal -->
            <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="" method="POST">
                        <div class="card-body">
                           
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nama Pegawai</label>
                                <input type="text" class="form-control"  name="nm_pegawai" placeholder="Masukkan Nama Pegawai">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">NIP</label>
                                <input type="number" required class="form-control"name="nip" placeholder="Masukkan NIP">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Masa Kerja</label>
                                <input type="number" required class="form-control"  name="masa_kerja" placeholder="Masukkan Masa Kerja">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Pendidikan Akhir</label>
                                <input type="text" required class="form-control"   name="pendidikan_akhir" placeholder="contoh. S1/S2/D4/D3/SMK/SMA">
                            </div>
                          
                            <div class="form-group">
                                <label for="formGroupExampleInput">Tgl.Lahir</label>
                                <input type="date" required class="form-control"  name="tgl_lahir">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Tempat Lahir</label>
                                <input type="text" required class="form-control"  name="tmpt_lhr" placeholder="Masukkan Tempat Lahir">
                            </div>
                               
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk" value="Laki-laki">
                                        <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk" value="Perempuan">
                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                    </div>
                                </div>
                               
                            <div class="form-group">
                                <label for="formGroupExampleInput">Agama</label>
                                <select name="agama" id="" class="form-control">
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                           </select> </div>
                            
                            <div class="form-group">
                                <label for="formGroupExampleInput">TMT</label>
                                <input type="date" required class="form-control"  name="tmt" placeholder="Masukkan TMT">
                            </div>
                           
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" name="tambah" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                  </div> 
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            </section>
    <!-- /.content -->
    <?php } ?>
                   
     
