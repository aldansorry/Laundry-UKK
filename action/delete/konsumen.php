<?php
include"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$status = $db->tampilSatu("konsumen","status","kodekonsumen='$clause'");
	if($status['status'] == "danger"){
		$db->editData("konsumen","status=''","kodekonsumen='$clause'");
	}else{
	$db->editData("konsumen","status='danger'","kodekonsumen='$clause'");
	}
	echo "<script language='javascript'>history.back();</script>";
}
?>