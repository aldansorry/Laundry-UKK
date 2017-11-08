<?php
include_once"../include.php";
if (isset($_POST['submit'])) {
    if (empty($_POST['nmkonsumen'])) {
        echo "<script language='javascript'>alert('Ada yang belum diisi')</script>";
    } else {
        $kodekonsumen = kodekonsumen();
        $nmkonsumen = $_POST['nmkonsumen'];
        $almtkonsumen = $_POST['almtkonsumen'];
        $telpkonsumen = $_POST['telpkonsumen'];
        $db->tambahData('konsumen',"kodekonsumen,nmkonsumen,almkonsumen,telpkonsumen","'$kodekonsumen','$nmkonsumen','$almtkonsumen','$telpkonsumen'");
    }
	echo "<script language='javascript'>alert('Berhasil Diubah');history.back();</script>";	
}
?>