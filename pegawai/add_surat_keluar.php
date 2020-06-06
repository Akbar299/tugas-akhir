<?php 
//include 'koneksi.php';

include "../include/connect.php";
include "../include/session.php"; 


$nomor_surat	 	    = $_POST["nomor_surat"];
$tanggal_surat_dibuat	= date('Y-m-d',strtotime($_POST["tanggal_surat_dibuat"]));
$tujuan_surat			= $_POST["tujuan_surat"];
$perihal	 	    	= $_POST["perihal"];
$keterangan	 	    	= $_POST["keterangan"];
$ditujukkan	 	    	= $_POST["ditujukan"];
 
$rand = rand();
$ekstensi =  array('jpeg', 'jpg', 'png', 'pdf'); //filter ekstensi file yang diperbolehkan
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:surat_keluar.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$file_suratkeluar = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'file_suratkeluar/'.$rand.'_'.$filename);
		mysqli_query($connect, "INSERT INTO tbl_suratkeluar VALUES(NULL, $nomor_surat, '$tanggal_surat_dibuat', 
        '$tujuan_surat', '$perihal', '$keterangan', '$file_suratkeluar')");
		header("location:surat_keluar.php?alert=berhasil");
	}else{
		header("location:surat_keluar.php?alert=gagak_ukuran");
	}
}