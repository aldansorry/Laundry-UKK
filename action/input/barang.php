<?php
include"../include.php";
if (isset($_POST['submit'])) {
    if (empty($_POST['kodebarang'])) {
        echo "<script language='javascript'>alert('Ada yang belum diisi')</script>";
    } else {
        $kodebarang = $_POST['kodebarang'];
        $nmbarang = $_POST['nmbarang'];
        $harga = $_POST['harga'];
		if (strlen($nmbarang) > 45) exit('<script>alert("Nama Maksimal 45");history.back();</script>');
		if (strlen($harga) > 20) exit('<script>alert("Harga Maksimal 20");history.back();</script>');
		if (is_numeric($harga) == false) exit('<script>alert("Harus Angka");history.back();</script>');
        if($db->tambahData('barang',"kodebarang,nmbarang,harga","'$kodebarang','$nmbarang','$harga'")){
			header('location:../../table_barang');
		}
    }
}
?>
