<?php

$host="localhost";
$user="root";
$pass="";
$database="cuci_mobil";

$conn=mysql_connect($host,$user,$pass);
//jika konek dengan server
if ($conn) {
	$buka=mysql_select_db($database);
	//jika database tidak dapat dipanggil
	if (!$buka){
	die("Database tidak dapat dibuka");
	}
}else{
	//jika server tidak konek
	die("Server Mysql tidak terhubung");
}

date_default_timezone_set("Asia/Bangkok");
?>