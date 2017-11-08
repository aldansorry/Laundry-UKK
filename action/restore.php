<?php
include"../koneksi.php";
$clause = $_GET['file'];
$table_name = substr($clause,10);
$explodenmtable = explode(".",$table_name);
$nmtable = $explodenmtable[0];
$sql = "LOAD DATA INFILE '../../htdocs/danbi/backup/$clause' INTO TABLE $nmtable";
$restore = mysql_query($sql);
if($restore){
	 echo "<script language='javascript'>window.alert('Succesfully Updated')
    window.location.href='../table_backup'</script>";
}
?>