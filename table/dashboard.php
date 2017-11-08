<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Diagram Transaksi dan Pembelian</div>
			<div class="panel-body">
				<div class="canvas-wrapper">
				<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
				</div>
			</div>
			<div class="panel-footer text-center"><div class="col-md-6" style="background-color:rgba(220,220,220,1);"><strong>Pembelian</strong></div><div class="col-md-6 text-center" style="background-color:rgba(48, 164, 255, 1);"><strong>Trasaksi</strong></div></div>
		</div>
	</div>								
</div>
	<script src="js/chart.min.js"></script>
	<?php
	$tahun = date("Y");
	$jant = $db->hitungData("transaksi","notransaksi","month(tgltransaksi)=01 AND YEAR(tgltransaksi)='$tahun'");
	$febt = $db->hitungData("transaksi","notransaksi","month(tgltransaksi)=02 AND YEAR(tgltransaksi)='$tahun'");
	$mart = $db->hitungData("transaksi","notransaksi","month(tgltransaksi)=03 AND YEAR(tgltransaksi)='$tahun'");
	$aprt = $db->hitungData("transaksi","notransaksi","month(tgltransaksi)=04 AND YEAR(tgltransaksi)='$tahun'");
	$meit = $db->hitungData("transaksi","notransaksi","month(tgltransaksi)=05 AND YEAR(tgltransaksi)='$tahun'");
	$junt = $db->hitungData("transaksi","notransaksi","month(tgltransaksi)=06 AND YEAR(tgltransaksi)='$tahun'");
	$jult = $db->hitungData("transaksi","notransaksi","month(tgltransaksi)=07 AND YEAR(tgltransaksi)='$tahun'");
	$agut = $db->hitungData("transaksi","notransaksi","month(tgltransaksi)=08 AND YEAR(tgltransaksi)='$tahun'");
	$sept = $db->hitungData("transaksi","notransaksi","month(tgltransaksi)=09 AND YEAR(tgltransaksi)='$tahun'");
	$oktt = $db->hitungData("transaksi","notransaksi","month(tgltransaksi)=10 AND YEAR(tgltransaksi)='$tahun'");
	$novt = $db->hitungData("transaksi","notransaksi","month(tgltransaksi)=11 AND YEAR(tgltransaksi)='$tahun'");
	$dest = $db->hitungData("transaksi","notransaksi","month(tgltransaksi)=12 AND YEAR(tgltransaksi)='$tahun'");
	$janp = $db->hitungData("pembelian","nopembelian","month(tglpembelian)=01 AND YEAR(tglpembelian)='$tahun'");
	$febp = $db->hitungData("pembelian","nopembelian","month(tglpembelian)=02 AND YEAR(tglpembelian)='$tahun'");
	$marp = $db->hitungData("pembelian","nopembelian","month(tglpembelian)=03 AND YEAR(tglpembelian)='$tahun'");
	$aprp = $db->hitungData("pembelian","nopembelian","month(tglpembelian)=04 AND YEAR(tglpembelian)='$tahun'");
	$meip = $db->hitungData("pembelian","nopembelian","month(tglpembelian)=05 AND YEAR(tglpembelian)='$tahun'");
	$junp = $db->hitungData("pembelian","nopembelian","month(tglpembelian)=06 AND YEAR(tglpembelian)='$tahun'");
	$julp = $db->hitungData("pembelian","nopembelian","month(tglpembelian)=07 AND YEAR(tglpembelian)='$tahun'");
	$agup = $db->hitungData("pembelian","nopembelian","month(tglpembelian)=08 AND YEAR(tglpembelian)='$tahun'");
	$sepp = $db->hitungData("pembelian","nopembelian","month(tglpembelian)=09 AND YEAR(tglpembelian)='$tahun'");
	$oktp = $db->hitungData("pembelian","nopembelian","month(tglpembelian)=10 AND YEAR(tglpembelian)='$tahun'");
	$novp = $db->hitungData("pembelian","nopembelian","month(tglpembelian)=11 AND YEAR(tglpembelian)='$tahun'");
	$desp = $db->hitungData("pembelian","nopembelian","month(tglpembelian)=12 AND YEAR(tglpembelian)='$tahun'");
	?>
	<script>
var randomScalingFactor = function(){ return Math.round(Math.random()*10)};
	var lineChartData = {
			labels : ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
			datasets : [
				{
					label: "Pembelian",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [<?php echo "$janp,$febp,$marp,$aprp,$meip,$junp,$julp,$agup,$sepp,$oktp,$novp,$desp";?>]
				},
				{
					label: "Transaksi",
					fillColor : "rgba(48, 164, 255, 0.2)",
					strokeColor : "rgba(48, 164, 255, 1)",
					pointColor : "rgba(48, 164, 255, 1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(48, 164, 255, 1)",
					data : [<?php echo "$jant,$febt,$mart,$aprt,$meit,$junt,$jult,$agut,$sept,$oktt,$novt,$dest";?>]
				}
			]

		}
	

window.onload = function(){
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true
	});
};
</script>