<?php
include_once"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$lihat_data = $db->tampilSatu("jenislaundry","*","idjenislaundry='$clause'");
}else{
	header("location:table_tarif");
}
?>
<form method="post" action="action/edit/proses_jenislaundry.php?clause=<?php echo $clause;?>">
	<br>Nama Pakaian<br><input name="nmjenislaundry" type="text" class="form-control" value="<?php echo $lihat_data['nmjenislaundry'];?>">
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<input name="submit" type="submit" class="simpan btn btn-primary">
</form>
</div>