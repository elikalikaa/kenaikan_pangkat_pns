<?php
// Tambah Data
if(isset($_POST['tambah'])){
//   $kd_pegawai=$_POST['kd_pegawai'];
  $nm_user=$_POST['nm_user'];
//   $level=$_POST['level'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];

    $yuhu=mysqli_query($konek, "insert into tb_user values('', '$nm_user', 'admin', '$email', '$pass')" );


     $num=mysqli_affected_rows($konek);
    
    if($num > 0){
        echo"<script>
        alert('Berhasil Tambah Data');
        document.location='index.php?page=admin';
        </script>";
		}else{
			echo"<script>
        alert('gagal Tambah Data');
        </script>";
			}


}

// Ubah Data
if(isset($_POST['ubah'])){
    $kd_user=$_POST['kd_user'];
    $nm_user=$_POST['nm_user'];
    // $level=$_POST['level'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $yuhu=mysqli_query($konek, "update tb_user set nm_user='$nm_user',  email='$email', pass='$pass'
    where kd_user='$kd_user'
    " );
  
    

     $num=mysqli_affected_rows($konek);
    
    if($num > 0){
        echo"<script>
        alert('Berhasil Ubah Data');
        document.location='index.php?page=admin';
        </script>";
		}else{
			echo"<script>
        alert('gagal Ubah Data');
        </script>";
			}

}


// hapus data
if(isset($_GET['huser'])){
	
	$sql=mysqli_query($konek, "delete from tb_user where kd_user='$_GET[huser]'
            ");		
	$num=mysqli_affected_rows($konek);
	
	if($num > 0){
		echo"<script>
        alert('Berhasil Hapus Data');
        document.location='index.php?page=admin';
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
            <?php if(isset($_GET['uuser'])){
                $uk=mysqli_query($konek, "select * from tb_user where kd_user='$_GET[uuser]'");
                $pasd=mysqli_fetch_array($uk);
            ?>
            <div class="container">
                <div class="card card-secondary">
                    <div class="card-header">
                    <h3 class="card-title">Form Ubah Data Admin</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form role="form" action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode User</label>
                            <input type="text" class="form-control"  value="<?php echo $pasd['kd_user'] ; ?>" name="kd_user" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama User</label>
                            <input type="text" required class="form-control"  value="<?php echo $pasd['nm_user'] ; ?>" name="nm_user" placeholder="Masukkan Nama User">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Level</label>
                            <input type="text" required class="form-control"  value="<?php echo $pasd['level'] ; ?>"readonly placeholder="Masukkan Level">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Email</label>
                            <input type="email" required class="form-control"  value="<?php echo $pasd['email'] ; ?>" name="email" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Password</label>
                            <input type="password" required class="form-control"  value="<?php echo $pasd['pass'] ; ?>" name="pass" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="ubah" class="btn btn-success">Ubah</button> &nbsp;
                        <a href="index.php?page=admin" class="btn btn-danger">Kembali</a> &nbsp;
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
                                  <b>Form Admin</b>  
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
                                                    <th>Kode User</th>
                                                    <th>Nama User</th>
                                                    <th>Level</th>
                                                    <th>Email</th>
                                                    <!-- <th>Password</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view=mysqli_query($konek, "select * from tb_user");  
                                                    
                            
                            
                                                while($show=mysqli_fetch_array($view)){
                                                $no++
                                                ?>
                                                    <tr>
                                                    <td><?php echo $no ; ?></td>
                                                    <td><?php echo $show['kd_user'] ; ?></td>
                                                    <td><?php echo $show['nm_user'] ; ?></td>
                                                    <td><?php echo $show['level'] ; ?></td>
                                                    <td><?php echo $show['email'] ; ?></td>
                                                    <!-- <td><?php echo $show['pass'] ; ?></td> -->
                                                        <td>
                                                            <a href="index.php?page=admin&uuser=<?php echo $show['kd_user'] ; ?>" class="btn btn-success btn-xs" title="Ubah">Ubah</a> &nbsp;
                                                            <a href="index.php?page=admin&huser=<?php echo $show['kd_user'] ; ?>" class="btn btn-danger btn-xs" title="Hapus">Hapus</a> &nbsp;
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
                    <h4 class="modal-title">Tambah Data Admin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="" method="POST">
                        <div class="card-body">
                            <!-- <div class="form-group">
                                <label for="formGroupExampleInput">Kode User</label>
                                <input type="text" class="form-control" name="kd_user" readonly>
                            </div> -->
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nama User</label>
                                <input type="text" required class="form-control" name="nm_user" placeholder="Masukkan Nama User">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Level</label>
                                <input type="text" required class="form-control"readonly value="Admin">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Email</label>
                                <input type="email" required class="form-control" name="email" placeholder="Masukkan Email">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Password</label>
                                <input type="password" required class="form-control" name="pass" placeholder="Masukkan Password">
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
                   
     
                                            