<?php
include_once"koneksi.php";
include_once"fungsi.php";
session_start();
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$login_panel = "class='alert bg-info'";
		$login_error = "Username atau Password Kosong";
	}else{
		$username= validasi($_POST['username']);
		$password= validasi($_POST['password']);
		$login_banned = $db->tampilSatuJoin("karyawan","login","nik","karyawan_nik","username='$username'");
		$login_status = $login_banned['status'];
		if($login_status == "danger"){
			$login_panel = "class='alert bg-danger'";
			$login_error = "Banned Akun dengan nik=".$login_banned['nik'];
		}else{
		$login_valid = $db->hitungData("login","*","username = '$username' AND password = '$password'");
		if ($login_valid == 1) {
			$_SESSION['login_user']=$username; // Membuat Sesi/session
			header("location: index.php"); // Mengarahkan ke halaman profil
		}else{
			$login_panel = "class='alert bg-warning'";
			$login_error = "Anda Belum Terdaftar !";
		}
	}
}
}
if(isset($_SESSION['login_user'])){
	header("location:home");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Danbi Laundry</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<script src="js/lumino.glyphs.js"></script>
</head>
<body>
<div class="row">
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Log in</div>
			<div class="panel-body">
				<?php
				if(isset($login_error)){
				?>
				
					<div <?php echo $login_panel;?> role="alert">
					<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> <?php echo $login_error; ?> <a href="" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
					</div>
				<?php
				}
				?>
				<form method="post">
					<fieldset>
						<div class="form-group">
						<input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
						</div>
						<div class="form-group">
						<input class="form-control" placeholder="Password" name="password" type="password" value="">
						</div>
						<input type="submit" name="submit" class="btn btn-primary" value="Login">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script>
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
</body>
</html>
