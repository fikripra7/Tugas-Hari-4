<?php

  session_start();

  // jika sesi login tidak dikenali atau kosong
  if (empty($_SESSION["tiket_user"])) {
    // arahkan kembali login.php
    header("location: login.php");
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home - CMS Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="my-theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="my-theme/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="my-theme/css/sb-admin.css" rel="stylesheet">

  <!-- Notifikasi Hapus -->
  <script type="text/javascript">
    function hapus(del){
      if(confirm("Anda Yakin Hapus Data?")){
        document.location=del;
      }
    }
  </script>

  <!-- CKEditor -->
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

</head>

<body id="page-top">

  <!-- navigasi.php -->
  <?php include"my-pages/navigasi.php"; ?>

  <div id="wrapper">

    <!-- sidebar.php -->
    <?php include "my-pages/sidebar.php"; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Dynamic Page -->
        <?php

          if(isset($_GET["tdata"])){
            include "input-data.php";
          } elseif (isset($_GET["ldata"])) {
            include "tampil-data.php";
          } elseif (isset($_GET["cari"])) {
            include "hasil-cari.php";
          } elseif (isset($_GET["kode"])) {
            include "filter-data.php";
          } elseif (isset($_GET["edit_id"])) {
            include "edit-data.php";
          } elseif (isset($_GET["tartikel"])) {
            include "input-berita.php";
          } elseif (isset($_GET["lartikel"])) {
            include "tampil-berita.php";
          } elseif (isset($_GET["status_id"])) {
            include "edit-status.php";
          } else {
            include "my-pages/home.php";
          }

        ?>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- footer.php -->
  <?php include "my-pages/footer.php"?>

</body>

</html>
