<?php
	include('../config/koneksi.php');
	$query = mysql_query("SELECT * FROM lokasi");
	// $query = $mysqli->query($sql);
	$data = array();
	while($row = mysql_fetch_assoc($query)){
		$data[] = array("id_lokasi" => $row['id_lokasi'], "lokasi" => $row['lokasi']);
	}
	echo json_encode($data);
?>