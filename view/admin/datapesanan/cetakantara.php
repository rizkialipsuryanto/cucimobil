<?php 
    $now = date_create('now')->format('Y-m-d'); 
 ?>

<div class="container-fluid">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Isi Data</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create </li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- <a href="?hal=createpelangganpesan"><button type="submit" class="btn btn-primary">Create</button></a> -->
      
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Form</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="../cucimobil/cetakantara.php" method="post" target="_blank">
            <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                  <label>Dari Tanggal</label>
                  <div class="input-group mb-3">
                    <input type="date" class="form-control" placeholder="Dari Tanggal" id="daritgl" name="daritgl" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-calendar-alt"></span>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                  <label>Sampai Tanggal</label>
                  <div class="input-group mb-3">
                    <input type="date" class="form-control" placeholder="Sampai Tanggal" id="sampaitgl" name="sampaitgl" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-calendar-alt"></span>
                      </div>
                    </div>
                  </div>
              </div>                
              <!-- /.col -->
            </div>
            <div class="col-md-12">
                
                <div class="form-group">
                  <label>Pencuci</label>
                  <select class="form-control" id='pencuci' name="pencuci">
                           <option>ALL</option>
                            <?php 
                            $query = mysql_query("SELECT * FROM tm_user WHERE jenis_user = '2'");
                              while($row = mysql_fetch_array($query)){?>
                                 <option value="<?=$row['user_id']?>"><?=$row['nama']?></option>
                            <?php }?>
                         </select>
                </div>
                <!-- /.form-group -->
              </div>
              <br><br>
                  <button type="submit" class="btn btn-primary" >Print</button>  
                  <!-- <a href="../jasatiki/cetak.php?bulan="></a> -->
            
          </form>
                
          </div>
          <!-- /.card-body -->
          
        </div>
      </div>

  </section>
  <section class="content">
      <div class="container-fluid">

        <div class="card card-default">

        <table width="100%" border="0">
<tr>
<td colspan="4" align="center"><font style="font-size:30px;"><b>LAPORAN</b></td>

</tr>
<tr><td colspan="4" align="center"><font style="font-size:30px;"><b>DATA PENCUCIAN MOBIL</b></td></tr>
<tr><td colspan="4" align="center"><font style="font-size:30px;"><b>GIBUL CAR WASH</b></td></tr>
<tr>
<!-- td width="120">TANGGAL</td><td width="2">:</td><td><?php echo $d; ?></td>
</tr>
<tr>
<td width="120">BULAN</td><td width="2">:</td><td><?php echo $namabulan; ?></td>
</tr>
<tr>
<td>TAHUN</td><td>:</td><td><?php echo $y; ?></td> -->
</tr>
</table>
<br><br><br>
<?php
$profile = ("SELECT a.no_cuci as no_transaksi,b.nama, b.alamat,a.tgl_pesan, c.waktu as jam, (SELECT cc.nama from tm_user cc where cc.user_id = a.id_user_pencuci) as pencuci, a.jumlah, a.total_bayar as totalbayar FROM tr_cuci a left join tm_user b on a.pelanggan_id = b.no_ktp
  left join tm_setwaktu c on a.id_jam = c.id
      where a.tgl_pesan = '".$now."' AND status ='3'");
$data = mysql_query($profile);
// print_r($data[''])
// echo $profile;
// die();

$profilesum = ("SELECT count(a.cuci_id) as tottransaksi, sum(a.jumlah) as jumlah, sum(a.total_bayar) as totbayar
FROM tr_cuci a where a.tgl_pesan = '".$now."' AND status ='3'");
$datatotala = mysql_query($profilesum);

// echo $datatotala;
// die();

$profiletransak = ("SELECT count(cuci_id) as tottransaksi, sum(jumlah) as ongkirtrans, sum(total_bayar) as berattrans
FROM tr_cuci a
where a.tgl_pesan = '".$now."' AND status ='3'");
$datatotaltransak = mysql_query($profiletransak);

echo $data['tgl_pesan'];
?>

<table align="center" width="100%" border="1">
<thead border="1">
<tr>
<td rowspan="2" align="center">#</td>
<td rowspan="2" align="center">Tanggal</td>
<td rowspan="2" align="center">Nama Pencuci</td>
<td rowspan="2" align="center">Jam</td>
<td rowspan="2" align="center">Nama Pelanggan</td>
<td rowspan="2" align="center">Alamat</td>
<td rowspan="2" align="center">Harga</td>
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


<br><br><br><br><br>
      </div>
      </div>
  </section>

  <br><br><br><br><br>
</div>

<div class="modal fade" id="myModalBerat" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Barang</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>