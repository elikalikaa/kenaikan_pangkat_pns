<?php
// Tambah Data
if(isset($_POST['tambah'])){
  $kd_kriteria=$_POST['kd_kriteria'];
  $sub_kriteria=$_POST['sub_kriteria'];
  $ket_sub=$_POST['ket_sub'];
  $bobot=$_POST['bobot'];

    $yuhu=mysqli_query($konek, "insert into tb_sub_kriteria values('', '$kd_kriteria', '$sub_kriteria','$bobot','$ket_sub')" );


     $num=mysqli_affected_rows($konek);
    
    if($num > 0){
        echo"<script>
        alert('Berhasil Tambah Data');
        document.location='index.php?page=subkriteria';
        </script>";
		}else{
			echo"<script>
        alert('gagal Tambah Data');
        </script>";
			}


}

// Ubah Data
if(isset($_POST['ubah'])){
    $kd_sub_kriteria=$_POST['kd_sub_kriteria'];
    $kd_kriteria=$_POST['kd_kriteria']; 
    $sub_kriteria=$_POST['sub_kriteria'];
    $ket_sub=$_POST['ket_sub'];
    $bobot=$_POST['bobot'];
    $yuhu=mysqli_query($konek, "update tb_sub_kriteria set kd_kriteria='$kd_kriteria', bobot='$bobot' ,sub_kriteria='$sub_kriteria', ket_sub='$ket_sub'
    where kd_sub_kriteria='$kd_sub_kriteria'
    " );
  
    

     $num=mysqli_affected_rows($konek);
    
    if($num > 0){
        echo"<script>
        alert('Berhasil Ubah Data');
        document.location='index.php?page=subkriteria';
        </script>";
		}else{
			echo"<script>
        alert('gagal Ubah Data');
        </script>";
			}

}


// hapus data
if(isset($_GET['huser'])){
	
	$sql=mysqli_query($konek, "delete from tb_sub_kriteria where kd_sub_kriteria='$_GET[huser]'
            ");		
	$num=mysqli_affected_rows($konek);
	
	if($num > 0){
		echo"<script>
        alert('Berhasil Hapus Data');
        document.location='index.php?page=subkriteria';
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
                $uk=mysqli_query($konek, "select * from tb_sub_kriteria where kd_sub_kriteria='$_GET[uuser]'");
                $pasd=mysqli_fetch_array($uk);
            ?>
            <div class="container">
                <div class="card card-secondary">
                    <div class="card-header">
                    <h3 class="card-title">Form Ubah Sub Kriteria</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form role="form" action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode Sub Kriteria</label>
                            <input type="text" class="form-control"  value="<?php echo $pasd['kd_sub_kriteria'] ; ?>" name="kd_sub_kriteria" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Sub Kriteria</label>
                            <input type="text" required class="form-control"  value="<?php echo $pasd['sub_kriteria'] ; ?>" name="sub_kriteria" placeholder="Masukkan Sub Kriteria">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kriteria</label>
                            <select name="kd_kriteria" id="" class="form-control" required>
                                <?php
                                $kri=mysqli_query($konek, "select * from tb_kriteria");
                                while($cis=mysqli_fetch_array($kri)){
                                ?>
                                <option value="<?php echo $cis['kd_kriteria'] ; ?>"><?php echo $cis['kriteria'] ; ?></option>
                                <?php } ?>
                            </select>
                         </div>
                         <div class="form-group">
                            <label for="formGroupExampleInput">Bobot</label>
                            <input type="text" required class="form-control"  value="<?php echo $pasd['bobot'] ; ?>" name="bobot" placeholder="Masukkan Bobot Sub Kriteria">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Keterangan</label>
                            <input type="text" required class="form-control"  value="<?php echo $pasd['ket_sub'] ; ?>" name="ket_sub" placeholder="Masukkan Keterangan">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="ubah" class="btn btn-success">Ubah</button> &nbsp;
                        <a href="index.php?page=subkriteria" class="btn btn-danger">Kembali</a> &nbsp;
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
                                  <b>Form Sub Kriteria</b>  
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
                                                    <th>Kode Sub Kriteria</th>
                                                    <th>Sub Kriteria</th>
                                                    <th>Kriteria</th>
                                                    <th>Bobot Sub</th>
                                                    <th>Keterangan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view=mysqli_query($konek, "select * from tb_sub_kriteria s
                                                inner join tb_kriteria k on k.kd_kriteria=s.kd_kriteria
                                                ");  
                                                    
                            
                                                while($show=mysqli_fetch_array($view)){
                                                $no++
                                                ?>
                                                    <tr>
                                                    <td><?php echo $no ; ?></td>
                                                    <td><?php echo $show['kd_sub_kriteria'] ; ?></td>
                                                    <td><?php echo $show['sub_kriteria'] ; ?></td>
                                                    <td><?php echo $show['kriteria'] ; ?></td>
                                                    <td><?php echo $show['bobot'] ; ?></td>
                                                    <td><?php echo $show['ket_sub'] ; ?></td>
                                                        <td>
                                                            <a href="index.php?page=subkriteria&uuser=<?php echo $show['kd_sub_kriteria'] ; ?>" class="btn btn-success btn-xs" title="Ubah">Ubah</a> &nbsp;
                                                            <a href="index.php?page=subkriteria&huser=<?php echo $show['kd_sub_kriteria'] ; ?>" class="btn btn-danger btn-xs" title="Hapus">Hapus</a> &nbsp;
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
                    <h4 class="modal-title">Tambah Data Sub-Kriteria</h4>
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
                                <label for="formGroupExampleInput">Sub Kriteria</label>
                                <input type="text" required class="form-control" name="sub_kriteria" placeholder="Masukkan Sub Kriteria">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Kriteria</label>
                                <select name="kd_kriteria" id="" class="form-control">
                                <?php
                                $kri=mysqli_query($konek, "select * from tb_kriteria");
                                while($cis=mysqli_fetch_array($kri)){
                                ?>
                                <option value="<?php echo $cis['kd_kriteria'] ; ?>"><?php echo $cis['kriteria'] ; ?></option>
                                <?php } ?>
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Bobot</label>
                                <input type="text" required class="form-control" name="bobot" placeholder="Masukkan Bobot Sub Kriteria">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Keterangan</label>
                                <input type="text" required class="form-control" name="ket_sub" placeholder="Masukkan Keterangan">
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
                   
     
                                            