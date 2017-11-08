<?php
require_once"../include.php";
$clause 		= $_GET['clause'];
$nmbarang 	= validasi($_POST['nmbarang']);
$harga	= validasi($_POST['harga']);
if (strlen($harga) > 20) exit('<script>alert("Maksimal 20");history.back();</script>');
if (is_numeric($harga) == false) exit('<script>alert("Harus Angka");history.back();</script>');
$edit = $db->editData("barang","nmbarang='$nmbarang',harga='$harga'","kodebarang='$clause'");
echo "<script language='javascript'>alert('Berhasil Diubah');history.back();</script>";		

?>