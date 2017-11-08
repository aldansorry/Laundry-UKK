<?php
include_once"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$lihat_data = $db->tampilSatu("konsumen","*","kodekonsumen='$clause'");
}else{
	header("location:table_konsumen");
}
?>
<form method="post" action="action/edit/proses_konsumen.php?clause=<?php echo $clause;?>">
	<br>Nama Konsumen<br><input name="nmkonsumen" type="text" class="form-control" value="<?php echo $lihat_data['nmkonsumen'];?>">
	<br>Alamat Konsumen<br><input name="almtkonsumen" type="text" class="form-control" value="<?php echo $lihat_data['almkonsumen'];?>">
	<br>Telpon Konsumen<br><input name="telpkonsumen" type="text" class="form-control" value="<?php echo $lihat_data['telpkonsumen'];?>">
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<input name="submit" type="submit" class="simpan btn btn-primary">
</form>
</div>