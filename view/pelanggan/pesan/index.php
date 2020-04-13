<?php 
    $user_id = $_SESSION['SES_USER'];
    $data = mysql_query("SELECT 
            a.no_cuci,
            a.pelanggan_id,
            a.tgl_pesan,
            a.status, 
            c.alamat,
            c.no_telp
             
            FROM tr_cuci a  
            JOIN tm_user c ON a.pelanggan_id = c.no_ktp 
where a.pelanggan_id = '".$user_id."'"); 
    // $tb_act  = isset($_POST['tb_act']) ? $_POST['tb_act'] : NULL;

 ?>
<div class="container-fluid">
  <div class="card-footer">
      <!-- <a href="?halpelanggan=createpesan"><button type="submit" class="btn btn-primary">Create</button></a> -->
  </div>
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data History</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5px">#</th>
                  <th>No Cuci</th>
                  <th>Tgl Input</th>
                  <th>Alamat Lengkap</th>
                  <th>No Hp</th>  
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                while($g=mysql_fetch_array($data)){
                        @$no++;
                ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g['no_cuci']?></td>
                      <td><?php echo $g['tgl_pesan']; ?></td>
                      <td><?php echo $g['alamat']?></td>
                      <td><?php echo $g['no_telp']?></td>   
                      <td class="center">
                      <?php 
                          if($g['status']==1){
                            echo "<large class='label pull-right bg-red'>Proses Verifikasi</large>";
                          }
                          if($g['status']==2){
                            echo "Menunggu";
                          }
                          if($g['status']==3){
                            echo "Selesai";
                          }
                       ?>
                      </td>
                      <td>
                         <a href='#myModalLoaddetail' id='custId' data-toggle='modal' data-id="<?=$g['no_cuci']?>" class="btn btn-primary btn-sm"> <i class="fa fa-list"></i> Detail </a>
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
</div>


<div class="modal fade" id="myModalLoaddetail" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content"> 
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
 