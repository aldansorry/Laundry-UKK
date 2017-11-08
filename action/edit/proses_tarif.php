<?php
require_once"../include.php";
$clause 		= $_GET['clause'];
$tarif	= validasi($_POST['tarif']);
if (strlen($tarif) > 11) exit('<script>alert("Maksimal 11");history.back();</script>');
if (is_numeric($_POST['tarif']) == false) exit('<script>alert("Harus Angka");history.back();</script>');
$edit = $db->editData("tarif","tarif='$tarif'","idjenispakaian='$clause'");
echo "<script language='javascript'>history.back();</script>";		

?>