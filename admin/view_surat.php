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
 $id_surat = $_GET['id_surat'];
 $querysedekah = mysqli_query($connect, "SELECT * FROM tbn_suratmasuk WHERE id_surat= '$id_surat'");
while ($sedekah = mysqli_fetch_array($querysedekah)){
    echo  '<div>
    <embed src="file_suratmasuk/<?php echo $sedekah[file_suratmasuk]; ?>.pdf" type="application/pdf" width="100%" height="700"/></div>';
}
?>
</body>
</html>