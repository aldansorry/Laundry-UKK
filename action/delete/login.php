<?php
include"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	if($clause == "terhapus" || $clause == "00000000000") exit('<script>alert("Cant Delete");history.back();</script>');
	if($clause == $session_nik) exit('<script>alert("Tidak Bisa Menghapus Dengan Akun Ini");history.back();</script>');
	$where = "username ='$clause'";
    $hapus = $db->hapus("login",$where);
	echo "<script language='javascript'>history.back();</script>";
}
?>