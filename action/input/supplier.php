<?php
include_once"../include.php";
if (isset($_POST['submit'])) {
    if (empty($_POST['nmsupplier'])) {
        echo "<script language='javascript'>alert('Ada yang belum diisi')</script>";
    } else {
        $idsupplier = idsupplier();
        $nmsupplier = $_POST['nmsupplier'];
        $almtsupplier = $_POST['almtsupplier'];
        $telpsupplier = $_POST['telpsupplier'];
        $db->tambahData('supplier',"idsupplier,nmsupplier,almtsupplier,telpsupplier","'$idsupplier','$nmsupplier','$almtsupplier','$telpsupplier'");
    }
	echo "<script language='javascript'>alert('Berhasil');history.back();</script>";	
}
?>