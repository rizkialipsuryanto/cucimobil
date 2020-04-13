<?php
	include('../config/koneksi.php');
	// $nik =   $_SESSION['SES_USER'];
	$nik = $_GET['nik'];
	$tanggal = $_GET['tanggal'];
	// $query = mysql_query("SELECT * FROM tm_setwaktu");

	$query = mysql_query("SELECT tm_setwaktu.id as id, tm_setwaktu.waktu as waktu FROM tm_setwaktu WHERE NOT EXISTS (SELECT * FROM tr_cuci WHERE tm_setwaktu.id = tr_cuci.id_jam and 
		tr_cuci.tgl_pesan = '".$tanggal."' and tr_cuci.pelanggan_id = '".$nik."')");
	// $query = $mysqli->query($sql);
	$data = array();
	while($row = mysql_fetch_assoc($query)){
		$data[] = array("id" => $row['id'], "waktu" => $row['waktu']);
	}
	echo json_encode($data);
?>