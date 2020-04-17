<?php
$host = "localhost";
$user = "bellabeen";
$pass = "kepoajalu";
$name = "tugasakhir";

$connect = mysqli_connect($host, $user, $pass) or die("Koneksi ke database Gagal!");
mysqli_select_db($connect, $name) or die("Tidak ada database yang dipilih");
?>