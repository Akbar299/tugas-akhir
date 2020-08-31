<?php 
// // mengaktifkan session pada php
// session_start();
// if(isset($_SESSION["login"])){
// 	header("Location: index.php");
// 	exit;
// }

 
// menghubungkan php dengan koneksi database
include '../include/connect.php';
 
// menangkap data yang dikirim dari form login
$username = @$_POST['username'];
$password= @$_POST['password'];

$login= @$_POST['login'];
      
      // ANTI SQL INJECTION
      $username = stripslashes("$username");
      $password = stripslashes("$password");
      $username = mysqli_real_escape_string($connect, $username);
	  $password = mysqli_real_escape_string($connect, $password);

	  if($login){
		if($username == "" || $password == ""){
?> <script type="text/javascript">alert("Username / password tidak boleh kosong");</script> 

<?php
		} else {
			$sql= mysqli_query($connect, "select * from tbl_user where username = '$username' and password = '$password'");
			$data = mysqli_fetch_array($sql);
			$cek = mysqli_num_rows($sql);
				if($cek >= 1){
					session_start();

					$_SESSION['username'] 	= $data['username'];
					$_SESSION['password'] 	= $data['password'];
					$_SESSION['role']    	= $data['role'];

					 if ($data['rolel'] == "admin")
					{  echo'<script type="text/javascript">
					window.location.href="admin/home.php";
					</script>';
					}
					else if ($data['role'] == "pegawai")
					{ echo'<script type="text/javascript">
					window.location.href="pegawai/home.php";
					</script>';
					}
				
				}else {
					?>
						<script type="text/javascript">
						alert("Maaf login gagal");
						</script>
						<?php
					}
				}
			}


 
 
// // menyeleksi data user dengan username dan password yang sesuai
// $login = mysqli_query($connect,"select * from tbl_user where username='$username' and password='$password'");
// // menghitung jumlah data yang ditemukan
// $cek = mysqli_num_rows($login);
 
// // cek apakah username dan password di temukan pada database
// if($cek > 0){
 
// 	$data = mysqli_fetch_assoc($login);
 
// 	// cek jika user login sebagai admin
// 	if($data['role']=="admin"){
 
// 		// buat session login dan username
// 		$_SESSION['username'] = $username;
// 		$_SESSION['nama']= "nama";
// 		$_SESSION['role'] = "admin";
// 		// alihkan ke halaman dashboard admin
// 		header("location:admin/home.php");
 
// 	// cek jika user login sebagai pegawai
// 	}else if($data['role']=="pegawai"){
// 		// buat session login dan username
// 		$_SESSION['username'] = $username;
// 		$_SESSION['role'] = "pegawai";
// 		// alihkan ke halaman dashboard pegawai
// 		header("location:pegawai/home.php");
 
// 	// cek jika user login sebagai pengurus
// 	}else{
 
// 		// alihkan ke halaman login kembali
// 		header("location:index.php?pesan=gagal");
// 	}	
// }else{
// 	header("location:index.php?pesan=gagal");
// }
 
?>