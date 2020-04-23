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
<body>
 <!-- onload="window.print();" -->
<?php
include "config/koneksi.php";
// session_start();

$o= date('d');
// $m= date('m');
// $y= date('Y');
$daritgl= $_POST['daritgl'];
$sampaitgl= $_POST['sampaitgl'];
$pencuci= $_POST['pencuci'];
// print_r($pencuci);
// echo $daritgl;
// echo $sampaitgl;
// die();

	function tglIndo($tgl){
	//menjadikan tgl dalam format tanggal-nama bulan-tahun
	//awalnya tgl sudah dalam format yyyy-mm-dd
	$x = explode("-",$tgl);
	$bulan = bulanIndonesia($x[1]);
	return $x[2]." ".$bulan." ".$x[0];
	}
		
	function bulanIndonesia($index){
		//menjadikan bulan format indonesia, parameter index bulan
		$bulan = "";
		switch($index){
			case '01' : $bulan = "Januari"; break;
			case '02' : $bulan = "Februari"; break;
			case '03' : $bulan = "Maret"; break;
			case '04' : $bulan = "April"; break;
			case '05' : $bulan = "Mei"; break;
			case '06' : $bulan = "Juni"; break;
			case '07' : $bulan = "Juli"; break;
			case '08' : $bulan = "Agustus"; break;
			case '09' : $bulan = "September"; break;
			case '10' : $bulan = "Oktober"; break;
			case '11' : $bulan = "November"; break;
			case '12' : $bulan = "Desember"; break;
		}
		return $bulan;		
	}


?>

<?php

if ($pencuci!="ALL") {
	$where = " and a.id_user_pencuci = '".$pencuci."'";
}
else{
	$where = "";
}

$profile = ("SELECT a.no_cuci as no_transaksi,b.nama, b.alamat,a.tgl_pesan, c.waktu as jam, (SELECT cc.nama from tm_user cc where cc.user_id = a.id_user_pencuci) as pencuci, a.jumlah, a.total_bayar as totalbayar FROM tr_cuci a left join tm_user b on a.pelanggan_id = b.no_ktp
  left join tm_setwaktu c on a.id_jam = c.id
			where tgl_pesan >= '".$daritgl."' AND tgl_pesan <= '".$sampaitgl."' AND status ='3' $where");
$data = mysql_query($profile);

$profilesum = ("SELECT count(a.cuci_id) as tottransaksi, sum(a.jumlah) as jumlah, sum(a.total_bayar) as totbayar
FROM tr_cuci a where tgl_pesan >= '".$daritgl."' AND tgl_pesan <= '".$sampaitgl."' AND status ='3' $where");
$datatotala = mysql_query($profilesum);

$profiletransak = ("SELECT count(cuci_id) as tottransaksi, sum(jumlah) as ongkirtrans, sum(total_bayar) as berattrans
FROM tr_cuci a
where tgl_pesan >= '".$daritgl."' AND tgl_pesan <= '".$sampaitgl."' AND status ='3' $where");
$datatotaltransak = mysql_query($profiletransak);

echo $data['tgl_pesan'];

?>

<table width="100%" border="0">
<tr>
<td colspan="4" align="center"><font style="font-size:30px;"><b>LAPORAN</b></td>

</tr>
<tr><td colspan="4" align="center"><font style="font-size:30px;"><b>DATA PENCUCIAN MOBIL</b></td></tr>
<tr><td colspan="4" align="center"><font style="font-size:30px;"><b>GIBUL CAR WASH</b></td></tr>
<tr>
<td width="120">Dari Tanggal </td><td width="2">:</td><td><?php echo tglIndo($daritgl); ?></td>
</tr>
<tr>
<td width="120">Sampai Tanggal</td><td width="2">:</td><td><?php echo tglIndo($sampaitgl); ?></td>
</tr></table>
<br><br><br>

<table align="center" width="100%" border="1">
<thead>
<tr>
<td rowspan="2" align="center">#</td>
<td rowspan="2" align="center">Tanggal</td>
<td rowspan="2" align="center">Nama Pencuci</td>
<td rowspan="2" align="center">Jam</td>
<td rowspan="2" align="center">Nama Pelanggan</td>
<td rowspan="2" align="center">Alamat</td>
<td rowspan="2" align="center">Total Harga</td>
</tr>
</thead>
<?php
while ($p = mysql_fetch_array($data)){
  @$n++;
  $tgl_pesan = $p['tgl_pesan'];
  $pencuci = $p['pencuci'];
  $jam = $p['jam'];
  $nama = $p['nama'];
  $alamat = $p['alamat'];
  // ,$p['kelurahan'],$p['kecamatan'],$p['kabupaten']
  $totalbayar = $p['totalbayar'];
  // ,'/',$p['rw']
  
?>

<tbody>
<tr>
<td align="center"><?php echo $n; ?></td>
<td><?php echo $tgl_pesan; ?></td>
<td><?php echo $pencuci; ?></td>
<td><?php echo $jam; ?></td>
<td><?php echo $nama; ?></td>
<td><?php echo $alamat; ?></td>
<td align="right"><?php echo "Rp " . number_format($totalbayar,2,',','.'); ?></td>

<?php }?>
</tr>
<tr>
<?php
while ($pp = mysql_fetch_array($datatotala)){
	@$n++;
	$jumlah = $pp['jumlah'];
	$totbayar = $pp['totbayar'];
?>
<td align="center"></td>
<!-- <td><?php echo $no_pesanan; ?></td> -->
<td colspan="4">Total</td>
<td align="right"><?php echo $jumlah; ?></td>
<td align="right"><?php echo "Rp " . number_format($totbayar,2,',','.'); ?></td>
<?php } ?>
</tr>
</tbody>
</table>


<br>
<br>
<br>
<br>
<br>
<table border="0" width="100%">
<tr>
<?php
while ($ppp = mysql_fetch_array($datatotaltransak)){
	@$n++;
	$tottransaksi = $ppp['tottransaksi'];
	$ongkirtotaltrans = $ppp['ongkirtrans'];
	$berattotaltrans = $ppp['berattrans'];
?>
<td valign="top" width="900"><b>Total Transaksi : <?php echo $tottransaksi; ?></b><br> 
<br><br><br></td>
<!-- <td valign="top"><b>Total Ongkos Kirim : <?php echo "Rp " . number_format($ongkirtotaltrans,2,',','.'); ?></b><br> 
<br><br><br></td>
<td width="250" align="left"><b>Total Berat : <?php echo $berattotaltrans; ?></b><br> 
<br><br><br></td> -->
<!-- <td width="250" align="left" >Banjarnegara ,<?php //echo $pta['tgl_buat']; ?><br> 
PENGURUS BARANG <br><br><br>
<br>NIP</td> -->
<?php } ?>
</tr>
</table>

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