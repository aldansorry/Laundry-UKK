<?php
require_once"../include.php";
$clause 		= $_GET['clause'];
$password 	= validasi($_POST['password']);
$typeuser	= validasi($_POST['typeuser']);
$data = "password='$password',typeuser='$typeuser'";
$where = "username='$clause'";
$edit = $db->editData("login",$data,$where);
echo "<script language='javascript'>alert('Berhasil Diubah');history.back();</script>";
?>