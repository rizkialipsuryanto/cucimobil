<?php
	include('../config/koneksi.php');
	$merk = $_GET['merk'];
	$query = mysql_query("SELECT * FROM tm_mobil WHERE merk_id = '".$merk."'");
	// $query = $mysqli->query($sql);
	$data = array();
	while($row = mysql_fetch_assoc($query)){
	$data[] = array("mobil_id" => $row['mobil_id'], "mobil" => $row['mobil']);
	}
	echo json_encode($data);
?>