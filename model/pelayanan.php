<?php
	include('../config/koneksi.php');
	$id_lokasi = $_GET['id_lokasi'];
	$query = mysql_query("SELECT id_jenis_pelayanan, CONCAT(jenis_pelayanan,' Ongkir ',ongkir_perkg, '/kg (', estimasi_hari,')') as nama FROM jenis_pelayanan WHERE id_lokasi = '".$id_lokasi."'");
	// $query = $mysqli->query($sql);
	$data = array();
	while($row = mysql_fetch_assoc($query)){
	$data[] = array("id_pelayanan" => $row['id_jenis_pelayanan'], "pelayanan" => $row['nama']);
	}
	echo json_encode($data);
?>