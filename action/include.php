<?php
include"../../koneksi.php";
include"../../fungsi.php";
require"../../session.php";
if($session_typeuser != "admin") exit('<script>alert("Hanya Admin");history.back();</script>');
?>