<?php
include('pages/koneksi.php');

error_reporting(0);
 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login/login.php");
  }
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="0;url=pages/index.php">
    <title>Startmin</title>
    <script language="javascript">
        window.location.href = "pages/index.php"
    </script>
</head>
<body>
<a href="pages/index.php">Go to Demo</a>
</body>
</html>
