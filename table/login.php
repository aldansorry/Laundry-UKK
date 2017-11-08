<?php
if(isset($_GET['clause'])){
	$clause = $_GET['clause'];
	$no = 1;
	$tampil = $db->tampilSemua('login',"*","karyawan_nik = '$clause'");
}else{
	header('location:index.php');
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Login</h1><h4><strong><?php echo "NIK = ".$clause; ?></strong></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><a data-toggle="modal" href="#inputModal" class="btn btn-primary">Input Akun</a></div>
			<div class="panel-body">
				<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
					<thead>
						<tr>
							<th data-field="no" data-sortbox="true" >No</th>
							<th data-field="nik" data-sortable="true">Username</th>
							<th data-field="nama"  data-sortable="true">Password </th>
							<th data-field="almt" data-sortable="true">Typeuser</th>
							<th data-field="action" data-sortable="false">Action</th>
						</tr>
					</thead>
					<tbody>			
						<?php foreach($tampil as $t){?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $t['username']; ?></td>
							<td><?php echo $t['password']; ?></td>
							<td><?php echo $t['typeuser']; ?></td>
							<td>
								<a href="" id="edit-record" data-id="<?php echo $t['username'];?>" class="btn btn-default btn-sm">Edit</a>
								<a href="javascript:if(confirm('Hapus?')) location='action/delete/login.php?clause=<?php echo $t['username']?>';" class="btn btn-danger btn-sm">Delete</a>
							</td>
						</tr>
						<?php $no++; } ?>
					</tbody> 
				</table>
			</div>
		</div>
	</div>
</div>	
<div id="inputModal" class="modal modal-wide fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Input Akun</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="action/input/login.php?clause=<?php echo $clause;?>">
                    Username <br>
					<input name="username" type="text" class="form-control" maxlength="15"><br>
                    Password <br>
					<input name="password" type="text" class="form-control" minlength="6"><br>
                    Type User <br>
					<select name="typeuser" class="form-control">
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
			</div>
			<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button name="submit" type="submit" class="btn btn-primary" >Simpan</button>
			</div>
				</form>
		</div>
	</div>
</div>
<div class="modal modal-wide fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div>
			<div class="modal-body" id="editmodal"></div>
		</div>
	</div>
</div>
<script src="js/jquery-1.11.2.min.js"></script>
<script>
$(function(){
	$(document).on('click','#edit-record',function(e){
		e.preventDefault();
		$("#myModal").modal('show');
		$.get('action/edit/login.php',
		{clause:$(this).attr('data-id')},
		function(html){
			$("#editmodal").html(html);
			}   
		);
	});
});		
</script>