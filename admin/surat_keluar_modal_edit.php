<?php
include "../include/connect.php";
include "../include/session.php"; 
$id_surat	= $_GET["id_surat"];

$querysuratkeluar = mysqli_query($connect, "SELECT * FROM tbl_suratkeluar WHERE id_surat='$id_surat'");
if($querysuratkeluar == false){
	die ("Terjadi Kesalahan : ". mysqli_error($connect));
}
while($suratkeluar = mysqli_fetch_array($querysuratkeluar)) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Edit Surat keluar</title>
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
      header("location:surat_keluar.php?pesan=gagal");
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
            <h1 class="m-0 text-dark">Edit Surat Keluar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Surat Keluar</li>
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
				        <form action="surat_keluar_edit.php" method="post" enctype="multipart/form-data">
				        <input name="id_surat" type="hidden" class="form-control" value="<?php echo $suratkeluar["id_surat"]; ?>" />
          			<div class="form-group">
          				<label>Nomor Surat:</label>
          				<input type="text" class="form-control" value="<?php echo $suratkeluar["nomor_surat"]; ?>" name="nomor_surat" required="required">
          			</div>

                <div class="form-group">
          				<label>Tanggal Surat Dibuat :</label>
                  <input id="datepickerdibuat" class="form-control" value="<?php echo $suratkeluar["tanggal_surat_dibuat"]; ?>" name="tanggal_surat_dibuat" required="required" />
                </div>

                <div class="form-group">
                    <label>Tujuan Surat :</label>
                    <input type="text" class="form-control" value="<?php echo $suratkeluar["tujuan_surat"]; ?>"name="tujuan_surat" required="required">
                </div>
   
          			<div class="form-group">
          				<label>Perihal</label>
          				<textarea class="form-control" name="perihal" required="required"><?php echo $suratkeluar["perihal"]; ?></textarea>
                </div>
                      
                <div class="form-group">
          				<label>Keterangan</label>
          				<input type="text" class="form-control" value="<?php echo $suratkeluar["keterangan"]; ?>" name="keterangan" required="required">
                </div>
                  
                <div class="form-group">
          			<label>File :</label>
						    <input type="file" name="file" ><br>
						    <label><?php echo $suratkeluar["file_suratkeluar"]; ?></label>
          			<p style="color: red">Ekstensi yang diperbolehkan .pdf</p>
          			</div>			
          			<button type="submit" name="upload" value="Upload" class="btn btn-primary">Simpan</button>
                  </form>
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
        $('#datepickerdibuat').datepicker({
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
<?php }