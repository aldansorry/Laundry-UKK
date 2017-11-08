<?php
include_once"session.php";
include_once"fungsi.php";
include_once"koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Danbi Laundry</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	
	<script src="js/lumino.glyphs.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home"><span>Danbi</span>Laundry</a>
			<ul class="user-menu">
				<li class="dropdown pull-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 
						<?php echo $session_nmkaryawan;?>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="#">
								<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Profile
							</a>
						</li>
						<li>
							<a href="#">
								<svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings
							</a>
						</li>
						<li>
							<a href="javascript:if(confirm('Apakah Anda Ingin Keluar?')) location='logout.php';">
								<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>

	</div>
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<ul class="nav menu">
		<?php if(isset($session_typeuser)){include"menu/".$session_typeuser.".php";}?>
	</ul>
</div>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
				<?php
				if(isset($_GET['table'])){
				include "table/".$_GET['table'].".php";
				}else 
				if(isset($_GET['user'])){
				include "user/".$_GET['user'].".php";
				}else{include "table/dashboard.php";}
				?>		
	<div id="footer">
		<footer class="container-fluid bg-4 text-center">
			<p>Copyright &copy; 2016</p> 
		</footer>
    </div>
</div>
<script>
	$(function () {
		$('#hover, #striped, #condensed').click(function () {
			var classes = 'table';

			if ($('#hover').prop('checked')) {
				classes += ' table-hover';
			}
			if ($('#condensed').prop('checked')) {
				classes += ' table-condensed';
			}
			$('#table-style').bootstrapTable('destroy')
				.bootstrapTable({
					classes: classes,
					striped: $('#striped').prop('checked')
				});
		});
	});

	function rowStyle(row, index) {
		var classes = ['active', 'success', 'info', 'warning', 'danger'];

		if (index % 2 === 0 && index / 2 < classes.length) {
			return {
				classes: classes[index / 2]
			};
		}
		return {};
	}
</script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-table.js"></script>
<script src="js/tablejs.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script>
	$('#calendar').datepicker({
	});

	!function ($) {
		$(document).on("click","ul.nav li.parent > a > span.icon", function(){
			$(this).find('em:first').toggleClass("glyphicon-minus");
		});
		$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
	}(window.jQuery);

	$(window).on('resize', function () {
		if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
	})
	$(window).on('resize', function () {
		if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
	})
</script>

<script type="text/javascript">
var s5_taf_parent = window.location;
function popup_print(){
window.open(‘preview.php’,’page’,’toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes’)
}
</script>	
</body>
</html>
