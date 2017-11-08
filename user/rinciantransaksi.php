<?php
$notransaksi = $_GET['notransaksi'];
$jenislaundry = $_GET['jenislaundry'];
$kodekonsumen = $_GET['kodekonsumen'];
$no = 1;
$antihack = $db->tampilSatu("transaksi","totalbiaya","notransaksi = '$notransaksi'");
if($antihack['totalbiaya'] != "Belum Dibayar"){
	echo "<script language='javascript'>alert('Tidak Bisa Input Transaksi Yang Sudah Dibayar');location=history.back();</script>";
}else{
if (isset($_POST['submit'])) {
    if(empty($_POST['jumlah'])) {
        echo "<script language='javascript'>alert('Ada yang belum diisi')</script>";
    }else{
        $norincian = norincian('rinciantransaksi','idrincian',$notransaksi);
        $jenispakaian = $_POST['jenispakaian'];
        $jumlah = $_POST['jumlah'];
        $tampiltarif = $db->tampilSatu('tarif','*',"jenislaundry_idjenislandry='$jenislaundry'");
        $harga = $tampiltarif['tarif'];
        $hargatotal = $harga*$jumlah;
		$simpan = $db->tambahData('rinciantransaksi',"idrincian,jumlah,harga,transaksi_notransaksi,transaksi_konsumen_kodekonsumen,transaksi_karyawan_nik,tarif_idjenispakaian,tarif_jenislaundry_idjenislandry","'$norincian','$jumlah','$hargatotal','$notransaksi','$kodekonsumen','$session_nik','$jenispakaian','$jenislaundry'");
    }}
		$tampiltransaksi = $db->tampilSatu('transaksi','*',"notransaksi = '$notransaksi'");
		$total = $db->sum("rinciantransaksi","harga","transaksi_notransaksi = '$notransaksi'");
		$diskon = $tampiltransaksi['diskon'];
		$hargadiskon = $total['SUM(harga)']*$diskon/100;
		$totalbiaya = $total['SUM(harga)']-$hargadiskon;
}
?>
<div class="row">
	<div class="col-lg-12">
		 <br>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong><?php echo $notransaksi;?></strong>
				<p class="pull-right">
				Total Biaya : 
				<strong><?php echo $totalbiaya;?></strong>
				<a href="hasiltransaksi-<?php echo $notransaksi;?>" class="btn btn-primary">$ Bayar $</a></p>
			</div>
			<div class="panel-body">
				<table data-toggle="table">
					<thead>
						<tr>
							<th data-field="no">No</th>
							<th data-field="idr" data-sortable="true">Id Rincian</th>
							<th data-field="nmp"  data-sortable="true">Nama Pakaian</th>
							<th data-field="jml" data-sortable="true">Jumlah</th>
							<th data-field="hrg" data-sortable="true">Harga</th>
						</tr>
                    </thead>
					<tbody>
					<?php
					$tampil = $db->tampilSemua('rinciantransaksi',"idrincian,jumlah,harga,tarif_idjenispakaian","transaksi_notransaksi='$notransaksi'");
					foreach($tampil as $t){
						$idjenispakaian = $t['tarif_idjenispakaian'];
						$tampilsatutarif = $db->tampilSatu('tarif','*',"idjenispakaian='$idjenispakaian'");
					?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $t['idrincian'];?></td>
							<td><?php echo $tampilsatutarif['nmpakaian']?></td>
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
								<select name="jenispakaian" class="form-control">
								<?php
								$rincian = $db->tampilSemua('tarif','*',"jenislaundry_idjenislandry='$jenislaundry' AND status!='danger'");
								foreach($rincian as $r){?>
									<option value="<?php echo $r['idjenispakaian'];?>"><?php echo $r['nmpakaian'];?></option>
								<?php }?>
								</select>
							</td>
							<td><input name="jumlah" type="text" class="form-control"></td>
							<td> <input type="submit" name="submit" value="input" class="btn btn-info btn-sm"></td>
						</form>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

