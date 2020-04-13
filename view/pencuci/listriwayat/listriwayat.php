<!-- Content Header (Page header) -->
<?php 

    if(isset($_GET['tanggal'])){
      $val = "value='".$_GET['tanggal']."'"; 
      $addval = "AND tgl_pesan='".$_GET['tanggal']."'";
    }
    $user_id = $_SESSION['SES_USER'];
    $data = mysql_query("SELECT  
            a.tgl_pesan, 
			      a.id_user_pencuci,
            a.no_cuci,
            a.jumlah,
            a.total_bayar
             
            FROM tr_cuci a  
            JOIN tm_user c ON a.pelanggan_id = c.no_ktp 
            JOIN tm_setwaktu d ON a.id_jam = d.id
            WHERE status = '3' AND a.id_user_pencuci ='".$_SESSION['SES_ID']."' $addval
            ");  
 ?>
    <!-- /.content-header -->

  <div class="container-fluid"> 
  <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Detail Data Pesanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body"> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                <tr>
                  <th width="5px">#</th> 
                  <th>No Transaksi</th> 
                  <th>Tgl Transaksi</th> 
                  <th>Jumlah Mobil</th> 
                  <th>Total Bayar</th>  
                  <?php 
                  while($g=mysql_fetch_array($data)){
                          @$no++;
                  ?>
                  
                </tr>
                </thead>
                <tbody>
                
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g['no_cuci']?></td> 
                      <td><?php echo $g['tgl_pesan']?></td> 
                      <td><?php echo $g['jumlah']?></td> 
                      <td><?php echo $g['total_bayar']?></td> 
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>