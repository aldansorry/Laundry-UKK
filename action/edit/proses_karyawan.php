<?php
require_once"../include.php";
$clause 		= $_GET['clause'];
$nmkaryawan 	= validasi($_POST['nmkaryawan']);
$almtkaryawan 	= validasi($_POST['almtkaryawan']);
$telpkaryawan 	= validasi($_POST['telpkaryawan']);
$genderkaryawan  	= validasi($_POST['genderkaryawan']);
$data = "nmkaryawan='$nmkaryawan',almtkaryawan='$almtkaryawan',telpkaryawan='$telpkaryawan',genderkaryawan='$genderkaryawan'";
$where = "nik='$clause'";
$edit = $db->editData("karyawan",$data,$where);
header("location:../../table_karyawan")
?>