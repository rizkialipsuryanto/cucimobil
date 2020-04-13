<!-- Content Header (Page header) -->
<?php 
    $user_id = $_SESSION['SES_ID'];
    $data = mysql_query("SELECT a.*, b.nama FROM tr_cuci a left join tm_user b on a.pelanggan_id = b.user_id");
 ?>
    <!-- /.content-header -->

  <div class="container-fluid">
  <br>

      <!-- <a href="?hal=dashboard"><u><i class='glyphicon glyphicon-trash icon-white'></i>Create</u></a> -->
  
  <br>
  <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Data Pesanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                <tr>
                  <th width="5px">#</th>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Nama Pemesan</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>Total Mobil</th>
                  <th>Pencuci</th>
                  <th>Status</th>
                  <th></th>
                  <?php 
                  while($g=mysql_fetch_array($data)){
                          @$no++;
                  ?>
                  
                </tr>
                </thead>
                <tbody>
                
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g['cuci_id']?></td>
                      <td><?php echo $g['tgl_input']?></td>
                      <td><?php echo $g['nama']?></td>
                      <td><?php echo $g['alamat_lengkap']?></td>
                      <td><?php echo $g['no_hp']; ?></td>
                      <td><?php echo $g['jumlah']; ?></td>
                      <td><?php echo $g['id_user_pencuci']; ?></td>
                      
                      <td class="center">
                      <?php 
                          if($g['status']==1){
                            echo "Belum dibaca";
                          }
                          if($g['status']==2){
                            echo "Sedang Dicuci";
                          }
                          if($g['status']==3){
                            echo "Selesai";
                          }
                          
                       ?>
                       <span class="badge bg-primary"><?php echo $status; ?></span>
                        <!-- <a href=''><i class='glyphicon glyphicon-trash icon-white'></i></a> -->
                      </td>
                      <?php if($g['status']==1) {?>
                          <td><a href='?hal=updatedatapesanan&cuci_id=<?php echo $g['cuci_id'] ?>'><i class='glyphicon glyphicon-trash icon-white'>update</i></a></td>
                      <?php } ?>
                      
                    </tr>
                    <?php
                    }  
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>