<?php
	include('../config/koneksi.php');
	$query = mysql_query("SELECT * FROM tm_kategori");
	// $query = $mysqli->query($sql);
	$data = array();
	while($row = mysql_fetch_assoc($query)){
		$data[] = array("kategori_id" => $row['kategori_id'], "kategori" => $row['kategori']);
	}
	echo json_encode($data);
?>