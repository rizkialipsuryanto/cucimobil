<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rancang Bangun Sistem Informasi Pengambilan Barang Pada PT.TIKI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
 <!-- onload="window.print();" -->
<?php
include "config/koneksi.php";
session_start();

$o= date('d');
// $m= date('m');
// $y= date('Y');
$m= $_POST['bulan'];
$y= $_POST['tahun'];
$tgl = date(' d-m-Y'); 
$day = date('m', strtotime($tgl));
$dayList = array(
	
	'01' => 'Januari',
	'02' => 'Februari',
	'03' => 'Maret',
	'04' => 'April',
	'05' => 'Mei',
	'06' => 'Juni',
	'07' => 'Juli',
	'08' => 'Agustus',
	'09' => 'September',
	'10' => 'Oktober',
	'11' => 'November',
	'12' => 'Desember',
);

if ($m == 1) {
	$namabulan = 'Januari';
}
if ($m == 2) {
	$namabulan = 'Februari';
}
if ($m == 3) {
	$namabulan = 'Maret';
}
if ($m == 4) {
	$namabulan = 'April';
}
if ($m == 5) {
	$namabulan = 'Mei';
}
if ($m == 6) {
	$namabulan = 'Juni';
}
if ($m == 7) {
	$namabulan = 'Juli';
}
if ($m == 8) {
	$namabulan = 'Agustus';
}
if ($m == 9) {
	$namabulan = 'September';
}
if ($m == 10) {
	$namabulan = 'Oktober';
}
if ($m == 11) {
	$namabulan = 'November';
}
if ($m == 12) {
	$namabulan = 'Desember';
}

?>

<table width="100%" border="0">
<tr>
<td colspan="4" align="center"><font style="font-size:30px;"><b>LAPORAN</b></td>

</tr>
<tr><td colspan="4" align="center"><font style="font-size:30px;"><b>DATA JASA PENGAMBILAN BARANG</b></td></tr>
<tr><td colspan="4" align="center"><font style="font-size:30px;"><b>PT TIKI</b></td></tr>
<tr>
<td width="120">BULAN</td><td width="2">:</td><td><?php echo $namabulan; ?></td>
</tr>
<tr>
<td>TAHUN</td><td>:</td><td><?php echo $y; ?></td>
</tr>
<!-- <tr>
<td>SATUAN KERJA</td><td>:</td><td><?php echo $pga['nama_sekolah']; ?></td><td width="300">NO. KODE LOKASI : <?php echo $pta['no_kode_lokasi']; ?></td>
</tr>
<tr>
<td>RUANGAN</td><td>:</td><td><?php echo $sta['jenis_ruang']; ?></td>
</tr> --></table>
<br><br><br>
<?php

$profile = ("SELECT a.*, b.nama as nama, c.lokasi as lokasi, d.provinsi as provinsi, e.jenis_pelayanan as jenis_pelayanan FROM tr_pesanan a left join tm_user b on a.id_pelanggan = b.user_id
			left join lokasi c on a.id_lokasi = c.id_lokasi
			left join provinsi d on a.id_provinsi = d.id_provinsi
			left join jenis_pelayanan e on a.id_jenis_pelayanan = e.id_jenis_pelayanan
			where SUBSTRING(a.tgl_input,6,2) = '".$m."' AND SUBSTRING(a.tgl_input,1,4) = '".$y."' AND status ='7'");
$data = mysql_query($profile);

echo $data['tgl_input'];
?>

<table align="center" width="100%" border="1">
<thead>
<tr>
<td rowspan="2" align="center">#</td>
<td rowspan="2" align="center">No Pesanan</td>
<td rowspan="2" align="center">No Resi</td>
<td rowspan="2" align="center">Nama Pengirim</td>
<td rowspan="2" align="center">Nama Penerima</td>
<td rowspan="2" align="center">Lokasi</td>
<td rowspan="2" align="center">Alamat</td>
<td rowspan="2" align="center">RT/RW</td>
<td rowspan="2" align="center">Provinsi</td>
<td rowspan="2" align="center">Pelayanan</td>
<td rowspan="2" align="center">Ongkir</td>
<td colspan="2" align="center">Berat</td>
</tr>
</thead>
<!-- <tr>
<td align="center">BAIK</td>
<td align="center">KURANG BAIK</td>
<td align="center">RUSAK BERAT</td>
</tr> -->
<!-- <tr>
<td align="center">1</td><td align="center">2</td><td align="center">3</td><td align="center">4</td><td align="center">5</td>
<td align="center">6</td><td align="center">7</td><td align="center">8</td><td align="center">9</td><td align="center">10</td>
<td align="center">11</td><td align="center">12</td><td align="center">13</td><td align="center">14</td>
</tr> -->
<?php
while ($p = mysql_fetch_array($data)){
	@$n++;
	$no_pesanan = $p['no_pesanan'];
	$no_resi = $p['no_resi'];
	$nama_pengirim = $p['nama'];
	$nama_penerima = $p['nama_penerima'];
	$lokasi = $p['lokasi'];
	$alamat = $p['alamat_penerima'];
	// ,$p['kelurahan'],$p['kecamatan'],$p['kabupaten']
	$rtrw = $p['rt'];
	// ,'/',$p['rw']
	$provinsi = $p['provinsi'];
	$pelayanan = $p['jenis_pelayanan'];
	$ongkir = $p['ongkir'];
	$berat = $p['total_berat_barang_kg'];
?>
<tbody>
<tr>
<td align="center"><?php echo $n; ?></td>
<td><?php echo $no_pesanan; ?></td>
<td><?php echo $no_resi; ?></td>
<td><?php echo $nama_pengirim; ?></td>
<td><?php echo $nama_penerima; ?></td>
<td><?php echo $lokasi; ?></td>
<td><?php echo $alamat; ?></td>
<td align="center"><?php echo $rtrw; ?></td>
<td><?php echo $provinsi; ?></td>
<td><?php echo $pelayanan; ?></td>
<td align="right"><?php echo $ongkir; ?></td>
<td align="right"><?php echo $berat; ?></td>

<?php }?>
</tr>
</tbody>
</table>

<br>
<!-- <table border="0" width="100%">
<tr>
<td valign="top">MENGETAHUI<br> 
KEPALA SEKOLAH<br><br><br> 
<?php echo $ke['nama_kepsek'] ; ?><br> 
NIP 121</td>
<td width="250" align="left" >Banjarnegara ,<?php echo $pta['tgl_buat']; ?><br> 
PENGURUS BARANG <br><br><br>
<?php echo $ke['nama_kepsek']; ?>
<br>NIP. <?php echo $ke['nip']; ?></td>
</tr>
</table> -->
	<!-- Nundang JavaScript -->
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>


</body>
</html>