<?php
$tabel = "pembelian";
$clause = $_GET['clause'];
$tk = $db->tampilSemua('rincianpembelian',"*","pembelian_nopembelian='$clause'");
$no = 1;
?>

<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Pembelian</div>
				<div class="panel-body">
    <table class="table table-striped" id="example1">
            <thead>
            <th>No</th>
            <th>No Rincian</th>
            <th>Kode Barang</th>
            <th>jumlah</th>
            <th>harga</th>
            </thead>
            <tbody>
            <?php foreach($tk as $t){?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $t['norincian'];?></td>
                    <td><?php echo $t['barang_kodebarang'];?></td>
                    <td><?php echo $t['jumlah'];?></td>
                    <td><?php echo $t['harga'];?></td>
                </tr>
            <?php }?>
            </tbody>
    </table>
</div>
			</div>
		</div>
	</div><!--/.row-->