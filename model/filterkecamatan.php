<?php
	include('../config/koneksi.php');
	$query = mysql_query("SELECT * FROM kecamatan");
	// $query = $mysqli->query($sql);
	$data = array();
	while($row = mysql_fetch_assoc($query)){
		$data[] = array("kecamatan_id" => $row['kecamatan_id'], "kecamatan" => $row['kecamatan']);
	}
	echo json_encode($data);
?>