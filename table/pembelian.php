<?php
if(isset($_GET['clause'])){
    $is = $_GET['clause'];
    $where = "supplier_idsupplier = $is";
    $ta = $db->tampilSemua('pembelian','*',$where);
}else {
    $ta = $db->tampilSemua('pembelian', '*');
}
$no = 1;

?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Pembelian</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
				<div class="panel-body">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
						<tr>
							<th data-field="no" data-sortbox="true" >No</th>
							<th data-field="np" data-sortable="true">NoPembelian</th>
							<th data-field="tp"  data-sortable="true">Tanggal Pembelian</th>
							<th data-field="tb" data-sortable="true">Total Biaya</th>
							<th data-field="nk" data-sortbox="true" >Nik Karyawan</th>
							<th data-field="is" data-sortable="true">Id Supplier</th>
							<th data-field="action">Action</th>
						</tr>
						</thead>
						<tbody>
            <?php foreach($ta as $t){?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $t['nopembelian'];?></td>
                    <td><?php echo $t['tglpembelian'];?></td>
                    <td><?php echo $t['totalbiaya'];?></td>
                    <td><?php echo $t['karyawan_nik'];?></td>
                    <td><?php echo $t['supplier_idsupplier'];?></td>
                    <td>
						<a href="table_rincianpembelian-<?php echo $t['nopembelian'];?>" class="btn btn-success">Rincian</a>
					</td>
                </tr>
                <?php $no++; }?>
            </tbody>
					</table>
				</div>
			</div>
		</div>
	</div><!--/.row-->