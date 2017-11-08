<?php
class Koneksi{
    private $host = "localhost";
    private $user = "root";
    private $pass = "asd";
    private $db = "laundry";

    public function error(){
	return mysql_error();
//        return null;
	}
    public function __construct(){
        mysql_connect($this->host,$this->user,$this->pass) or die("Server bermasalah");
        mysql_select_db($this->db) or die("Database bermasalah");
    }
    public function tambahData($tabel,$kolom,$values){
        $sql = "INSERT INTO $tabel($kolom) VALUES($values)";
        $query = mysql_query($sql) or die($this->error());
        return $query;
    }
    public function editData($tabel,$data,$where=null){
        $sql = "UPDATE $tabel SET $data ";
        if($where!=null) $sql .="WHERE $where";
        $query = mysql_query($sql) or die($this->error());
        return $query;
    }
    public function tampilSemua($tabel,$kolom,$where=null,$order=null){
        $sql = "SELECT $kolom FROM $tabel ";
        if($where!=null) $sql .= "WHERE $where";
        if($order!=null) $sql .= "ORDER BY $order";
        $query = mysql_query($sql) or die($this->error());
        $data = array();
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }
    public function hitungData($tabel,$kolom,$where=null){
        $sql = "SELECT $kolom FROM $tabel ";
        if($where!=null) $sql .= "WHERE $where";
        $query = mysql_query($sql) or die($this->error());
        $jumlah = mysql_num_rows($query);
        return $jumlah;
    }
    public function tampilSatu($tabel,$kolom,$where=null){
        $sql = "SELECT $kolom FROM $tabel ";
        if($where!=null) $sql .= "WHERE $where";
        $query = mysql_query($sql) or die($this->error());
        $data = mysql_fetch_array($query);
        return $data;
    }
    public function hapus($tabel,$where){
        $sql = "DELETE FROM $tabel WHERE $where";
        $query = mysql_query($sql) or die($this->error());
        return $query;
    }
	public function tampilSemuaJoin($tabel1,$tabel2,$f1,$f2,$where,$order=null){
		$sql = "SELECT * FROM $tabel1 INNER JOIN $tabel2 on $f1=$f2";
		if($where!=null) $sql .= "WHERE $where";
		if($order!=null) $sql .= " ORDER BY $order";
		$query = mysql_query($sql) or die($this->error());
        $data = array();
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
	}
	public function tampilSatuJoin($tabel1,$tabel2,$f1,$f2,$where){
        $sql = "SELECT * FROM $tabel1 INNER JOIN $tabel2 on $f1=$f2 WHERE $where";
        $query = mysql_query($sql) or die($this->error());
        $data = mysql_fetch_array($query);
        return $data;
    }
	public function hapusJoin($tabel1,$tabel2,$f1,$f2,$where,$order){
		$sql = "DELETE FROM $tabel1 INNER JOIN $tabel2 on $f1=$f2 where $where";
		if($order!=null) $sql .= "ORDER BY $order";
		$query = mysql_query($sql) or die($this->error());
	}
	function sum($tabel,$kolom,$where){
		$sql = "SELECT SUM($kolom) from $tabel where $where";
		$query = mysql_query($sql) or die($this->error());
        $data = mysql_fetch_array($query);
        return $data;
}
    public function __destruct(){
        mysql_close();
    }
}
$db = new Koneksi();
