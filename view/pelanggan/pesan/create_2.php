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
                    where pelanggan_id = '".$nik."' and tgl_pesan = '".date('d/m/Y')."'";
  $hasilpemesan = mysql_query($querypemesan);
  $validpemesan  = mysql_fetch_array($hasilpemesan);
  echo $validpemesan['status'];


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
 ?>
<div class="container-fluid">
    <br>
    <!-- Content Header (Page header) -->
    <?php if($jumlah>0){ ?>
    <div class="callout callout-success">
                
              <h5><i class="fas fa-info"></i> Anda sudah melakukan transaksi dihari ini, Silahkan lakukan transaksi di lain hari</h5>
    </div>          
    <?php } else {?> 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- <a href="?hal=createpelangganpesan"><button type="submit" class="btn btn-primary">Create</button></a> -->
      
        <!-- SELECT2 EXAMPLE -->
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
          <form action="../cucimobil/controller/site.php?fungsi=actioninsertakhirpesanan" method="post" enctype='multipart/form-data'> 
            <input type="text" name="nik"  id="nik" class="form-control" value="<?=$nik?>"  required> 
            <input type="text" name="txt_kode" class="form-control col-md-7 col-xs-12" readonly value="<?php echo $newID ; ?>">
            <div class="row">
              <div class="col-md-12">
              <div><p style="padding:5px;background:#ffa64d;color: white;"><b>Data Pemesan.</b></p></div>  
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" placeholder="Alamat Penerima" name="nama" id="nama" value="<?= $datapemesan['nama'];?>" required readonly> 
                </div> 
                <div class="form-group">
                  <label>No Telp</label>
                  <input type="text" class="form-control" placeholder="No Telepon" name="telp" value="<?= $datapemesan['no_telp'];?>"  required readonly>
                </div> 
              </div> 
            </div> 

            <div><p style="padding:5px;background:#ffa64d;color: white;"><b>Detail Pesanan.</b></p></div>  
            <div class="card card-default">
              <div align="right">
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mediumModal"> <i class="fa fa-file"></i> Tambah Pesanan</button> 
              </div> 
                <table class="table table-striped" id="tabel">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kategori Mobil</th>
                            <th>Merk</th>
                            <th>Nama</th>
                            <th>Opsi Form</th>
                        </tr>
                    </thead>
 
                    <tbody id="form-body">
                        <?php   $query = mysql_query("SELECT  b.mobil,c.merk,d.kategori,a.no_cuci,a.cuci_detail_id 
                                                                      FROM tr_cuci_detail a 
                                                                      JOIN tm_mobil b ON a.mobil_id = b.mobil_id
                                                                      JOIN tm_merk c ON b.merk_id = c.merk_id
                                                                      JOIN tm_kategori d ON c.kategori_id=d.kategori_id 
                                                                       where a.pelanggan_id = '$nik' and tgl_pesan ='".date('d/m/Y')."'");
                                $no = 1;
                                while ($row = mysql_fetch_array($query)) {?>
                                <tr>
                                 <td><?php echo $no; ?></td> 
                                 <td><?php echo $row ['kategori']?></td>
                                                        <td><?php echo $row ['merk']?></td>
                                                        <td><?php echo $row ['mobil']?></td>    
                                                        <td> 
                                                          <a href="hapus.php?no=<?php echo $row['cuci_detail_id'];?>" onclick="return confirm('Anda yakin akan menghapus data?')" class="btn btn-danger " ><span class="ti ti-trash" aria-hidden="true"></span> Hapus </a>
                                                        </td>  
                               </tr>
                        <?php $no++;}?>
                    </tbody>
                </table> 
                <br>
                <br>
                </div>
                <!--Ini untuk validasi jika belum nambah pesnaan tombol belum tampil-->
                <?php if($countpemesan['jmlpesan'] >= 1){?>
                <button type="submit" class="btn btn-primary" style="width: 100%">SIMPAN</button>
                <?php }?>
                <!--Ini untuk validasi jika belum nambah pesnaan tombol belum tampil-->
                </form>
                 
        </div>
      </div>
  </section>
  <?php } ?>
             <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Form Pemesanan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <form action="../cucimobil/controller/site.php?fungsi=actioninsertdetailpesanan" method="post" class="form-horizontal" enctype="multipart/form-data">   
                                  <div><p style="padding:5px;background:#ffa64d;color: white;"><b>Detail Pesanan.</b></p></div> 
                                  <input type="hidden" name="nik"  id="nik" class="form-control" value="<?=$nik?>"  required> 
                                  <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Kategori</label></div>
                                      <div class="col-12 col-md-9"> 
                                        <select name="kategori"  id="kategori" class="form-control"  required> 
                                        </select> 
                                       
                                       </div>
                                  </div> 


                                  <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Merk</label></div>
                                      <div class="col-12 col-md-9">
                                         <select name="merk"  id="merk" class="form-control"  required> 
                                        </select> 
                                      </div>
                                  </div>  
                                  <div class="row form-group">
                                  <div class="col col-md-3"><label for="hf-password" class=" form-control-label"> Nama Mobil</label></div>  
                                      <div class="col-12 col-md-9">
                                        <select name="nmmobil"  id="nmmobil" class="form-control"  required> 
                                        </select> 
                                      </div>
                                  </div>
                            </div>

                            <div class="modal-footer"> 
                                 <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan </button>
                            </div>
                         </form>
                        </div>
                    </div>
                </div>
