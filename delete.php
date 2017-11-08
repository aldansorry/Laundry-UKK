<?php
include"koneksi.php";
$table = $_GET['table'];
$clause = $_GET['clause'];
if($table == "login"){
    $where = "username ='$clause'";
    $hapus = $db->hapus("login",$where);
}
if($hapus){
	echo "<script language='javascript'>history.back();</script>";
}
?>