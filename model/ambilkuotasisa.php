<?php
	include('../config/koneksi.php');
	$jam = $_GET['jam'];
	$tanggal = $_GET['tanggal'];
	
	$query = mysql_query("SELECT * FROM tm_setwaktu WHERE id = '".$jam."'");
	$row = mysql_fetch_array($query);
	$data = $row['kuota'];
	

	$querys = mysql_query("SELECT count(cuci_id) as jml FROM tr_cuci WHERE id_jam = '".$jam."' AND tgl_pesan = '".$tanggal."'");
	$rowcnt = mysql_fetch_assoc($querys);
	 

	if(empty($rowcnt['jml'])){
		$datacnt = 0;
	}else{
		$datacnt = $rowcnt['jml'];
	} 

	$sisa = $data-$datacnt;
	 
	echo json_encode($sisa);
?>