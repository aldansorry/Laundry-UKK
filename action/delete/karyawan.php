<?php
include"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	if($clause == "terhapus" || $clause == "00000000000") exit('<script>alert("Error Dude");history.back();</script>');
	$status = $db->tampilSatu("karyawan","status","nik='$clause'");
	if($status['status'] == "danger"){
		$db->editData("karyawan","status=''","nik='$clause'");
	}else{
	$db->editData("karyawan","status='danger'","nik='$clause'");
	}
		echo "<script language='javascript'>history.back();</script>";

}
?>