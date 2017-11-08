<?php
include"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$status = $db->tampilSatu("tarif","status","idjenispakaian='$clause'");
	if($status['status'] == "danger"){
		$db->editData("tarif","status=''","idjenispakaian='$clause'");
	}else{
	$db->editData("tarif","status='danger'","idjenispakaian='$clause'");
	}
	echo "<script language='javascript'>history.back();</script>";
}
?>