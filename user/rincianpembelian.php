<?php
$clause = $_GET['nopembelian'];
$no = 1;
if (isset($_POST['submit'])) {
    if(empty($_POST['jumlah'])) {
        echo "<script language='javascript'>alert('Ada yang belum diisi')</script>";
    }else{
        $norincian = norincian('rincianpembelian','norincian',$clause);
        $kodebarang = $_POST['kodebarang'];
        $jumlah = $_POST['jumlah'];
        $hg = $db->tampilSatu('barang','*',"kodebarang='$kodebarang'");
        $harga = $hg['harga'];
        $hargatotal = $harga*$jumlah;
        $simpan = $db->tambahData('rincianpembelian',"norincian,jumlah,harga,barang_kodebarang,pembelian_nopembelian","'$norincian','$jumlah','$hargatotal','$kodebarang','$clause'");
    }
}
$sqltotalbiaya = $db->tampilSatu("rincianpembelian","sum(harga)","pembelian_nopembelian='$clause'");
$totalbiaya = $sqltotalbiaya['sum(harga)'];
?>
<div class="row">
	<div class="col-lg-12">
		 <br>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Rincian Barang
				<p class="pull-right">Total Biaya :
					<strong><?php echo $totalbiaya;?></strong>
					&nbsp; <a href="hasilpembelian-<?php echo $clause;?>" class="btn btn-success">&dollar; Bayar &dollar;</a>
				</p>
			</div>
			<div class="panel-body">
				<table data-toggle="table">
					<thead>
						<tr>
							<th data-field="No" data-sortable="true" >No</th>
							<th data-field="NoRincian" data-sortable="true">Norincian</th>
							<th data-field="nmb"  data-sortable="true">Nama Barang</th>
							<th data-field="jml" data-sortable="true">Jumlah</th>
							<th data-field="harga" data-sortable="true">Harga</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$tampil = $db->tampilSemua("rincianpembelian","norincian,barang_kodebarang,jumlah,harga","pembelian_nopembelian=$clause");
					foreach($tampil as $t){
					$kodebarang = $t['barang_kodebarang'];
					$t1 = $db->tampilSatu('barang','*',"kodebarang='$kodebarang'");
					?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $t['norincian'];?></td>
							<td><?php echo $t1['nmbarang']?></td>
							<td><?php echo $t['jumlah'];?></td>
							<td><?php echo $t['harga'];?></td>
						</tr>
					<?php $no++;} ?>
					</tbody>
					<tfoot>
						<tr>
						<form method="post" class="form-inline">
							<td></td>
							<td></td>
							<td>
								<select name="kodebarang"  class="form-control">
								<?php $rincian = $db->tampilSemua('barang','*',"status!='danger'");
								foreach($rincian as $r){?>
								<option value="<?php echo $r['kodebarang'];?>"><?php echo $r['nmbarang'];?></option>
								<?php }?>
								</select>
							</td>
							<td> 
								<input name="jumlah" type="text"  class="form-control" placeholder="Jumlah">
							</td>
							<td>
								<input type="submit" name="submit" value="Tambah Barang" class="btn btn-primary">
							</td>
						</form>
						</tr>
					</tfoot>
				</table>
			</div>
        </div>
	</div>
</div>