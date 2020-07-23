<?php 

include "../include/connect.php";
include "../include/session.php"; 


	// membuat variabel untuk menampung data dari form
	$id_surat = $_POST['id_surat'];
	$nomor_surat	 	    = $_POST["nomor_surat"];
	$tanggal_surat_dibuat	= date('Y-m-d',strtotime($_POST["tanggal_surat_dibuat"]));
	$tujuan_surat			= $_POST["tujuan_surat"];
	$perihal	 	    	= $_POST["perihal"];
	$keterangan	 	    	= $_POST["keterangan"];
	$file_suratkeluar 		= $_FILES['file']['name'];

	//cek dulu jika merubah file pakai ini
	if($file_suratkeluar != "") {
	  $ekstensi_diperbolehkan = array('pdf'); //ekstensi file file yang bisa diupload 
	  $x = explode('.', $file_suratkeluar); //memisahkan nama file dengan ekstensi yang diupload
	  $ekstensi = strtolower(end($x));
	  $file_tmp = $_FILES['file']['tmp_name'];   
	  $angka_acak     = date("d-m-Y"); //tanggal sekarang
	  $nama_file_baru = $angka_acak.'-'.$file_suratkeluar; //menggabungkan angka acak dengan nama file sebenarnya
	  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
					move_uploaded_file($file_tmp, 'file_suratkeluar/'.$nama_file_baru); //memindah file gambar ke folder tujuan
						
					  // jalankan query UPDATE berdasarkan ID file kita edit
					 $query  = "UPDATE tbl_suratkeluar SET nomor_surat = '$nomor_surat', tanggal_surat_dibuat = '$tanggal_surat_dibuat', tujuan_surat = '$tujuan_surat', perihal = '$perihal', keterangan = '$keterangan', file_suratkeluar = '$nama_file_baru'";
					  $query .= "WHERE id_surat = '$id_surat'";
					  $result = mysqli_query($connect, $query);

					  // periksa query apakah ada error
					  if(!$result){
						  die ("Query gagal dijalankan: ".mysqli_errno($connect).
							   " - ".mysqli_error($connect));
					  } else {

						//tampil alert dan akan redirect ke halaman yang dituju
						//silahkan ganti surat_keluar.php sesuai halaman yang akan dituju
						echo "<script>alert('Data berhasil diubah.');window.location='surat_keluar.php';</script>";
					  }
				} else {     
				 //jika file ekstensi tidak pdf maka alert ini yang tampil
					echo "<script>alert('Ekstensi File Hanya Boleh PDF');window.location='surat_keluar.php';</script>";
				}
	  } else {
		// jalankan query UPDATE berdasarkan ID  kita edit
		$query  = "UPDATE tbl_suratkeluar SET nomor_surat = '$nomor_surat', tanggal_surat_dibuat = '$tanggal_surat_dibuat', tujuan_surat = '$tujuan_surat', perihal = '$perihal', keterangan = '$keterangan', file_suratkeluar = '$nama_file_baru'";
		$query .= "WHERE id_surat = '$id_surat'";
		$result = mysqli_query($connect, $query);
		// periska query apakah ada error
		if(!$result){
			  die ("Query gagal dijalankan: ".mysqli_errno($connect).
							   " - ".mysqli_error($connect));
		} else {
		  //tampil alert dan akan redirect ke halaman index.php
		  //silahkan ganti index.php sesuai halaman yang akan dituju
			echo "<script>alert('Data berhasil diubah.');window.location='surat_keluar.php';</script>";
		}
	  }