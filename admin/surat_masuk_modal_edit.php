<?php
include "../include/connect.php";
include "../include/session.php"; 
$id_surat	= $_GET["id_surat"];

$querysuratmasuk = mysqli_query($connect, "SELECT * FROM tbl_suratmasuk WHERE id_surat='$id_surat'");
if($querysuratmasuk == false){
	die ("Terjadi Kesalahan : ". mysqli_error($connect));
}
while($suratmasuk = mysqli_fetch_array($querysuratmasuk)) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Edit Surat Masuk</title>
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
            <h1 class="m-0 text-dark">Edit Surat Masuk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Surat Masuk</li>
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
				<form action="surat_masuk_edit.php" method="post" enctype="multipart/form-data">
				<input name="id_surat" type="hidden" class="form-control" value="<?php echo $suratmasuk["id_surat"]; ?>" />
          			<div class="form-group">
          				<label>Nomor Surat:</label>
          				<input type="text" class="form-control" value="<?php echo $suratmasuk["nomor_surat"]; ?>" name="nomor_surat" required="required">
          			</div>

          			<div class="form-group">
          				<label>Asal Surat :</label>
          				<input type="text" class="form-control" value="<?php echo $suratmasuk["asal_surat"]; ?>" name="asal_surat" required="required">
          			</div>

                <div class="form-group">
          				<label>Tanggal Terima :</label>
                  <input id="datepickerterima" class="form-control" value="<?php echo $suratmasuk["tanggal_terima"]; ?>" name="tanggal_terima" required="required" />
                </div>

                <div class="form-group">
          				<label>Tanggal Surat :</label>
                  <input id="datepickersurat" class="form-control" value="<?php echo $suratmasuk["tanggal_surat"]; ?>" name="tanggal_surat" required="required" />
                </div>
                      
          			<div class="form-group">
          				<label>Perihal</label>
          				<textarea class="form-control" name="perihal" required="required"><?php echo $suratmasuk["perihal"]; ?></textarea>
                </div>
                      
                <div class="form-group">
          				<label>Keterangan</label>
          				<input type="text" class="form-control" value="<?php echo $suratmasuk["keterangan"]; ?>" name="keterangan" required="required">
                </div>

                  <div class="form-group">
                  <label>Ditujukkan : </label>
					<select class="form-control" name="ditujukan" >
						<option value="<?php echo $suratmasuk["ditujukan"]; ?>"><?php echo $suratmasuk["ditujukan"]; ?></option>
                      <option value="Kepala Dinas">Kepala Dinas</option>
                      <option value="Sekretaris">Sekretaris</option>
                      <option value="Bidang Pengelolaan dan Layanan Informasi Publik">Bidang Pengelolaan dan Layanan Informasi Publik</option>
                      <option value="Bidang Pengelolaan Komunikasi Publik">Bidang Pengelolaan Komunikasi Publik</option>
                      <option value="Bidang Teknologi Informasi dan Komunikasi">Bidang Teknologi Informasi dan Komunikasi</option>
                      <option value="Bidang Tata Kelola Pemerintahan Berbasis Elektronik">Bidang Tata Kelola Pemerintahan Berbasis Elektronik</option>
                      <option value="Bidang Persandian dan Statistik">Bidang Persandian dan Statistik</option>
                      <option value="Sub Bagian Umum dan Kepegawaian">Sub Bagian Umum dan Kepegawaian</option>
                      <option value="Sub Bagian Keuangan">Sub Bagian Keuangan</option>
                      <option value="Sub Bagian Perencanaan dan Pelaporan">Sub Bagian Perencanaan dan Pelaporan</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                  <label>Status :</label>
                    <select class="form-control" name="status">
					<option value="<?php echo $suratmasuk["status"]; ?>"><?php echo $suratmasuk["status"]; ?></option>
                      <option value="Diambil">Diambil</option>
                      <option value="Diantar">Diantar</option>
                    </select>
                  </div>

                  <div class="form-group">
                  <label>Oleh</label>
                  <input type="text" class="form-control" value="<?php echo $suratmasuk["oleh"]; ?>" name="oleh" required="required">
                </div>

                  <div class="form-group">
				  	<!-- <embed src="file_suratmasuk/<?php echo $suratmasuk["file_suratmasuk"]; ?>" type="application/pdf" width="120" height="120" /> -->
          				<label>File :</label>
						  <input type="file" name="file" ><br>
						  <label><?php echo $suratmasuk["file_suratmasuk"]; ?></label>
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
<?php }