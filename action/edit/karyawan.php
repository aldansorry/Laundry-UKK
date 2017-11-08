<?php
include_once"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$lihat_data = $db->tampilSatu("karyawan","*","nik='$clause'");
}else{
	header('location:table_karyawan');
}
?>
<form method="post" action="action/edit/proses_karyawan.php?clause=<?php echo $clause;?>">
	Nama Karyawan <br>
	<input name="nmkaryawan" type="text" class="form-control" value="<?php echo $lihat_data['nmkaryawan'];?>">
	<br>Alamat Karyawan <br>
	<input name="almtkaryawan" type="text" class="form-control" value="<?php echo $lihat_data['almtkaryawan'];?>">
	<br>Telp Karyawan <br>
	<input name="telpkaryawan" type="text" class="form-control" value="<?php echo $lihat_data['telpkaryawan'];?>">
	<br>Jenis Kelamin<br><select name="genderkaryawan" class="form-control">
						<option value="L">Laki-Laki</option>
						<option value="P">Perempuan</option>
					</select>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<input name="submit" type="submit" class="simpan btn btn-primary">
</form>
</div>