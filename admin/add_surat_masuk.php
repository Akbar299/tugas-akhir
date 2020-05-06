<?php 
//include 'koneksi.php';

include "../include/connect.php";
include "../include/session.php"; 


$nomor_surat	 	    = $_POST["nomor_surat"];
$asal_surat	 	    	= $_POST["asal_surat"];
$tanggal_terima	 	    = date('Y-m-d',strtotime($_POST["tanggal_terima"]));
$tanggal_surat 	    = date('Y-m-d',strtotime($_POST["tanggal_surat"]));
// $tanggal_surat	 	    = $_POST["tanggal_surat"];
$perihal	 	    	= $_POST["perihal"];
$keterangan	 	    	= $_POST["keterangan"];
$ditujukkan	 	    	= $_POST["ditujukan"];
 
$rand = rand();
$ekstensi =  array('jpeg', 'jpg', 'png', 'pdf'); //filter ekstensi file yang diperbolehkan
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:surat_masuk.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$file_suratmasuk = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'file_suratmasuk/'.$rand.'_'.$filename);
		mysqli_query($connect, "INSERT INTO tbl_suratmasuk VALUES(NULL, $nomor_surat, '$asal_surat', '$tanggal_terima', 
        '$tanggal_surat', '$perihal','$keterangan', '$ditujukkan', '$file_suratmasuk')");
		header("location:surat_masuk.php?alert=berhasil");
	}else{
		header("location:surat_masuk.php?alert=gagak_ukuran");
	}
}