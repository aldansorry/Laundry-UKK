<?php
include"../include.php";
if (isset($_POST['submit'])) {
    if (empty($_POST['idjenislaundry'])) {
        echo "<script language='javascript'>alert('Ada yang belum diisi')</script>";
    } else {
        $idjenislaundry = $_POST['idjenislaundry'];
        $nmjenislaundry = $_POST['nmjenislaundry'];
        $db->tambahData('jenislaundry',"idjenislaundry,nmjenislaundry","'$idjenislaundry','$nmjenislaundry'");
    }
	echo "<script language='javascript'>alert('Anda Berhasil');location=history.back();</script>";
}
?>
