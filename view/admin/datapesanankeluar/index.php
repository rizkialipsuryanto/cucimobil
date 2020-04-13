<!-- Content Header (Page header) -->
<?php 

    if(isset($_GET['tanggal'])){
      $val = "value='".$_GET['tanggal']."'"; 
      $addval = "AND tgl_pesan='".$_GET['tanggal']."'";
    }
    $user_id = $_SESSION['SES_USER'];
    $data = mysql_query("SELECT 
            a.no_cuci,
            a.pelanggan_id,
            a.tgl_pesan,
            a.status, 
            c.alamat,
            c.no_telp,
            c.nama,
            a.cuci_id,
            a.id_user_pencuci,
            d.waktu
             
            FROM tr_cuci a  
            JOIN tm_user c ON a.pelanggan_id = c.no_ktp 
            JOIN tm_setwaktu d ON a.id_jam = d.id
            WHERE status = '2' $addval
            ");  
 ?>
    <!-- /.content-header -->

  <div class="container-fluid"> 
  <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Data Pesanan Keluar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Filter Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Enter email" <?=$val?>>
                  </div> 
                </div> 
                <div class="card-footer">
                  <button type="button" name="submit" class="btn btn-primary" onclick="jvPreviewkeluar();">Cari Data</button >
                </div>
              </form><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                <tr>
                  <th width="5px">#</th>
                  <th>No Cuci</th>
                  <th>Tgl Pesan</th>
                  <th>Nama Pemesan</th>
                  <th>Waktu Pesan</th> 
                  <th>Status</th>
                  <th>Pencuci</th>
                  <!-- <th>Aksi</th> -->
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
                      <td><?php echo $g['nama']?></td> 
                      <td><?php echo $g['waktu']?></td> 
                      
                      <td class="center">
                      <?php 
                          if($g['status']==1){
                            echo "Belum dibaca";
                          }
                          if($g['status']==2){
                            echo "<span class='badge bg-warning'>Sedang Dicuci</span>";
                          }
                          if($g['status']==3){
                            echo "Selesai";
                          }
                          
                       ?>
                       <span class="badge bg-primary"><?php echo $status; ?></span>
                        <!-- <a href=''><i class='glyphicon glyphicon-trash icon-white'></i></a> -->
                      </td> 
                      <td>  
                         <select class="form-control" id='kategori<?=@$g['no_cuci']?>'  onchange="myFunctions('<?=@$g['no_cuci']?>')" disabled>
                           <option>-Pilih Pencuci</option>
                            <?php 
                            $query = mysql_query("SELECT * FROM tm_user WHERE jenis_user = '2'");
                              while($row = mysql_fetch_array($query)){?>
                                 <option value="<?=$row['user_id']?>" <?php if($g['id_user_pencuci']==$row['user_id']){?> selected='selected'<?php }?>><?=$row['nama']?></option>
                            <?php }?>
                         </select>
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