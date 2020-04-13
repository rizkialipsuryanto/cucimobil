<?php 
    $user_id = $_SESSION['SES_USER'];
    $data = mysql_query("SELECT a.*, b.no_cuci, b.tgl_pesan 
          FROM t_chat a left join tr_cuci b on a.cuci_id = b.cuci_id  
            JOIN tm_user c ON b.pelanggan_id = c.no_ktp 
where b.pelanggan_id = '".$user_id."'"); 
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
              <h3 class="card-title">Kotak Masuk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5px">#</th>
                  <th>No Cuci</th>
                  <th>Tgl Pesan</th>
                  <th>Keterangan</th>
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
                      <td><?php echo $g['chat']?></td>
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
 