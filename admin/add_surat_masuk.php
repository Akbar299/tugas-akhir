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
$ditujukkan	 	    	= $_POST["ditujukan"];
$status					= $_POST["status"];
$oleh					= $_POST["oleh"];
 
$rand = rand();
$ekstensi =  array('png','jpeg','pdf'); //filter ekstensi file yang diperbolehkan
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:surat_masuk.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$file_suratmasuk = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'file_suratmasuk/'.$rand.'_'.$filename);
		mysqli_query($connect, "INSERT INTO tbl_suratmasuk VALUES(NULL, $nomor_surat, '$asal_surat', 
			'$tanggal_terima', '$tanggal_surat', '$perihal','$keterangan', '$ditujukkan', '$status', 
			'$oleh', '$file_suratmasuk')");
		header("location:surat_masuk.php?alert=berhasil");
	}else{
		header("location:surat_masuk.php?alert=gagal_ukuran");
	}
}

// //pengecekan tipe harus pdf
// $tipe_file = $_FILES['nama_file']['type']; //mendapatkan mime type
// if ($tipe_file == "application/pdf") //mengecek apakah file tersebu pdf atau bukan
// {
//  $judul     = trim($_POST['judul']);

//  $nomor_surat	 	    = trim($_POST['nomor_surat']);
// $asal_surat	 	    	= trim($_POST['asal_surat']);
// $tanggal_terima	 	    = trim(date('Y-m-d',strtotime($_POST["tanggal_terima"])));
// $tanggal_surat 	    	= trim(date('Y-m-d',strtotime($_POST["tanggal_surat"])));
// $perihal	 	    	= trim($_POST['perihal']);
// $keterangan	 	    	= trim($_POST['keterangan']);
// $ditujukkan	 	    	= trim($_POST['ditujukan']);
// $status					= trim($_POST['status']);
// $oleh					= trim($_POST['oleh']);
//  $nama_file = trim($_FILES['nama_file']['name']);

//  $sql = "INSERT INTO tbl_suratmasuk (nomor_surat, asal_surat, tanggal_terima, tanggal_surat,
// perihal, keterangan, ditujukkan, status, oleh) VALUES ('$nomor_surat, $asal_surat, $tanggal_terima,
// $tanggal_surat, $perihal, $keterangan, $ditujukkan, $status, $oleh')";
//  mysqli_query($connect,$sql); //simpan data judul dahulu untuk mendapatkan id

//  //dapatkan id terkahir
//  $query = mysqli_query($koneksi,"SELECT id_surat FROM tbl_suratmasuk ORDER BY id_surat DESC LIMIT 1");
//  $data  = mysqli_fetch_array($query);

//  //mengganti nama pdf
//  $nama_baru = "file_".$data['id'].".pdf"; //hasil contoh: file_1.pdf
//  $file_temp = $_FILES['nama_file']['tmp_name']; //data temp yang di upload
//  $folder    = "file_suratmasuk"; //folder tujuan

//  move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
//  //update nama file di database
//  mysqli_query($koneksi,"UPDATE tbl_suratmasuk SET nama_file='$nama_baru' WHERE id_surat='$data[id_surat]' ");

//  header('location:surat_masuk.php?pesan=upload-berhasil');

// } else
// {
//  echo "Gagal Upload File Bukan PDF! <a href='surat_masuk.php'> Kembali </a>";
// }