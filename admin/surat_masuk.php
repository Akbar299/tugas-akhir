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
      <a href="form_surat_masuk.php" class="btn btn-primary mb-2">Tambah Surat</a>
      <form>
        <div class="form-row align-items-center">
          <div class="col-auto">
            <input type="date" name="tanggal" class="form-control mb-2">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-info mb-2">Filter Data</button>
          </div>
          <div class="col-auto">
            <input type="text" name="cari" class="form-control mb-2" id="inlineFormInput" placeholder="Cari">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-warning mb-2" >Cari Data</button>
          </div>
        </div>
      </form>
      <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xl-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <br>
                  <table class="table table-bordered table-striped table-scalable">
                    <?php
                      include "list_surat_masuk.php";
                    ?>
                  </table>
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

        <!-- Modal Popup infaq Edit -->
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