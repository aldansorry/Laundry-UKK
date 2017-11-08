<?php
require_once"../include.php";
$clause 		= $_GET['clause'];
$nmkonsumen 	= validasi($_POST['nmkonsumen']);
$almtkonsumen	= validasi($_POST['almtkonsumen']);
$telpkonsumen	= validasi($_POST['telpkonsumen']);
$edit = $db->editData("konsumen","nmkonsumen='$nmkonsumen',almkonsumen='$almtkonsumen',telpkonsumen='$telpkonsumen'","kodekonsumen='$clause'");
echo "<script language='javascript'>alert('Berhasil Diubah');history.back();</script>";		

?>