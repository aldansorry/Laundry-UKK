<?php
$kodekonsumen = $_GET['kodekonsumen'];
$jenislaundry = $_GET['jenislaundry'];
if (isset($_POST['submit'])) {
    if(empty($_POST['tglambil'])) {
        $login_error = "Harus Mengisi Tanggal Ambil !";
    }else{
        $notransaksi = notransaksi();
        $tgltransaksi = date('Y-m-d');
        $tglambil = $_POST['tglambil'];
        $diskon = $_POST['diskon'];
		$tampilnmjenislaundry = $db->tampilSatu("jenislaundry","nmjenislaundry","idjenislaundry = '$jenislaundry'");
		$nmjenislaundry = $tampilnmjenislaundry['nmjenislaundry'];
        $simpan = $db->tambahData("transaksi","notransaksi,tgltransaksi,tglambil,diskon,totalbiaya,nmjenislaundry,konsumen_kodekonsumen,karyawan_nik","'$notransaksi','$tgltransaksi','$tglambil','$diskon','Belum Dibayar','$nmjenislaundry','$kodekonsumen','$session_nik'");
        if($simpan){
            echo "<script>location='rinciantransaksi-$notransaksi-$jenislaundry-$kodekonsumen'</script>";
        }}}
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
<div class="col-sm-5">
				<?php
				if(isset($login_error)){
				?>
				
					<div class="alert bg-danger" role="alert">
					<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> <?php echo $login_error; ?> <a href="" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
					</div>
				<?php
				}
				?>
    <form method="post">
        No Transaksi <br><input type="text" class="form-control" value="<?php echo notransaksi();;?>" disabled><br>
		Tanggal Ambil <br><input name="tglambil" type="date" class="form-control"><br>
        Diskon <br><input name="diskon" type="text" value="0" class="form-control"><br>
        <input name="submit" type="submit" class="btn btn-primary btn-lg">
    </form>
	</div>
		</div>
			</div>
				</div>