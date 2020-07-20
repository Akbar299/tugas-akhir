<?php
include "../include/connect.php";
include "../include/session.php"; 
?>
<!DOCTYPE html>
<html>
<head>
 <title>Aplikasi Untuk Mengupload File PDF Dengan PHP | belajarwebpedia.com</title>

 <body>

 <?php
    $data = mysqli_fetch_row(mysqli_query($connect, "SELECT * FROM tbl_suratkeluar WHERE id_surat='".$_GET['id_surat']."'"))
?>
<div>

    <embed src="file_suratkeluar/1572687137_Transkrip Sementara_2.pdf" type="application/pdf" width="100%" height="1000" />
</div>
</body>
</html>