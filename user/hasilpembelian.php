<?php
include_once"../koneksi.php";
include_once"../fungsi.php";
$clause = $_GET['nopembelian'];
$tp = $db->tampilSatu("pembelian","*","nopembelian='$clause'");
$total = $db->sum("rincianpembelian","harga","pembelian_nopembelian='$clause'");
$tb = $total['SUM(harga)'];
$db->editData("pembelian","totalbiaya = '$tb'","nopembelian = '$clause'");
$ts = $db->tampilSatu("supplier","nmsupplier,almtsupplier","idsupplier='$tp[supplier_idsupplier]'");
$tk = $db->tampilSatu("karyawan","nmkaryawan","nik='$tp[karyawan_nik]'");
$trp = $db->tampilSemua("rincianpembelian","*","pembelian_nopembelian='$clause'");
?>
<head>
	<meta http-equiv="refresh" content="0; url=pembelian" />
</head>
<body onload="window.print()">
<div class="col-md-10">
    <div class="panel">
        <div class="panel-body">
            <table>
                <tr>
                    <td colspan="3" align="center"><?php echo $ts['nmsupplier']?></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><?php echo $ts['almtsupplier']?></td>
                </tr>
                <tr>
                    <td width="150px">No Pembelian</td>
                    <td colspan="2"><?php echo $tp['nopembelian']?></td>
                </tr>
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td colspan="2"><?php echo $tp['tglpembelian']?></td>
                </tr>
                <tr>
                    <td>Nama Karyawan</td>
                    <td colspan="2"><?php echo ucfirst($tk['nmkaryawan']);?></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">Rincian Pembelian</td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td>Jumlah</td>
                    <td>Harga</td>
                </tr>
                <?php foreach($trp as $rp){
                    $tb = $db->tampilSatu("barang","*","kodebarang='$rp[barang_kodebarang]'");
                    ?>
                <tr>
                    <td><?php echo $tb['nmbarang'];?></td>
                    <td><?php echo $rp['jumlah'];?></td>
                    <td><?php echo $rp['jumlah']*$tb['harga'];?></td>
                </tr>
                <?php 
					$updatestok = $tb['stok'] + $rp['jumlah'];
					$date = date("Y-m-d");
					$db->editData("barang","stok='$updatestok',tglupdatestok='$date'","kodebarang='$rp[barang_kodebarang]'");}?>
                <tr>
                    <td colspan="2">Total Harga</td>
                    <td><?php $thp = $db->sum("rincianpembelian","harga","pembelian_nopembelian='$clause'");echo $thp['SUM(harga)']?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
var s5_taf_parent = window.location;
function popup_print(){
window.open(‘preview.php’,’page’,’toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=no’)
}
</script>
</body>
<div class="hidden">