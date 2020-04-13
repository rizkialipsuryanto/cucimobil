<?php
	include('../config/koneksi.php');
	$jam = $_GET['jam'];
	
	$query = mysql_query("SELECT * FROM tm_setwaktu WHERE id = '".$jam."'");
	$row = mysql_fetch_array($query);
	$data = $row['kuota'];
	 
	echo json_encode($data);
?>