<?php
include "../include/connect.php";
include "../include/session.php"; 
?>
<!DOCTYPE html>
<html>
<head>
 <title>File Surat Masuk</title>

 <body>

 <?php
    $data = mysqli_fetch_row(mysqli_query($connect, "SELECT * FROM tbl_suratmasuk WHERE id_surat='".$_GET['id_surat']."'"))
?>
<div>
    <embed src="../admin/file_suratmasuk/<?php echo $data[10]; ?>" type="application/pdf" width="100%" height="1000" />
</div>
</body>
</html>