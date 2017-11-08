<?php
$nopembelian = nopembelian();
$tglpembelian = date('Y-m-d');
if (isset($_POST['submit'])) {
	$nmsupplier = $_POST['nmsupplier'];
    $simpan = $db->tambahData('pembelian',"nopembelian,tglpembelian,karyawan_nik,supplier_idsupplier","'$nopembelian','$tglpembelian','$session_nik','$nmsupplier'");
    if($simpan){
		echo "<script>location='rincianpembelian-$nopembelian'</script>";
	}
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Pembelian</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-5">
					<form method="post" id="myForm">
						No Pembelian <br>
						<input type="text" class="form-control" value="<?php echo $nopembelian;?>"  disabled><br>
						Tanggal Pembelian<br>
						<input type="text" class="form-control" value="<?php echo $tglpembelian;?>"  disabled><br>
						Nama Supplier<br>
						<select name="nmsupplier" class="form-control">
						<?php 
							$tampil = $db->tampilSemua('supplier','*',"status!='danger'");
							foreach($tampil as $t){ ?>
							<option value="<?php echo $t['idsupplier']?>"><?php echo $t['nmsupplier']?></option>
						<?php } ?>
						</select><br>
						<input type="button" onclick="reset()" value="Reset" class="btn btn-default">
						<input name="submit" type="submit" value="Go To Rincian" class="btn btn-primary pull-right">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function reset() {
    document.getElementById("myForm").reset();
}
</script>