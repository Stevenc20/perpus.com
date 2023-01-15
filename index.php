<?php
session_start();
include("models/konek.php");
include("models/cek.php");

include("view/func.php");

include("view/index/siteinfo.php");

$id_user=$_SESSION['id_user'];
$nama_user=$_SESSION['nama_user'];
$level_user=$_SESSION['level_user'];
$user_tampil=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIPER</title>
  <?php include('lte/css/info-css.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="lte/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <?php include('view/index/header.php');?>

  <?php include('view/index/menu.php');?>

  <?php include('view/halaman.php');?>

  <?php include('view/index/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include('lte/js/info-js.php');?>
</body>
</html>
