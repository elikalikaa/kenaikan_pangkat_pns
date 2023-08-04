<?php
// Tambah Data
if(isset($_POST['tambah'])){
  $kd_alternatif=$_POST['kd_alternatif'];
  $total_nilai=$_POST['total_nilai'];
  $ket=$_POST['ket'];
  $status_nilai=$_POST['status_nilai'];

    $yuhu=mysqli_query($konek, "insert into tb_nilai_akhir values('', '$kd_alternatif', '$total_nilai', '$ket', '$status_nilai')" );


     $num=mysqli_affected_rows($konek);
    
    if($num > 0){
        echo"<script>
        alert('Berhasil Tambah Data');
        document.location='index.php?page=nilaiakhir';
        </script>";
		}else{
			echo"<script>
        alert('gagal Tambah Data');
        </script>";
			}


}

// Ubah Data
if(isset($_POST['ubah'])){
    $kd_nilai=$_POST['kd_nilai'];
    $kd_alternatif=$_POST['kd_alternatif'];
    $total_nilai=$_POST['total_nilai'];
    $ket=$_POST['ket'];
    $status_nilai=$_POST['status_nilai'];

    $yuhu=mysqli_query($konek, "update tb_nilai_akhir set kd_alternatif='$kd_alternatif', ket='$ket', status_nilai='$status_nilai'
    where kd_nilai='$kd_nilai'
    " );
  
    

     $num=mysqli_affected_rows($konek);
    
    if($num > 0){
        echo"<script>
        alert('Berhasil Ubah Data');
        document.location='index.php?page=nilaiakhir';
        </script>";
		}else{
			echo"<script>
        alert('gagal Ubah Data');
        </script>";
			}

}


// hapus data
if(isset($_GET['hnilaiakhir'])){
	
	$sql=mysqli_query($konek, "delete from tb_nilai_akhir where kd_nilai='$_GET[hnilaiakhir]'
            ");		
	$num=mysqli_affected_rows($konek);
	
	if($num > 0){
		echo"<script>
        alert('Berhasil Hapus Data');
        document.location='index.php?page=nilaiakhir';
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
            <?php if(isset($_GET['unilaiakhir'])){
                $uk=mysqli_query($konek, "select * from tb_nilai_akhir where kd_nilai='$_GET[unilaiakhir]'");
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
                            <label for="formGroupExampleInput">Kode Nilai Akhir</label>
                            <input type="text" class="form-control"  value="<?php echo $pasd['kd_nilai'] ; ?>" name="kd_nilai" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode Alternatif</label>
                            <input type="text" class="form-control"  value="<?php echo $pasd['kd_alternatif'] ; ?>" name="kd_alternatif" placeholder="Masukkan Kode">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Total Nilai</label>
                            <input type="text" class="form-control"  value="<?php echo $pasd['total_nilai'] ; ?>" name="total_nilai" placeholder="Masukkan Total Nilai">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Keterangan</label>
                            <input type="text" class="form-control"  value="<?php echo $pasd['ket'] ; ?>" name="ket" placeholder="Masukkan Keterangan">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Status Nilai</label>
                            <input type="text" class="form-control"  value="<?php echo $pasd['status_nilai'] ; ?>" name="status_nilai" placeholder="Masukkan Status Nilai">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="ubah" class="btn btn-success">Ubah</button> &nbsp;
                        <a href="index.php?page=nilaiakhir" class="btn btn-danger">Kembali</a> &nbsp;
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
                                   <b>Form Nilai Akhir</b> 
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
                                                    <th>Kode Nilai Akhir</th>
                                                    <th>Kode Alternatif</th>
                                                    <th>Total Nilai</th>
                                                    <th>Ket</th>
                                                    <th>Status Nilai</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view=mysqli_query($konek, "select * from tb_nilai_akhir");  
                                                    
                            
                            
                                                while($show=mysqli_fetch_array($view)){
                                                $no++
                                                ?>
                                                    <tr>
                                                    <td><?php echo $no ; ?></td>
                                                    <td><?php echo $show['kd_nilai'] ; ?></td>
                                                    <td><?php echo $show['kd_alternatif'] ; ?></td>
                                                    <td><?php echo $show['total_nilai'] ; ?></td>
                                                    <td><?php echo $show['ket'] ; ?></td>
                                                    <td><?php echo $show['status_nilai'] ; ?></td>
                                                        <!-- <td>
                                                            <a href="index.php?page=nilaiakhir&unilaiakhir=<?php echo $show['kd_nilai'] ; ?>" class="btn btn-success btn-xs" title="Ubah">Ubah</a> &nbsp;
                                                            <a href="index.php?page=nilaiakhir&hnilaiakhir=<?php echo $show['kd_nilai'] ; ?>" class="btn btn-danger btn-xs" title="Hapus">Hapus</a> &nbsp;
                                                            <a href="" class="btn btn-primary btn-xs" title="Hapus">Tambah</a> &nbsp;
                                                        </td> -->
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

          
            </section>
    <!-- /.content -->
    <?php } ?>
                   
     
