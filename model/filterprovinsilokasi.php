<?php
	include('../config/koneksi.php');
	$id_lokasi = $_GET['id_lokasi'];
	$query = mysql_query("SELECT * FROM provinsi WHERE id_lokasi = '".$id_lokasi."'");
	// $query = $mysqli->query($sql);
	$data = array();
	while($row = mysql_fetch_assoc($query)){
	$data[] = array("id_provinsi" => $row['id_provinsi'], "provinsi" => $row['provinsi']);
	}
	echo json_encode($data);
?>