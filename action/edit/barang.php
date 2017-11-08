<?php
include_once"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$lihat_data = $db->tampilSatu("barang","*","kodebarang='$clause'");
}else{
	header("location:table_tarif");
}
?>
<form method="post" action="action/edit/proses_barang.php?clause=<?php echo $clause;?>">
	<br>Nama Barang<br><input name="nmbarang" type="text" class="form-control" value="<?php echo $lihat_data['nmbarang'];?>">
	<br>Harga<br><input name="harga" type="number" class="form-control" value="<?php echo $lihat_data['harga'];?>">
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<input name="submit" type="submit" class="simpan btn btn-primary">
</form>
</div>