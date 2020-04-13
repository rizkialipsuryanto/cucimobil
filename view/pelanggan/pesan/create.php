 <?php 
   //query data pemesan
  $nik =   $_SESSION['SES_USER'];
  $querypemesan = "SELECT  
                    nama,
                    no_ktp,no_telp
                    FROM  tm_user  where no_ktp =  '$nik'";
  $hasilpemesan = mysql_query($querypemesan);
  $datapemesan  = mysql_fetch_array($hasilpemesan);

  $querypemesan = "SELECT 
                    status
                    FROM tr_cuci
                    where pelanggan_id = '".$nik."' and tgl_pesan = '".date('Y-m-d')."'";
  $hasilpemesan = mysql_query($querypemesan);
  $validpemesan  = mysql_fetch_array($hasilpemesan); 

  $querypemesan = "SELECT 
                    count(*) as jmlpesan
                    FROM tr_cuci_detail
                    where pelanggan_id = '".$nik."' and tgl_pesan = '".date('d/m/Y')."'";
  $hasilpemesan = mysql_query($querypemesan);
  $countpemesan  = mysql_fetch_array($hasilpemesan);
  // echo $countpemesan['jmlpesan'];

  $query = "SELECT max(no_cuci) as maxKode FROM tr_cuci";
  $hasil = mysql_query($query);
  $data  = mysql_fetch_array($hasil);
  $kodeBarang = $data['maxKode']; 
  $noUrut = (int) substr($kodeBarang, 4, 4); 
  $noUrut++; 
  $char = "TRS";
  $newID = $char . sprintf("%04s", $noUrut);

     $data = mysql_query("SELECT * FROM view_user WHERE jenis_user = '".$_SESSION['SES_JENISUSER']."' ");
    $gdiriket=mysql_fetch_array($data); 

    $data = mysql_query("SELECT * FROM tm_userdetailmobil  WHERE nik ='".$_SESSION['SES_USER']."'");
    $gmobil=mysql_fetch_array($data);

    //untuk validasi jumlah pesan per hari
    $tanggal = date('Y-m-d');
    $datacount = mysql_query("SELECT count(a.cuci_id) as count FROM tr_cuci a where pelanggan_id = '".$nik."' AND SUBSTRING(tgl_pesan, 1, 10) = '".$tanggal."'");
    $row   = mysql_fetch_array($datacount);
    $jumlah = $row['count'];
    // print_r($jumlah);
    // die();
 ?>
 
