<?php
include_once"../koneksi.php";
include_once"../fungsi.php";
$nt = $_GET['notransaksi'];
$tt = $db->tampilSatu('transaksi','*',"notransaksi = '$nt'");
$total = $db->sum("rinciantransaksi","harga","transaksi_notransaksi = '$nt'");
$diskon = $tt['diskon'];
$hdiskon = $total['SUM(harga)']*$diskon/100;
$tb = $total['SUM(harga)']-$hdiskon;
$db->editData("transaksi","totalbiaya = '$tb'","notransaksi = '$nt'");
$tk = $db->tampilSatu("konsumen","nmkonsumen","kodekonsumen='$tt[konsumen_kodekonsumen]'");
$tkr = $db->tampilSatu("karyawan","nmkaryawan","nik='$tt[karyawan_nik]'");
$trt = $db->tampilSemua('rinciantransaksi','*',"transaksi_notransaksi = '$nt'");
?>
<head>
	<meta http-equiv="refresh" content="0; url=pilih" />
</head>
<body onload="window.print()">
<table>
    <tr>
        <td colspan="3" align="center">Danbi Laundry</td>
    </tr>
    <tr>
        <td>NO Transaksi</td>
        <td  colspan="2"><?php echo $tt['notransaksi']?></td>
    </tr>
    <tr>
        <td>Nama Konsumen</td>
        <td colspan="2"><?php echo $tk['nmkonsumen']; ?></td>
    </tr>
    <tr>
        <td>Nama Karyawan</td>
        <td colspan="2"><?php echo $tkr['nmkaryawan']?></td>
    </tr>
    <tr>
        <td>Jenis Laundry</td>
        <td colspan="2"><?php echo $tt['nmjenislaundry'];?></td>
    </tr>
	<tr>
		<td colspan="3" align="center">Barang Laundry :</td>
	</tr>
    <tr>
        <td>Nama Pakaian</td>
        <td>Jumlah</td>
        <td>Harga</td>
    </tr>
        <?php foreach($trt as $rt){
            $np = $db->tampilSatu("tarif","nmpakaian","idjenispakaian='$rt[tarif_idjenispakaian]'");?>
    <tr>
        <td><?php echo $np['nmpakaian'];?></td>
        <td><?php echo $rt['jumlah'];?></td>
        <td><?php echo $rt['harga'];?></td>
    </tr>
        <?php }?>
        <tr>
            <td colspan="2" align="right">Harga Total</td>
            <td><?php $th = $db->sum("rinciantransaksi","harga","transaksi_notransaksi='$nt'");echo $th['SUM(harga)'];?></td>
        </tr>
        <tr>
            <td colspan="2" align="right">Dengan Diskon</td>
            <td><?php $diskon = $th['SUM(harga)']*$tt['diskon']/100;$ha = $th['SUM(harga)']-$diskon;echo $ha;?></td>
        </tr>
</table>
<script type="text/javascript">
var s5_taf_parent = window.location;
function popup_print(){
window.open(‘preview.php’,’page’,’toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=no’)
}
</script>
</body>
<div class="hidden">