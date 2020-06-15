<?php 
//include 'koneksi.php';

include "../include/connect.php";
include "../include/session.php"; 


$nomor_surat	 	    = $_POST["nomor_surat"];
$asal_surat	 	    	= $_POST["asal_surat"];
$tanggal_terima	 	    = date('Y-m-d',strtotime($_POST["tanggal_terima"]));
$tanggal_surat 	    	= date('Y-m-d',strtotime($_POST["tanggal_surat"]));
// $tanggal_surat	 	    = $_POST["tanggal_surat"];
$perihal	 	    	= $_POST["perihal"];
$keterangan	 	    	= $_POST["keterangan"];
$ditujukan	 	    	= $_POST["ditujukan"];
$status					= $_POST["status"];
$oleh					= $_POST["oleh"];


if($_POST['upload']){
	// $tgl=date('d-m-Y');
	$ekstensi_diperbolehkan	= array('pdf');
	$nama = $_FILES['file']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];	

	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		if($ukuran < 1044070){			
			move_uploaded_file($file_tmp, 'file_suratmasuk/'.$nama);
			$query = mysqli_query($connect, "INSERT INTO tbl_suratmasuk VALUES(NULL, '$nomor_surat',
			'$asal_surat', '$tanggal_terima', '$tanggal_surat', '$perihal', '$keterangan',
			'$ditujukan', '$status', '$oleh', '$nama')");
			if($query){
				echo "<script>
				alert('Berhasil Upload File');
				window.location.href='surat_masuk.php';
				</script>";
			}else{
				echo "<script>
				alert('Gagal Mengupload File File');
				window.location.href='surat_masuk.php';
				</script>";
			}
		}else{
			echo "<script>
			alert('Ukuran Terlalu Besar');
			window.location.href='surat_masuk.php';
			</script>";
		}
	}else{
		echo "<script>
			alert('Ekstensi tidak diperbolehkan');
			window.location.href='surat_masuk.php';
			</script>";
	}
}
?>