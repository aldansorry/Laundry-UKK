<?php
include_once"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$lihat_data = $db->tampilSatu("tarif","*","idjenispakaian='$clause'");
}else{
	header("location:table_tarif");
}
?>
<form method="post" action="action/edit/proses_tarif.php?clause=<?php echo $clause;?>">
	<br>Tarif<br><input name="tarif" type="number" class="form-control" value="<?php echo $lihat_data['tarif'];?>">
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<input name="submit" type="submit" class="simpan btn btn-primary">
</form>
</div>