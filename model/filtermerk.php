<?php
	include('../config/koneksi.php');
	$kategori = $_GET['kategori'];
	$query = mysql_query("SELECT * FROM tm_merk WHERE kategori_id = '".$kategori."'");
	// $query = $mysqli->query($sql);
	$data = array();
	while($row = mysql_fetch_assoc($query)){
	$data[] = array("merk_id" => $row['merk_id'], "merk" => $row['merk']);
	}
	echo json_encode($data);
?>