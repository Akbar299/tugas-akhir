<?php 
// mengaktifkan session pada php
session_start();
if(isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}

 
// menghubungkan php dengan koneksi database
include '../include/connect.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connect,"select * from tbl_user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['role']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/home.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['role']=="pegawai"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "pegawai";
		// alihkan ke halaman dashboard pegawai
		header("location:pegawai/home.php");
 
	// cek jika user login sebagai pengurus
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>