<?php
session_start();

//koneksi database
$koneksi = new mysqli("localhost","root","","db_artshop");

if (isset($_SESSION['admin']))
{
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Gofish</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Plugin Styl -->
    <link href="plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <?php include('module/topbar.php'); ?>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <?php include('module/sidebar.php'); ?>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php 

        if(!empty($_GET['module'])) {

          $module=$_GET['module'];
          include('module/'.$module.'.php');
        } else {

          include('module/dashboard.php');
        }

        ?>
        <!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php include('module/footer.php'); ?>

      <!-- Control Sidebar -->
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
          immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <?php include('module/script.php'); ?>
  </body>
</html>

<?php
}
else{
    echo "<script>alert('login dulu');</script>";
    echo "<script>location='../login.php';</script>";
    header('location;../login.php');
    exit();
}
?>