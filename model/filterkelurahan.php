<?php
	include('../config/koneksi.php');
	$kecamatan_id = $_GET['kecamatan_id'];
	$query = mysql_query("SELECT * FROM kelurahan WHERE kecamatan_id = '".$kecamatan_id."'");
	// $query = $mysqli->query($sql);
	$data = array();
	while($row = mysql_fetch_assoc($query)){
	$data[] = array("kelurahan_id" => $row['kelurahan_id'], "kelurahan" => $row['kelurahan']);
	}
	echo json_encode($data);
?>