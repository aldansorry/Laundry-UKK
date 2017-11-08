<?php
require_once"../include.php";
if (isset($_POST['submit'])) {
        if (empty($_POST['nm'])) {
            echo "<script language='javascript'>alert('Ada yang belum diisi');history.back();</script>";
        } else {
            $nik = nikgenerate();
            $nm = validasi($_POST['nm']);
            $almt = validasi($_POST['almt']);
            $telp = validasi($_POST['telp']);
            $gender = validasi($_POST['gender']);
            $kolom = "nik,nmkaryawan,almtkaryawan,telpkaryawan,genderkaryawan";
            $values = "'$nik','$nm','$almt','$telp','$gender'";
            $simpan = $db->tambahData('karyawan', $kolom, $values);
            if ($simpan) {
                        header('location:../../table_karyawan');
                }
        }
}
?>