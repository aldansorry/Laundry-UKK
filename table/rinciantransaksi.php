<?php
$tabel = "transaksi";
$clause = $_GET['clause'];

$no = 1;
$wherediskon = "notransaksi='$clause'";
$d = $db->tampilSatu('transaksi','diskon',$wherediskon);
$diskon = $d['diskon'];
$where = "transaksi_notransaksi='$clause'";
$tk = $db->tampilSemua('rinciantransaksi',"*",$where);
?>
<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Transaksi</div>
				<div class="panel-body">
    <table class="table table-striped" id="example1">
            <thead>
            <th>No</th>
            <th>Idrincian</th>
            <th>Id Jenis Pakaian</th>
            <th>Jenis Laundry</th>
            <th>Kode Konsumen</th>
            <th>NIK</th>
            <th>jumlah</th>
            <th>harga</th>
            </thead>
            <tbody>
            <?php foreach($tk as $t){?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $t['idrincian'];?></td>
                    <td><?php echo $t['tarif_idjenispakaian'];?></td>
                    <td><?php echo $t['tarif_jenislaundry_idjenislandry'];?></td>
                    <td><?php echo $t['transaksi_konsumen_kodekonsumen'];?></td>
                    <td><?php echo $t['transaksi_karyawan_nik'];?></td>
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
	