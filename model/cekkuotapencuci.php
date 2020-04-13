<?php
	include('../config/koneksi.php');
	$waktu = $_GET['waktu'];
	$tanggal = $_GET['tanggal'];
	$idcuci = $_GET['idcuci'];
	
	$query = mysql_query("SELECT * from tm_setwaktu where waktu = '".$waktu."'");
	$row = mysql_fetch_array($query);
	$dataidwaktu = $row['id'];
	

	$querys = mysql_query("SELECT count(*) as jml FROM tr_cuci WHERE tgl_pesan = '".$tanggal."' and id_jam='".$dataidwaktu."' and id_user_pencuci='".$idcuci."'");
	$rowcnt = mysql_fetch_assoc($querys);
	$datacnt = $rowcnt['jml']; 
	 
	echo json_encode($datacnt);
?>