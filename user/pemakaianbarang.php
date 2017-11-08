<?php
if(isset($_POST['submit'])){
	if(empty($_POST['jmlbrng'])){
		echo"<script language='javascript'>alert('Ada yang belum diisi');history.back();</script>";
	}else{
	$kdbarang = validasi($_POST['kdbarang']);
	$jmlbrng = validasi($_POST['jmlbrng']);
	$tbarang = $db->tampilSatu("barang","*","kodebarang = '$kdbarang'");
	$stok = $tbarang['stok'];
	$hstok = $stok - $jmlbrng;
	if($hstok < 0){
		echo"<script language='javascript'>alert('Stok Kurang');history.back();</script>";
	}else{
		$ubarang = $db->editData("barang","stok = '$hstok'","kodebarang = '$kdbarang'");
		$kdpenge = kodepengeluaran();
		$inputpb = $db->tambahData("pemakaianbarang","kodepengeluaran,jumlah,karyawan_nik,barang_kodebarang","'$kdpenge','$jmlbrng','$session_nik','$kdbarang'");
		header('location:pemakaianbarang');
	}
	}
}
$list = $db->tampilSemua("pemakaianbarang","*","karyawan_nik='$session_nik'");
$no = 1;
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Pemakaian Barang</div>
			<div class="panel-body">
				<form class="form-inline" method="post">
					<select name="kdbarang" class="form-control">
						<?php $brn = $db->tampilSemua('barang','*');
						foreach($brn as $j){ if($j['stok'] == null){}else{?>
						<option value="<?php echo $j['kodebarang']?>"><?php echo $j['nmbarang'];?>(<?php echo $j['stok'];?>)</option>
						<?php }}?>
					</select>
					<input name="jmlbrng" type="text" class="form-control">
					<input name="submit" type="submit" class="btn btn-primary">
				</form>
			<div class="panel-body">
				<table data-toggle="table">
					<thead>
						<tr>
							<th data-field="no">No</th>
							<th data-field="idr" data-sortable="true">Kode Pengeluaran</th>
							<th data-field="nmp"  data-sortable="true">Nama Barang</th>
							<th data-field="jml" data-sortable="true">Jumlah</th>
						</tr>
                    </thead>
					<tbody>
					<?php
					foreach($list as $t){
						$get_kodebarang = $t['barang_kodebarang'];
						$nmbarang = $db->tampilSatu('barang','*',"kodebarang='$get_kodebarang'");
					?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $t['kodepengeluaran'];?></td>
							<td><?php echo $nmbarang['nmbarang']?></td>
							<td><?php echo $t['jumlah'];?></td>
						</tr>
					<?php $no++;} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>