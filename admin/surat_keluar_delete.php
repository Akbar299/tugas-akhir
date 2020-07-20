<?php

include "../include/connect.php";
include "../include/session.php"; 

$id_surat = $_GET['id_surat'];

// mysqli_query($connect, "DELETE FROM zakat_fitrah WHERE id_infaq='$id_infaq'");

// header("Location: infaq.php");
if($delete = mysqli_query ($connect, "DELETE FROM tbl_suratkeluar WHERE id_surat='$id_surat'")){
	header("Location: surat_keluar.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($connect));

?>