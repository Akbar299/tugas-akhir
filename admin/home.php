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

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../overlayScrollbars/css/OverlayScrollbars.min.css">
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
<?php include "../template/footer.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                      <?php
                        $querysuratmasuk = mysqli_query($connect,"SELECT count(id_surat) AS jumlah FROM tbl_suratmasuk");
                        $datasuratmasuk = mysqli_fetch_array($querysuratmasuk);
                      ?>
                      <?php
                        $angka = $datasuratmasuk['jumlah'];
                        echo "<h3>$angka</h3>";
                      ?>
                      <p>Surat Masuk</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="surat_masuk.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                      <?php
                        $querysuratkeluar = mysqli_query($connect,"SELECT count(id_surat) AS jumlah FROM tbl_suratkeluar");
                        $datasuratkeluar = mysqli_fetch_array($querysuratkeluar);
                      ?>
                      <?php
                        $angka = $datasuratkeluar['jumlah'];
                        echo "<h3>$angka</h3>";
                      ?>
                        <p>Surat Keluar</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="surat_keluar.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>44</h3>

                        <p>User Registrations</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
                        </div><!-- /.box-body -->
                      </div><!-- /.box -->
                      <!-- Modal Popup untuk delete--> 
                    </div>
                  </div>
                  </section><!-- /.content -->
                </div>
                <div class="modal fade" id="modal_delete">
                        <div class="modal-dialog">
                          <div class="modal-content" style="margin-top:100px;">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                            </div>    
                            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                              <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
                              <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            </div>
                          </div>
                        </div>
        </div>

        <!-- Modal Popup Edit -->
        <div id="ModalEditSuratMasuk" class="modal fade" tabindex="-1" role="dialog"></div>
    
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Javascript Delete -->
  <script>
    function confirm_delete(delete_url){
      $("#modal_delete").modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }
  </script>

  <!-- Javascript Edit--> 
  <script type="text/javascript">
    $(document).ready(function () {
    
    // Users
    $(".open_modal").click(function(e) {
      var m = $(this).attr("id_surat");
        $.ajax({
          url: "surat_masuk_modal_edit.php",
          type: "GET",
          data : {id_surat: m,},
          success: function (ajaxData){
          $("#ModalEditSuratMasuk").html(ajaxData);
          $("#ModalEditSuratMasuk").modal('show',{backdrop: 'true'});
          }
        });
      });
    });
  </script>


</div>
<!-- ./wrapper -->
  <!-- JS -->
  <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../assets/js/jquery.js"></script>
<!-- Bootstrap -->
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<!-- <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.js"></script>
<script src="../assets/js/custom.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../assets/js/demo.js"></script>


</body>
</html>