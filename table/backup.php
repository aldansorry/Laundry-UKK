<?php
$date = date("Y-m-d");
if(isset($_POST['backup'])){
	$nmtable = $_POST['nmtable'];
	$backup_file  = "/backup/".$nmtable."-".$date.".sql";
	$sqlasdsaa = "SELECT * INTO OUTFILE '../../htdocs/danbi/backup/$date$nmtable.sql' FROM $nmtable";
	$backup = mysql_query($sqlasdsaa);
}
if(isset($_POST['restore'])){
	
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Barang</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Backup</div>
			<div class="panel-body">
				<form class="form-inline" method="post">
					<select name="nmtable" class="form-control">
						<?php $sql = mysql_query("show tables");
						while($b = mysql_fetch_array($sql)){?>
						<option value="<?php echo $b[0]?>"><?php echo $b[0];?></option>
						<?php }?>
					</select>
					<input name="backup" type="submit" class="btn btn-primary" value="Backup">
				</form>
				<form action="action/restore.php">
  <input type="file" name="file" accept=".sql">
  <input type="submit">
</form>
			</div>
		</div>
	</div>
</div>