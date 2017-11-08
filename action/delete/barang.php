<?php
include"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$status = $db->tampilSatu("barang","status","kodebarang='$clause'");
	if($status['status'] == "danger"){
		$db->editData("barang","status=''","kodebarang='$clause'");
	}else{
	$db->editData("barang","status='danger'","kodebarang='$clause'");
	}
	echo "<script language='javascript'>history.back();</script>";
}
?>