<?php
$ta = $db->tampilSemua("supplier","*","idsupplier!='terhapus'");
$no = 1;
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Supplier</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
				<div class="panel-heading"><a data-toggle="modal" href="#inputModal" class="btn btn-primary">Supplier</a></div>
				<div class="panel-body">
					<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
						<tr>
							<th data-field="no">No</th>
							<th data-field="kb" data-sortable="true">ID Supplier</th>
							<th data-field="nb"  data-sortable="true">Nama Supplier</th>
							<th data-field="h" data-sortable="true">Alamat Supplier</th>
							<th data-field="stok" data-sortbox="true">Telp Supplier</th>
							<th data-field="action">Action</th>
						</tr>
						</thead>
						<tbody>
            <?php foreach($ta as $t){?>
                <tr class="<?php echo $t['status'];?>">
                    <td><?php echo $no;?></td>
                    <td><?php echo $t['idsupplier'];?></td>
                    <td><?php echo $t['nmsupplier'];?></td>
                    <td><?php echo $t['almtsupplier'];?></td>
                    <td><?php echo $t['telpsupplier'];?></td>
                    <td>
						<?php if($t['status']){?>
						<a href="action/delete/supplier.php?clause=<?php echo $t['idsupplier'];?>" class="btn btn-success btn-sm">Make To Active</a>
						<?php }else{?>
						<a href="" id="edit-record" data-id="<?php echo $t['idsupplier'];?>" class="btn btn-default btn-sm">Edit</a>
						<a href="action/delete/supplier.php?clause=<?php echo $t['idsupplier'];?>" class="btn btn-danger btn-sm">Delete</a>
						<?php }?>
					</td>
                </tr>
                <?php $no++; }?>
            </tbody>
					</table>
				</div>
			</div>
		</div>
	</div><!--/.row-->
<div id="inputModal" class="modal modal-wide fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Input Supplier</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="action/input/supplier.php">
                    ID Supplier <br><input name="" type="text" class="form-control" value="<?php echo idsupplier();?>"><br>
                    Nama Supplier<br><input name="nmsupplier" type="text" class="form-control"><br>
                    Alamat Konsumen<br><input name="almtsupplier" type="text" class="form-control"><br>
                    Telpon Konsumen<br><input name="telpsupplier" type="text" class="form-control"><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button name="submit" type="submit" class="btn btn-primary" >Simpan</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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
		$.get('action/edit/konsumen.php',
		{clause:$(this).attr('data-id')},
		function(html){
			$("#editmodal").html(html);
			}   
		);
	});
});		
</script>