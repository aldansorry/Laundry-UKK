<?php
$no = 1;
$ta = $db->tampilSemua('transaksi','*');
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Transaksi</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
				<div class="panel-body">
					<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
						<tr>
							<th data-field="no" data-sortbox="true" >No</th>
							<th data-field="nt" data-sortable="true">NoTransaksi</th>
							<th data-field="tt"  data-sortable="true">Tanggal Transaksi</th>
							<th data-field="ta" data-sortable="true">Tanggal Ambil</th>
							<th data-field="d" data-sortbox="true" >Diskon</th>
							<th data-field="tb" data-sortbox="true" >Total Biaya</th>
							<th data-field="kk" data-sortable="true">Kode Konsumen</th>
							<th data-field="nk" data-sortable="true">Nik Karyawan</th>
							<th data-field="action">Action</th>
						</tr>
						</thead>
						<tbody>
            <?php foreach($ta as $t){?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $t['notransaksi'];?></td>
                    <td><?php echo $t['tgltransaksi'];?></td>
                    <td><?php echo $t['tglambil'];?></td>
                    <td><?php echo $t['diskon'];?></td>
					<td><?php echo $t['totalbiaya'];?></td>
                    <td><?php echo $t['konsumen_kodekonsumen'];?></td>
                    <td><?php echo $t['karyawan_nik'];?></td>
                    <td>
						<a href="?table=rinciantransaksi&clause=<?php echo $t['notransaksi'];?>" class="btn btn-success">Rincian</a>
						</td>
                </tr>
                <?php $no++; }?>
            </tbody>
					</table>
				</div>
			</div>
		</div>
	</div><!--/.row-->
	
	
	
 
