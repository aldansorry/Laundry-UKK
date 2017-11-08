<?php
include_once"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$lihat_data = $db->tampilSatu("supplier","*","idsupplier='$clause'");
}else{
	header("location:table_supplier");
}
?>
<form method="post" action="action/edit/proses_supplier.php?clause=<?php echo $clause;?>">
	<br>Nama Supplier<br><input name="nmsupplier" type="text" class="form-control" value="<?php echo $lihat_data['nmsupplier'];?>">
	<br>Alamat Supplier<br><input name="almtsupplier" type="text" class="form-control" value="<?php echo $lihat_data['almtsupplier'];?>">
	<br>Telpon Supplier<br><input name="telpsupplier" type="text" class="form-control" value="<?php echo $lihat_data['telpsupplier'];?>">
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<input name="submit" type="submit" class="simpan btn btn-primary">
</form>
</div>