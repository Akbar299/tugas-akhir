<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
@session_start();
if(empty($_SESSION['role'])){
         echo '<script language="javascript">
                     window.alert("ERROR! Anda Harus Login Terlebih Dahulu");
                     window.location.href="../login.php";
                   </script>';
         die();
     } else {

        //  if($_SESSION['level'] != "admin" ){
        //      echo '<script language="javascript">
        //              window.alert("ERROR! Anda tidak memiliki hak akses untuk menambahkan data");
        //              window.history.back();
        //            </script>';
        //  }
        //  elseif($_SESSION['level'] == "dokter") {
        //     echo '<script language="javascript">
        //     window.alert("ERROR! Anda tidak memiliki hak akses untuk menambahkan data");
        //     window.history.back();
        //   </script>';
        //  }
        //  elseif($_SESSION['level'] != "operator") {
        //     echo '<script language="javascript">
        //     window.alert("ERROR! Anda tidak memiliki hak akses untuk menambahkan data");
        //     window.history.back();
        //   </script>';
        //  }
     } 
?>