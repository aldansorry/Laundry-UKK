<?php
if (isset($_POST['submit'])) {
    if(empty($_POST['nmkonsumen'])) {
        echo "<script language='javascript'>alert('Ada yang belum diisi')</script>";
    }else{
        $kodekonsumen = kodekonsumen();
        $nmkonsumen = $_POST['nmkonsumen'];
        $almtkonsumen = $_POST['almtkonsumen'];
        $telpkonsumen = $_POST['telpkonsumen'];
        $jenislaundry = $_POST['jenislaundry'];
        $simpan = $db->tambahData('konsumen',"kodekonsumen,nmkonsumen,almkonsumen,telpkonsumen","'$kodekonsumen','$nmkonsumen','$almtkonsumen','$telpkonsumen'");
        if($simpan) {
            echo "<script>location='transaksi-$kodekonsumen-$jenislaundry'</script>";
        }
    }
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Pendaftaran Konsumen</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
<div class="col-sm-5">
    <form method="post">
        Kode Konsumen <br><input name="kodekonsumen" type="text" value="<?php echo kodekonsumen();?>" disabled class="form-control"><br>
        Nama Konsumen <br><input name="nmkonsumen" type="text" value="" class="form-control"><br>
        Alamat Konsumen <br><input name="almtkonsumen" type="text" value="" class="form-control"><br>
        Telp Konsumen <br><input name="telpkonsumen" type="text" value="" class="form-control"><br>
        <select name="jenislaundry" class="form-control">
            <?php $jl = $db->tampilSemua('jenislaundry','*');
            foreach($jl as $j){?>
                <option value="<?php echo $j['idjenislaundry']?>"><?php echo $j['nmjenislaundry']?></option>
            <?php }?>
        </select><br>
        <input name="submit" type="submit" class="btn btn-primary btn-lg" value="Input">
    </form>
</div>
</div>
</div>
</div>
</div>