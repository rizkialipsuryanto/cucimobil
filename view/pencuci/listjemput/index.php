<?php 
    $user_id = $_SESSION['SES_ID'];
    $data= mysql_query("SELECT 
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
            WHERE a.id_user_pencuci = '".$user_id."' AND status = '2' ");  

 ?>
    <!-- /.content-header -->

  <div class="container-fluid">
  <br>

      <!-- <a href="?hal=dashboard"><u><i class='glyphicon glyphicon-trash icon-white'></i>Create</u></a> -->
  
  <br>
  <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Cuci</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5px">#</th>
                  <th>No Cuci</th>
                  <th>Tgl Pesan</th>
                  <th>Waktu Cuci</th>
                  <th>Nama Pemesan</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>Total Mobil</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                while($g=mysql_fetch_array($data)){
                        @$no++;
                ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                     <td><?php echo $g['cuci_id']?></td>
                      <td><?php echo $g['tgl_pesan']?></td>
                      <td><?php echo $g['waktu']?></td>
                      <td><?php echo $g['nama']?></td>
                      <td><?php echo $g['alamat']?></td>
                      <td><?php echo $g['no_telp']; ?></td>
                      <td><?php 
                            if(!empty($g['id_user_pencuci'])){
                               $datapencuci = mysql_query("SELECT count(*) as jmlmobil FROM  tr_cuci_detail WHERE no_cuci = '".$g['no_cuci']."' "); 
                               $gpencuci=mysql_fetch_array($datapencuci);
                               echo $gpencuci['jmlmobil'];
                            }
                         ?> Mobil
                      </td> 
                      <td class="center">
                      <?php 
                          if($g['status']==1){
                            $status = "Belum dibaca";
                          }
                          if($g['status']==2){
                            $status = "Menunggu";
                          }
                          if($g['status']==3){
                            $status = "Selesai";
                          }
                          
                       ?>
                       <span class="badge bg-warning"><?php echo $status; ?></span> 
                      </td>
                      <td>
                          <?php if($g['status']==2){?>

                            <a href='?halpencuci=updatedatapesanan&cuci_id=<?=$g['no_cuci'] ?>'><i class='glyphicon glyphicon-trash icon-white'>Lihat</i></a> 
                         <?php }?>
                      </td>
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