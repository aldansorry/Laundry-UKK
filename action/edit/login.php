<?php
include_once"../include.php";
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$lihat_data = $db->tampilSatu("login","*","username='$clause'");
}else{
	header("location:table_login-$clause");
}
?>
<form method="post" action="action/edit/proses_login.php?clause=<?php echo $clause;?>">
	<br>Password<br><input name="password" type="text" class="form-control" value="<?php echo $lihat_data['password'];?>">
	<br>Type Data<br><select name="typeuser" class="form-control">
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<input name="submit" type="submit" class="simpan btn btn-primary">
</form>
</div>