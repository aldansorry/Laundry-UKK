<?php
if (isset($_POST['submit'])) {
    {
        $kk = $_POST['kk'];
        $jl = $_POST['jl'];
        echo "<script>location='transaksi-$kk-$jl'</script>";
    }
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Pilih Pelanggan</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
<div class="col-sm-5">
    <form method="post">
        <select name="kk" class="form-control">
            <?php $kk = $db->tampilSemua('konsumen','*',"kodekonsumen!='terhapus'",'nmkonsumen');
            foreach($kk as $k){?>
                <option value="<?php echo $k['kodekonsumen']?>"><?php echo $k['nmkonsumen']?>&nbsp<?php echo $k['kodekonsumen']?></option>
            <?php }?>
        </select><br>
        <select name="jl" class="form-control">
            <?php $jl = $db->tampilSemua('jenislaundry','*',"idjenislaundry!='terhapus'");
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