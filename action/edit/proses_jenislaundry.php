<?php
require_once"../include.php";
$clause 		= $_GET['clause'];
$nmjenislaundry	= validasi($_POST['nmjenislaundry']);
if (strlen($nmjenislaundry) > 20) exit('<script>alert("Maksimal 11");history.back();</script>');
$edit = $db->editData("jenislaundry","nmjenislaundry='$nmjenislaundry'","idjenislaundry='$clause'");
echo "<script language='javascript'>alert('Berhasil Diubah');history.back();</script>";		

?>