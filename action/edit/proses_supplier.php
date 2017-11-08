<?php
require_once"../include.php";
$clause 		= $_GET['clause'];
$nmsupplier 	= validasi($_POST['nmsupplier']);
$almtsupplier	= validasi($_POST['almtsupplier']);
$telpsupplier	= validasi($_POST['telpsupplier']);
$edit = $db->editData("supplier","nmsupplier='$nmsupplier',almsupplier='$almtsupplier',telpsupplier='$telpsupplier'","idsupplier='$clause'");
echo "<script language='javascript'>alert('Berhasil Diubah');history.back();</script>";		

?>