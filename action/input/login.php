<?php
require_once"../include.php";
$clause = $_GET['clause'];
	if(isset($_POST['submit'])) {
		if (empty($_POST['username']) && empty($_POST['password'])) {
			echo "<script>alert('Username dan Password Belum Diisi');history.back();</script>";
		}else if (empty($_POST['username'])) {
			echo "<script>alert('Username Belum Disi');history.back();</script>";
		}else if(empty($_POST['password'])) {
        echo "<script>alert('Password Belum Disi');history.back();</script>";
		}else{
        $username = $_POST['username'];
        if ($db->hitungData('login', '*', "username='$username'") > 0) exit('<script>alert("Username telah terdaftar");history.back();</script>');
        $password = $_POST['password'];
        $typeuser = $_POST['typeuser'];
        $kolom = "username,password,typeuser,karyawan_nik";
        $values = "'$username','$password','$typeuser','$clause'";
        $db->tambahData('login', $kolom, $values);
        echo "<meta http-equiv='refresh' content='0;'>";
		header("location:../../table_login-$clause");
		}
	}
	?>