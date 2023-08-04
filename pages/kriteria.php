<?php
// Tambah Data
if(isset($_POST['tambah'])){
//   $kd_pegawai=$_POST['kd_pegawai'];
  $kriteria=$_POST['kriteria'];
  $bobot=$_POST['bobot_persen'];
  $bobot_desimal=$bobot/100;
  $atribut=$_POST['atribut'];

    $yuhu=mysqli_query($konek, "insert into tb_kriteria values('', '$kriteria', '$bobot', '$bobot_desimal', '$atribut')" );


     $num=mysqli_affected_rows($konek);
    
    if($num > 0){
        echo"<script>
        alert('Berhasil Tambah Data');
        document.location='index.php?page=kriteria';
        </script>";
		}else{
			echo"<script>
        alert('gagal Tambah Data');
        </script>";
			}


}

// Ubah Data
if(isset($_POST['ubah'])){
    $kd_kriteria=$_POST['kd_kriteria'];
    $kriteria=$_POST['kriteria'];
    $bobot=$_POST['bobot_persen'];
    $bobot_desimal=$bobot/100;
    $atribut=$_POST['atribut'];

    $yuhu=mysqli_query($konek, "update tb_kriteria set kriteria='$kriteria', bobot_persen='$bobot', atribut='$atribut', bobot_desimal='$bobot_desimal'
    
    where kd_kriteria='$kd_kriteria'
    " );
  
    

     $num=mysqli_affected_rows($konek);
    
    if($num > 0){
        echo"<script>
        alert('Berhasil Ubah Data');
        document.location='index.php?page=kriteria';
        </script>";
		}else{
			echo"<script>
        alert('gagal Ubah Data');
        </script>";
			}

}


// hapus data
if(isset($_GET['hkriteria'])){
	
	$sql=mysqli_query($konek, "delete from tb_kriteria where kd_kriteria='$_GET[hkriteria]'
            ");		
	$num=mysqli_affected_rows($konek);
	
	if($num > 0){
		echo"<script>
        alert('Berhasil Hapus Data');
        document.location='index.php?page=kriteria';
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
            <?php if(isset($_GET['ukriteria'])){
                $uk=mysqli_query($konek, "select * from tb_kriteria where kd_kriteria='$_GET[ukriteria]'");
                $pasd=mysqli_fetch_array($uk);
            ?>
            <div class="container">
                <div class="card card-secondary">
                    <div class="card-header">
                    <h3 class="card-title">Form Ubah Data Kriteria</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form role="form" action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode Kriteria</label>
                            <input type="text" class="form-control"  value="<?php echo $pasd['kd_kriteria'] ; ?>" name="kd_kriteria" readonly >
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kriteria</label>
                            <input type="text" required class="form-control"  value="<?php echo $pasd['kriteria'] ; ?>" name="kriteria" placeholder="Masukkan Kriteria">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Bobot Persentase</label>
                            <input type="number" required class="form-control"  value="<?php echo $pasd['bobot_persen'] ; ?>" name="bobot_persen" placeholder="Masukkan Bobot">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Bobot</label>
                            <input type="text" required class="form-control"  value="<?php echo $pasd['atribut'] ; ?>" name="atribut" placeholder="Masukkan Atribut Kriteria">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="ubah" class="btn btn-success">Ubah</button> &nbsp;
                        <a href="index.php?page=kriteria" class="btn btn-danger">Kembali</a> &nbsp;
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
                                   <b>Form Kriteria</b> 
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
                                                    <th>Kode Kriteria</th>
                                                    <th>Kriteria</th>
                                                    <th>Bobot %</th>
                                                    <th>Bobot Desimal</th>
                                                    <th>Atribut Kriteria</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  error_reporting(0);
                            
                                                $view=mysqli_query($konek, "select * from tb_kriteria");  
                                                    
                            
                            
                                                while($show=mysqli_fetch_array($view)){
                                                $no++
                                                ?>
                                                    <tr>
                                                    <td><?php echo $no ; ?></td>
                                                    <td><?php echo $show['kd_kriteria'] ; ?></td>
                                                    <td><?php echo $show['kriteria'] ; ?></td>
                                                    <td><?php echo $show['bobot_persen'] ; ?>%</td>
                                                    <td><?php echo $show['bobot_desimal'] ; ?></td>
                                                    <td><?php echo $show['atribut'] ; ?></td>
                                                        <td>
                                                            <a href="index.php?page=kriteria&ukriteria=<?php echo $show['kd_kriteria'] ; ?>" class="btn btn-success btn-xs" title="Ubah">Ubah</a> &nbsp;
                                                            <a href="index.php?page=kriteria&hkriteria=<?php echo $show['kd_kriteria'] ; ?>" class="btn btn-danger btn-xs" title="Hapus">Hapus</a> &nbsp;
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
                    <h4 class="modal-title">Tambah Data Kriteria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="" method="POST">
                        <div class="card-body">
                            <!-- <div class="form-group">
                                <label for="formGroupExampleInput">Kode Kriteria</label>
                                <input type="text" class="form-control" name="kd_kriteria" readonly>
                            </div> -->
                            <div class="form-group">
                                <label for="formGroupExampleInput">Kriteria</label>
                                <input type="text" required class="form-control" name="kriteria" placeholder="Masukkan Kriteria">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Bobot Persentase</label>
                                <input type="number" required class="form-control" name="bobot_persen" placeholder="Masukkan Bobot">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Atribut Kriteria</label>
                                <input type="text" required class="form-control" name="atribut" placeholder="Masukkan Atribut Kriteria">
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
                   
     
