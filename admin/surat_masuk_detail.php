<?php
include "../include/connect.php";
include "../include/session.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Surat Masuk</title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <?php
    session_start();

    // cek apakah sudah login
    if ($_SESSION['role']=="") {
      header("location:surat_masuk.php?pesan=gagal");
    }
    ?>
<?php include "../template/navbar.php" ?>
<?php include "../template/side-bar.php" ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Surat Masuk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Surat Masuk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xl-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <br>
                              <?php
            $id_surat = $_GET["id_surat"];
            $querysuratmasuk = mysqli_query($connect, "SELECT * FROM tbl_suratmasuk WHERE id_surat='$id_surat'");
            if($querysuratmasuk == false) {
              die("Terjadi Kesalahan : ".mysqli_error($connect));
            }
            while ($surat_masuk = mysqli_fetch_array($querysuratmasuk)){
              echo "
              <div class='content'>
              <table class='table-form' border='0' width='100%' cellpadding='0' cellspacing='0'>
              <thead>
                  <tr>
                  <td width='20%'>NIK</td>
                  <td>: </td>
                  <td>$surat_masuk[nomor_surat]</td>
                  </tr>
                  <tr>
                     <td>Nama Lengkap</td>
                  <td width='1%'>:</td>
                  <td>$surat_masuk[asal_surat]</td>
                 </tr>
                 <tr> 
                     <td>Umur</td>
                  <td width='1%'>:</td>
                  <td>$surat_masuk[tanggal_terima] Tahun</td>
                 </tr>
                 <tr>
                  <td>Tanggal Lahir</td>
                     <td width='1%'>:</td>
                  <td>$surat_masuk[tanggal_surat]</td>
                 </tr>
                 <tr>
                  <td>Alamat</td>
                  <td width='1%'>:</td>
                  <td>$surat_masuk[perihal]</td>
                 </tr>
                 <tr> 
                  <td>No Telpon</td>
                  <td width='1%'>:</td>
                  <td>$surat_masuk[keterangan]</td>
                 </tr>
                <tr> 
                  <td>No Telpon</td>
                  <td width='1%'>:</td>
                  <td>$surat_masuk[ditujukan]</td>
                 </tr>
                <tr> 
                  <td>No Telpon</td>
                  <td width='1%'>:</td>
                  <td>$surat_masuk[status]</td>
                 </tr>
                                  <tr> 
                  <td>No Telpon</td>
                  <td width='1%'>:</td>
                  <td>$surat_masuk[oleh]</td>
                 </tr>

                  <tr> 
                  <td>No Telpon</td>
                  <td width='1%'>:</td>
                  <td>$surat_masuk[keterangan]</td>
                 </tr>
                  <tr> 
                  <td>No Telpon</td>
                  <td width='1%'>:</td>
                  <td><a href='view_surat.php?id_surat=$surat_masuk[file_suratmasuk];?>'>Lihat File</a></td>
                 </tr>
                </thead>
                ";}?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "../template/footer.php" ?>


</div>
<!-- ./wrapper -->
<script>
        $('#datepickerterima').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('#datepickersurat').datepicker({
            uiLibrary: 'bootstrap4'
        });
        
</script>

<script>
    $(document).ready(function(){
        setDatePicker()
        setDateRangePicker(".startdate", ".enddate")
        setMonthPicker()
        setYearPicker()
        setYearRangePicker(".startyear", ".endyear")
    })
    </script>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery.js"></script>

<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>