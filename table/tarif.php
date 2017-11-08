<?php
$ta = $db->tampilSemua('tarif','*',"idjenispakaian!='terhapus'");
$no = 1;
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tarif</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
            <div class="panel-heading"><a data-toggle="modal" href="#inputModal" class="btn btn-primary">Input Tarif</a></div>
            <div class="panel-body">
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                    <tr>
                        <th data-field="no">No</th>
                        <th data-field="id" data-sortable="true">Id Jenis Pakaian</th>
                        <th data-field="nm"  data-sortable="true">Nama Pakaian</th>
                        <th data-field="tf" data-sortable="true">Tarif</th>
                        <th data-field="ac" data-sortable="true">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ta as $t){?>
                        <tr class="<?php echo $t['status'];?>">
                            <td><?php echo $no;?></td>
                            <td><?php echo $t['idjenispakaian'];?></td>
                            <td><?php echo $t['nmpakaian'];?></td>
                            <td><?php echo $t['tarif'];?></td>
                            <td>
							<?php if($t['status'] == "danger"){?>
								<a href="action/delete/tarif.php?clause=<?php echo $t['idjenispakaian'];?>" class="btn btn-success btn-sm btn-block">Make To Active</a>	
							<?php }else{?>
								<a href="" id="edit-record" data-id="<?php echo $t['idjenispakaian'];?>" class="btn btn-default btn-sm">Update Harga</a>
								<a href="action/delete/tarif.php?clause=<?php echo $t['idjenispakaian'];?>" class="btn btn-danger btn-sm">Non Active</a>
							<?php } ?>
							</td>
                        </tr>
                        <?php $no++; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div id="inputModal" class="modal modal-wide fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Input Tarif</h4>
            </div>
            <div class="modal-body">
                <form action="action/input/tarif.php" method="post">
                    Id Jenis Pakaian <br><input name="jenispakaian" type="text" class="form-control" maxlength="6"><br>
                    Nama Pakaian<br><input name="nmpakaian" type="text" class="form-control" maxlength="45"><br>
                    Tarif<br><input name="tarif" type="number" class="form-control" maxlength="11"><br>
                    Jenis Laundry<br>
                    <select name="jenislaundry" class="form-control">
                        <?php $select = $db->tampilSemua('jenislaundry','*');foreach($select as $s){?>
                            <option value="<?php echo $s['idjenislaundry'];?>"><?php echo $s['nmjenislaundry'];?></option>
                        <?php }?>
                    </select>
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
		$.get('action/edit/tarif.php',
		{clause:$(this).attr('data-id')},
		function(html){
			$("#editmodal").html(html);
			}   
		);
	});
});		
</script>