<?php
include"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$status = $db->tampilSatu("jenislaundry","status","idjenislaundry='$clause'");
	if($status['status'] == "danger"){
		$db->editData("jenislaundry","status=''","idjenislaundry='$clause'");
	}else{
	$db->editData("jenislaundry","status='danger'","idjenislaundry='$clause'");
	echo "<script language='javascript'>history.back();</script>";
}}
?>