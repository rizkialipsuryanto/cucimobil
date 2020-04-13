<?php
	include('../config/koneksi.php');
	$query = mysql_query("SELECT * FROM tm_setwaktu");
	// $query = $mysqli->query($sql);
	$data = array();
	while($row = mysql_fetch_assoc($query)){
		$data[] = array("id" => $row['id'], "waktu" => $row['waktu']);
	}
	echo json_encode($data);
?>