<div class="container-fluid">
    <br>
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <div class="callout callout-info">
                <?php if($jumlah>1){ ?>
              <h5><i class="fas fa-info"></i> Anda sudah melakukan pemesanan dihari ini, Silahkan lakukan pemesanan di lain hari</h5>
    </div>          
    <?php } else {?>
    <section class="content">
      <div class="container-fluid"> 
      <?php  if(empty($gdiriket['fotosatu'])||empty($gmobil)){?> 
              <div class="callout callout-info">
                  <h5>Info Penting!</h5> 
                  <p style="color: red;">Maaf anda harus melengkapi <a href="?halpelanggan=profile">Data Diri</a> dan <a href="">Data Kendaraan</a> agar dapat melakukan pemesanan pencucian. Terimakasih.</p>
          </div>
          <?php }else{?>
        <div class="card card-default"> 
          <div class="card-header">
            <h3 class="card-title">Transaksi</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <?php if($validpemesan['status'] >= '1'){ ?>
          <!-- <div class="callout callout-success">
              <h5><i class="fas fa-info"></i> Anda sudah melakukan transaksi dihari ini, Silahkan lakukan transaksi di lain hari</h5>
          </div>  -->
          <form action="../cucimobil/controller/site.php?fungsi=actioninsertakhirpesanan" method="post" enctype='multipart/form-data'> 
            <input type="hidden" name="nik"  id="nik" class="form-control" value="<?=$nik?>"  required> 
            
            <div class="row">
              <div class="col-md-12">
              <div><p style="padding:5px;background:#ffa64d;color: white;"><b>Data Pemesan.</b></p></div> 
                <div class="form-group">
                  <label>No. Transaksi</label>
                  <input type="text" name="txt_kode" class="form-control" readonly value="<?php echo $newID ; ?>" > 
                </div>  
                <div class="form-group">
                  <label>Tanggal Pesan</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div> 
                <div class="form-group">
                  <label>Jam Pesan</label>
                  <select name="jam"  id="jam" class="form-control"  required>  </select>  
                </div> 
                <div id="telInfo1" style="display:none;font-size: 20px;" >  
                  Info Kuota Pemesanan Cuci : 
                  <table>
                    <tr>
                      <td>Kuota : </td>
                      <td id="infokuotaa"></td>
                      <td>Sisa :</td>
                      <td id="sisakuota"> </td>
                    </tr>
                  </table> 
                </div>  
                <div class="form-group">
                      <label>Fasilitas</label>
                      <select name="fasilitas"  id="fasilitas" class="form-control"  required></select>   
                </div>  
              </div> 
            </div> 
            <br>

            <!--Muncul jika Kuota masih ada-->
            <div id="infovalidkuota" style="display:none">
            <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Info!</h5>
                  Maaf Kuota Jam Sudah Penuh. Pilih Jam yang lain.
                </div>
            </div>
            <div id="validkuota" style="display:none">
            <div><p style="padding:5px;background:#ffa64d;color: white;"><b>List Pesanan.</b></p></div>  
            <div class="card card-default"> 
                <table class="table table-striped" id="tabel">
                    <thead>
                        <tr>
                            <th>No.</th> 
                            <th>Nama</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
 
                    <tbody id="form-body">
                        <?php   $query = mysql_query("SELECT * FROM tm_userdetailmobil  
                                                                      where nik = '$nik'");
                                $no = 1;
                                while ($row = mysql_fetch_array($query)) {?>
                                <tr>
                                  <td><?php echo $no; ?></td> 
                                  <td align="left"><?php echo $row ['mobil']?></td> 
                                  <td width="2%"> 
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="checkboxPrimary2<?=$row['id']?>" name="cek[]" value=<?=@$row ['id']?>>
                                    <label for="checkboxPrimary2<?=$row['id']?>">
                                    </label>
                                  </div>
                                  </td>  
                               </tr>
                        <?php $no++;}?>
                    </tbody>
                </table> 
                <br>
                </div> 
                <!--Ini untuk validasi jika belum nambah pesnaan tombol belum tampil--> 
                <button type="submit" class="btn btn-primary" style="width: 100%">SIMPAN</button> 
                <!--Ini untuk validasi jika belum nambah pesnaan tombol belum tampil-->
                </div>
                <!--sampai sini-->
                </form>     
          <?php } else {?> 

          <form action="../cucimobil/controller/site.php?fungsi=actioninsertakhirpesanan" method="post" enctype='multipart/form-data'> 
            <input type="hidden" name="nik"  id="nik" class="form-control" value="<?=$nik?>"  required> 
            
            <div class="row">
              <div class="col-md-12">
              <div><p style="padding:5px;background:#ffa64d;color: white;"><b>Data Pemesan.</b></p></div> 
                <div class="form-group">
                  <label>No. Transaksi</label>
                  <input type="text" name="txt_kode" class="form-control" readonly value="<?php echo $newID ; ?>" > 
                </div>  
                <div class="form-group">
                  <label>Tanggal Pesan</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div> 
                <div class="form-group">
                  <label>Jam Pesan</label>
                  <select name="jam"  id="jam" class="form-control"  required>  </select>  
                </div> 
                <div id="telInfo1" style="display:none;font-size: 20px;" >  
                  Info Kuota Pemesanan Cuci : 
                  <table>
                    <tr>
                      <td>Kuota : </td>
                      <td id="infokuotaa"></td>
                      <td>Sisa :</td>
                      <td id="sisakuota"> </td>
                    </tr>
                  </table> 
                </div>  
                <div class="form-group">
                      <label>Fasilitas</label>
                      <select name="fasilitas"  id="fasilitas" class="form-control"  required></select>   
                </div>  
              </div> 
            </div> 
            <br>

            <!--Muncul jika Kuota masih ada-->
            <div id="infovalidkuota" style="display:none">
            <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Info!</h5>
                  Maaf Kuota Jam Sudah Penuh. Pilih Jam yang lain.
                </div>
            </div>
            <div id="validkuota" style="display:none">
            <div><p style="padding:5px;background:#ffa64d;color: white;"><b>List Pesanan.</b></p></div>  
            <div class="card card-default"> 
                <table class="table table-striped" id="tabel">
                    <thead>
                        <tr>
                            <th>No.</th> 
                            <th>Nama</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
 
                    <tbody id="form-body">
                        <?php   $query = mysql_query("SELECT *
                                                                      FROM tm_userdetailmobil  
                                                                      where nik = '$nik'");
                                $no = 1;
                                while ($row = mysql_fetch_array($query)) {?>
                                <tr>
                                  <td><?php echo $no; ?></td> 
                                  <td align="left"><?php echo $row ['mobil']?></td> 
                                  <td width="2%"> 
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="checkboxPrimary2<?=$row['id']?>" name="cek[]" value=<?=@$row ['id']?>>
                                    <label for="checkboxPrimary2<?=$row['id']?>">
                                    </label>
                                  </div>
                                  </td>  
                               </tr>
                        <?php $no++;}?>
                    </tbody>
                </table> 
                <br>
                </div> 
                <!--Ini untuk validasi jika belum nambah pesnaan tombol belum tampil--> 
                <button type="submit" class="btn btn-primary" style="width: 100%">SIMPAN</button> 
                <!--Ini untuk validasi jika belum nambah pesnaan tombol belum tampil-->
                </div>
                <!--sampai sini-->
                </form>
          <?php } ?>
        </div>
      </div>
      <?php } ?>
    </div> 
  </section>  
  <?php } ?>