  <!-- Content Header (Page header) -->
<?php 

    if(isset($_GET['tanggal'])){
      $val = "value='".$_GET['tanggal']."'"; 
      $valsampai = "value='".$_GET['sampaitgl']."'"; 
      $addval = "AND tgl_pesan='".$_GET['tanggal']."'";
      $addval2 = "AND tgl_pesan>='".$_GET['tanggal']."' AND tgl_pesan <= '".$_GET['sampaitgl']."'";
    }
    $user_id = $_SESSION['SES_USER'];
    if($_GET['sampaitgl'] == '')
    {
        $data = mysql_query("SELECT  
            a.tgl_pesan, 
			      a.id_user_pencuci,
            (SELECT
                count(*)
                FROM tr_cuci 
                WHERE tgl_pesan = 'a.tgl_pesan') as sa 
             
            FROM tr_cuci a  
            JOIN tm_user c ON a.pelanggan_id = c.no_ktp 
            JOIN tm_setwaktu d ON a.id_jam = d.id
            WHERE status = '3' AND a.id_user_pencuci ='".$_SESSION['SES_ID']."' $addval
            ");  
    }
    else{
      $data = mysql_query("SELECT  
            a.tgl_pesan, 
            a.id_user_pencuci,
            (SELECT
                count(*)
                FROM tr_cuci 
                WHERE tgl_pesan = 'a.tgl_pesan') as sa 
             
            FROM tr_cuci a  
            JOIN tm_user c ON a.pelanggan_id = c.no_ktp 
            JOIN tm_setwaktu d ON a.id_jam = d.id
            WHERE status = '3' AND a.id_user_pencuci ='".$_SESSION['SES_ID']."' $addval2
            ");  
    }
 ?>
    <!-- /.content-header -->

  <div class="container-fluid"> 
  <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Data Riwayat Cuci</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form">
                <div class="card-body">
                <label for="exampleInputEmail1">Filter Tanggal</label>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Dari Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Enter email" <?=$val?>>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sampai Tanggal</label>
                    <input type="date" class="form-control" id="sampaitgl" name="sampaitgl" placeholder="Sampai Tanggal" <?=$valsampai?>>
                  </div> 
                </div> 
                <div class="card-footer">
                  <button type="button" name="submit" class="btn btn-primary" onclick="jvPreviewjemput();">Cari Data</button >
                </div>
              </form><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                <tr>
                  <th width="5px">#</th> 
                  <th>Tgl Transaksi</th> 
                  <th>Aksi</th>
                  <?php 
                  while($g=mysql_fetch_array($data)){
                          @$no++;
                  ?>
                  
                </tr>
                </thead>
                <tbody>
                
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g['tgl_pesan']?></td> 
                      <td>   
                      	<a href="?halpencuci=listriwayatjemput&tanggal=<?=@$g['tgl_pesan'];?>" class="btn btn-primary btn-sm"> <i class="fa fa-list"></i> Detail </a>
                      </td>  
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>