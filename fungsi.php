<?php
function id_generate($kolom, $tabel,$length=1){
    $hasil = mysql_query("SELECT max($kolom) as maxid FROM $tabel");
    if (mysql_num_rows($hasil) >= 0) {
        $row = mysql_fetch_array($hasil);
        $no = (int)substr($row['maxid'], 1) + 1;
        return sprintf("%0".$length."s", $no);
    }
}
function rupiah($data){
    $output = "Rp. " . strrev(implode('.', str_split(strrev(strval($data)), 3)));
    return $output;
}
function bulan($data){
    $bln = array("01" => "Jan",
        "02" => "Feb",
        "03" => "Mar",
        "04" => "Apr",
        "05" => "Mei",
        "06" => "Juni",
        "07" => "Juli",
        "08" => "Agu",
        "09" => "Sep",
        "10" => "Okt",
        "11" => "Nov",
        "12" => "Des");
    $time = explode("-", $data);
    $format = $time[2] . " " . $bln[$time[1]] . " " . $time[0];
    return $format;
}
function hak_akses($level,$hasil){
    if($level) echo $hasil;
}
function validasi($data){
    return mysql_real_escape_string(stripslashes(trim(strip_tags($data))));
}
function cek_gambar($gambar,$direktori){
    $nama_baru = str_replace("","_",$gambar['name']);
    $direktori_baru = $direktori."/".$nama_baru;
    $max_file_size = 20000000;//5000 kb

    $format = array("image/jpg","image/jpeg","image/gif","image/png");
    if(!in_array($gambar['type'],$format)) die("Tipe file salah");
    if($gambar['size']>$max_file_size) die("Ukuran file terlalu besar");
    if(file_exists($direktori_baru)) die("File telah ada");
    move_uploaded_file($gambar['tmp_name'],$direktori_baru) or die("Gagal upload");
    return $nama_baru;
}
function level($data){
    $level = array(0=>"Super Admin",
        1=>"Admin");
    foreach($level as $index=>$nama){
        return ($index==$data)?$nama:"";
    }
}
function alert($class,$judul=null,$isi=null){
    return "<div class='$class'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>
     <strong>$judul</strong>
     <p>$isi</p>
     </div>";
}
function aktif_menu($menu,$data){
    if($menu == $data) echo "class='active'";
}
function nikgenerate(){
$tgl = date('Ymd');
$autoplus = sprintf('%03s',(int)rand(1,999));
$format = $tgl.$autoplus;
return $format;
}
function nopembelian(){
$query = mysql_query("SELECT MAX(nopembelian) FROM pembelian");
$hasil = mysql_fetch_array($query);
$autoplus = (int)$hasil[0]+1;
$format = $autoplus;
return $format;
}
function norincian($tabel,$kolom,$np){
$query = mysql_query("SELECT MAX(RIGHT($kolom,3)) FROM $tabel");
$hasil = mysql_fetch_array($query);
$autoplus = sprintf('%03s',(int)$hasil[0]+1);
$format = sprintf("%010s",$np).$autoplus;
return $format;
}
function kodekonsumen(){
$query = mysql_query("SELECT MAX(RIGHT(kodekonsumen,7)) FROM konsumen where kodekonsumen!='terhapus'");
$hasil = mysql_fetch_array($query);
$autoplus = sprintf('%07s',(int)$hasil[0]+1);
$format = "KSM".$autoplus;
return $format;
}
function idsupplier(){
$query = mysql_query("SELECT MAX(RIGHT(idsupplier,7)) FROM supplier where idsupplier!='terhapus'");
$hasil = mysql_fetch_array($query);
$autoplus = sprintf('%07s',(int)$hasil[0]+1);
$format = "SPL".$autoplus;
return $format;
}
function notransaksi(){
$query = mysql_query("SELECT MAX(RIGHT(notransaksi,10)) FROM transaksi where notransaksi!='terhapus'");
$hasil = mysql_fetch_array($query);
$autoplus = sprintf('%010s',(int)$hasil[0]+1);
$format = $autoplus;
return $format;
}
function kodepengeluaran(){
$query = mysql_query("SELECT MAX(kodepengeluaran) FROM pemakaianbarang ");
$hasil = mysql_fetch_array($query);
$autoplus = $hasil[0]+1;
$format = $autoplus;
return $format;
}