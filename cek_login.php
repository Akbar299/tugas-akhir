<?php
//mengakifkan session
session_start();

//menghubungkan php dengan koneksi
include 'koneksi.php';

// mengkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data user
$login = mysqli_query($koneksi,"select * from tbl_user where username='$username' and password='$password'");
// menghitung jumlah data
$cek = mysqli_num_rows($login);

// cek username dan password apakah ada
if($cek > 0){
	$data = mysqli_fetch_assoc($login);

	// cek jika admin
	if ($data['role']=="admin"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/home.php");

	// cek login kepala bagian 
	}else if ($data['role']=="pegawai") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "pegawai";
		//alihkan ke halaman dashboard kepala bagian
		header("location:halaman_kepalabagian.php");

	}else{
		// alihkan ke halaman login
		header("location:index.php?pesan=gagal");
	}
}else{
	header("location:index.php?pesan=gagal");
}
?>