<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<title>Halaman Kepala Bagian</title>
</head>
<body>
	<div>
		<?php
		session_start();

		// cek apakah sudah login
		if ($_SESSION['level']=="") {
			header("location:index.php?pesan=gagal");
		}
		?>
	<div class="bg-primary text-white text-center">
		<h1>Halaman Kepala Bagian</h1>

		<p>Halo <b><?php echo $_SESSION['username'];?></b> Anda telah login sebagai <b><?php echo $_SESSION['level'];?></b></p>
		<a href="logout.php">LOGOUT</a>
	</div>
	</div>

	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/js/bootstrap.js"></script>
</body>
</html>