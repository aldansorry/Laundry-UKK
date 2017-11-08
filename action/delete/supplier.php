<?php
include"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$status = $db->tampilSatu("supplier","status","idsupplier='$clause'");
	if($status['status'] == "danger"){
		$db->editData("supplier","status=''","idsupplier='$clause'");
	}else{
	$db->editData("supplier","status='danger'","idsupplier='$clause'");
	}
	echo "<script language='javascript'>history.back();</script>";
}
?>