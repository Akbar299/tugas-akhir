<?php 
//include 'koneksi.php';

include "../include/connect.php";
include "../include/session.php"; 


$nomor_surat	 	    = $_POST["nomor_surat"];
$tanggal_surat_dibuat	= date('Y-m-d',strtotime($_POST["tanggal_surat_dibuat"]));
$tujuan_surat			= $_POST["tujuan_surat"];
$perihal	 	    	= $_POST["perihal"];
$keterangan	 	    	= $_POST["keterangan"];
$file_suratkeluar = $_FILES['file']['name'];
 
// $rand = rand();
// $ekstensi =  array('jpeg', 'jpg', 'png', 'pdf'); //filter ekstensi file yang diperbolehkan
// $filename = $_FILES['file']['name'];
// $ukuran = $_FILES['file']['size'];
// $ext = pathinfo($filename, PATHINFO_EXTENSION);
 
// if(!in_array($ext,$ekstensi) ) {
// 	header("location:surat_keluar.php?alert=gagal_ekstensi");
// }else{
// 	if($ukuran < 1044070){		
// 		$file_suratkeluar = $rand.'_'.$filename;
// 		move_uploaded_file($_FILES['file']['tmp_name'], 'file_suratkeluar/'.$rand.'_'.$filename);
// 		mysqli_query($connect, "INSERT INTO tbl_suratkeluar VALUES(NULL, $nomor_surat, '$tanggal_surat_dibuat', 
//         '$tujuan_surat', '$perihal', '$keterangan', '$file_suratkeluar')");
// 		header("location:surat_keluar.php?alert=berhasil");
// 	}else{
// 		header("location:surat_keluar.php?alert=gagak_ukuran");
// 	}
// }

//cek dulu jika ada file jalankan coding ini
if($file_suratkeluar != "") {
	$ekstensi_diperbolehkan = array('pdf'); //ekstensi file yang bisa diupload 
	$x = explode('.', $file_suratkeluar); //memisahkan nama file dengan ekstensi yang diupload
	$ekstensi = strtolower(end($x));
	$file_tmp = $_FILES['file']['tmp_name'];   
	$angka_acak     = date("d-m-Y"); //tanggal sekarang
	$nama_file_baru = $angka_acak.'-'.$file_suratkeluar; //menggabungkan angka acak dengan nama file sebenarnya
		  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
				  move_uploaded_file($file_tmp, 'file_suratkeluar/'.$nama_file_baru); //memindah file gambar ke folder file suratmasuk
					// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
					$query = "INSERT INTO tbl_suratkeluar (nomor_surat, tanggal_surat_dibuat, tujuan_surat, perihal,
					keterangan,  file_suratkeluar) VALUES ('$nomor_surat', '$tanggal_surat_dibuat', '$tujuan_surat', '$perihal',
					'$keterangan', '$nama_file_baru')";
					$result = mysqli_query($connect, $query);
					// periska query apakah ada error
					if(!$result){
						die ("Query gagal dijalankan: ".mysqli_errno($connect).
							 " - ".mysqli_error($connect));
					} else {
					  //tampil alert dan akan redirect ke halaman index.php
					  //silahkan ganti index.php sesuai halaman yang akan dituju
					  echo "<script>alert('Data berhasil ditambah.');window.location='surat_keluar.php';</script>";
					}
  
			  } else {     
			   //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
				  echo "<script>alert('Ekstensi File yang hanya diperbolehkan PDF.');window.location='form_surat_keluar.php';</script>";
			  }
  } else {
	 $query = "INSERT INTO tbl_suratkeluar (nomor_surat, tanggal_surat_dibuat, tujuan_surat, perihal,
	 keterangan,  file_suratkeluar) VALUES ('$nomor_surat', '$tanggal_surat_dibuat', '$tujuan_surat', '$perihal',
					'$keterangan', null)";
					$result = mysqli_query($connect, $query);
					// periska query apakah ada error
					if(!$result){
						die ("Query gagal dijalankan: ".mysqli_errno($connect).
							 " - ".mysqli_error($connect));
					} else {
					  //tampil alert dan akan redirect ke halaman index.php
					  //silahkan ganti index.php sesuai halaman yang akan dituju
					  echo "<script>alert('Data berhasil ditambah.');window.location='surat_keluar.php';</script>";
					}
  }