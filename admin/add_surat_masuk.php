<?php 
//include 'koneksi.php';

include "../include/connect.php";
include "../include/session.php"; 


$nomor_surat	 	    = $_POST["nomor_surat"];
$asal_surat	 	    	= $_POST["asal_surat"];
$tanggal_terima	 	    = date('Y-m-d',strtotime($_POST["tanggal_terima"]));
$tanggal_surat 	    	= date('Y-m-d',strtotime($_POST["tanggal_surat"]));
$perihal	 	    	= $_POST["perihal"];
$keterangan	 	    	= $_POST["keterangan"];
$ditujukan	 	    	= $_POST["ditujukan"];
$status					= $_POST["status"];
$oleh					= $_POST["oleh"];
$file_suratmasuk = $_FILES['file']['name'];


//cek dulu jika ada file jalankan coding ini
if($file_suratmasuk != "") {
  $ekstensi_diperbolehkan = array('pdf'); //ekstensi file yang bisa diupload 
  $x = explode('.', $file_suratmasuk); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['file']['tmp_name'];   
  $angka_acak     = date("d-m-Y"); //tanggal sekarang
  $nama_file_baru = $angka_acak.'-'.$file_suratmasuk; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'file_suratmasuk/'.$nama_file_baru); //memindah file gambar ke folder file suratmasuk
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO tbl_suratmasuk (nomor_surat, asal_surat, tanggal_terima, tanggal_surat, perihal, keterangan,
				  ditujukan, status, oleh,  file_suratmasuk) VALUES ('$nomor_surat', '$asal_surat', '$tanggal_terima', '$tanggal_surat', '$perihal', 
				  '$keterangan', '$ditujukan', '$status', '$oleh', '$nama_file_baru')";
                  $result = mysqli_query($connect, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($connect).
                           " - ".mysqli_error($connect));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='surat_masuk.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi File yang hanya diperbolehkan PDF.');window.location='form_surat_masuk.php';</script>";
            }
} else {
   $query = "INSERT INTO tbl_suratmasuk (nomor_surat, asal_surat, tanggal_terima, tanggal_surat, perihal, keterangan,
   ditujukan, status, oleh,  file_suratmasuk) VALUES ('$nomor_surat', '$asal_surat', '$tanggal_terima', '$tanggal_surat', '$perihal', 
				  '$keterangan', '$ditujukan', '$status', '$oleh', null)";
                  $result = mysqli_query($connect, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($connect).
                           " - ".mysqli_error($connect));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='surat_masuk.php';</script>";
                  }
}
?>