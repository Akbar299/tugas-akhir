<?php
include "../include/connect.php";
include "../include/session.php"; 
?>
<!DOCTYPE html>
<html>
<head>
 <title>Aplikasi Untuk Mengupload File PDF Dengan PHP | belajarwebpedia.com</title>
 <style type="text/css">

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="pull-left">DOKUMEN PDF</div>
                            <br>
                        </div>
                        <div class="panel-body">
                           <?php 
                           $data=mysqli_fetch_row(mysqli_query($connect,"select * from tbl_suratmasuk where id_surat='".$_GET['id_surat']."'")); 
                           ?>
                            <div style='border-bottom:1px solid #000'><?php echo $data[nomor_surat]; ?></div>
                            <div><?php echo $data[2]; ?></div><br>
                            <div>
                                <embed src="file_suratmasuk/<?php echo $data[file_suratmasuk]; ?>.pdf" type="application/pdf" width="100%" height="700"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>