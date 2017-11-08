<?php
if($session_nik == "00000000000"){
$tampilkaryawan = $db->tampilSemua("karyawan","*","");	
}else{
$tampilkaryawan = $db->tampilSemua("karyawan","*","nik!='00000000000'");
}
$no = 1;
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Karyawan</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><a data-toggle="modal" href="#karyawan" class="btn btn-primary">Input Karyawan</a></div>
			<div class="panel-body">
				<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
					<thead>
						<tr>
							<th data-field="no">No</th>
							<th data-field="nik" data-sortable="true">NIK</th>
							<th data-field="nama"  data-sortable="true">Nama </th>
							<th data-field="almt" data-sortable="true">Alamat</th>
							<th data-field="telp" data-sortable="true" >Telp</th>
							<th data-field="jk" data-sortable="true">Jenis Kelamin</th>
							<th data-field="action">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($tampilkaryawan as $t){?>
						<tr class="<?php echo $t['status'];?>">
							<td><?php echo $no;?></td>
							<td><?php echo $t['nik'];?></td>
							<td><?php echo $t['nmkaryawan'];?></td>
							<td><?php echo $t['almtkaryawan'];?></td>
							<td><?php echo $t['telpkaryawan'];?></td>
							<td><?php if($t['genderkaryawan'] == "L"){echo "Laki-laki";}else{echo "Perempuan";}?></td>
							<td>
								<?php if($t['status'] == "danger"){?>
								<a href="action/delete/karyawan.php?clause=<?php echo $t['nik'];?>" class="btn btn-success btn-sm btn-block">Make To Active</a>
								<?php }else{?>
								<a href="table_login-<?php echo $t['nik'];?>" class="btn btn-info btn-sm">Rincian</a>
								<a href="" id="edit-record" data-id="<?php echo $t['nik'];?>" class="btn btn-default btn-sm">Edit</a>
								<a href="action/delete/karyawan.php?clause=<?php echo $t['nik'];?>" class="btn btn-danger btn-sm">Banned</a>
								<?php }?>
							</td>
						</tr>
						<?php $no++; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="karyawan" class="modal modal-wide fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Input Karyawan</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="action/input/karyawan.php">
					NIK <br><input name="nik" type="text" class="form-control" value="<?php echo nikgenerate();?>"disabled><br>
					Nama <br><input name="nm" type="text" class="form-control"><br>
					Alamat <br><input name="almt" type="text" class="form-control"><br>
					Telpon <br><input name="telp" type="text" class="form-control"><br>
					Jenis Kelamin<br><select name="gender" class="form-control">
						<option value="L">Laki-Laki</option>
						<option value="P">Perempuan</option>
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
		$.get('action/edit/karyawan.php',
		{clause:$(this).attr('data-id')},
		function(html){
			$("#editmodal").html(html);
			}   
		);
	});
});		
</script>