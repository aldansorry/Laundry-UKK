<?php
include_once"koneksi.php";
session_start();
$user_check= $_SESSION['login_user'];
$session_sql = $db->tampilSatuJoin("karyawan","login","nik","karyawan_nik","username='$user_check'");
$session_username 	=$session_sql['username'];
$session_typeuser 	=$session_sql['typeuser'];
$session_nik 		=$session_sql['karyawan_nik'];
$session_nmkaryawan =$session_sql['nmkaryawan'];
if(!isset($session_username)){
	header('Location:login');
}
?>