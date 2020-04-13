<?php
	include('../config/koneksi.php');
	$query = mysql_query("SELECT * FROM tm_hargacuci");
	// $query = $mysqli->query($sql);
	$data = array();
	while($row = mysql_fetch_assoc($query)){
		$data[] = array("id" => $row['id'], "jenis" => $row['jenis'], "harga" => $row['harga']);
	}
	echo json_encode($data);
?>