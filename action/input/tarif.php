<?php
require_once"../include.php";
if (isset($_POST['submit'])) {
    if (empty($_POST['idjenispakaian']) && empty($_POST['namapakaian']) && empty($_POST['tarif'])) {
        echo "<script language='javascript'>alert('Ada yang belum diisi');history.back();</script>";
		}else if(is_numeric($_POST['tarif']) == false && strlen($_POST['tarif']) > 11){
			echo "<script language='javascript'>alert('Tarif Harus Angka Maksimal 11');history.back();</script>";
		}else {
		if (strlen($tarif) > 11) exit('<script>alert("Maksimal 11");history.back();</script>');
        $jenislaundry = $_POST['jenislaundry'];
        $jenispakaian = $_POST['jenispakaian'];
        $idjenispakaian = $jenislaundry.$jenispakaian;
        $nmpakaian = $_POST['nmpakaian'];
        $tarif = $_POST['tarif'];
		if ($db->hitungData('tarif', '*', "idjenispakaian='$idjenispakaian'") > 0) exit('<script>alert("Id Jenis Pakian Sudah Terdaftar");history.back();</script>');
        $simpan = $db->tambahData('tarif',"idjenispakaian,nmpakaian,tarif,jenislaundry_idjenislandry","'$idjenispakaian','$nmpakaian','$tarif','$jenislaundry'");
        if($simpan){
            echo "<script language='javascript'>alert('Anda Berhasil');</script>";
			header('location:../../table_tarif');
        }
    }
}
?>