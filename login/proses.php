<?php
include('../pages/koneksi.php');

error_reporting(0);
 
session_start();

if (isset($_POST['submit'])) {
  $email = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM tb_user WHERE nm_user='$email' AND pass='$password'";
  $result = mysqli_query($konek, $sql);
  if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['nm_user'];
      $_SESSION['password'] = $row['pass'];
      $_SESSION['level'] = $row['level'];
      $_SESSION['kd_user'] = $row['kd_user'];
      header("Location: ../");
  } else {
      echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!');
      document.location='login.php';      
      </script>";
  }
}


?>