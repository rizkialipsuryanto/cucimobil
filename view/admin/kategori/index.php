<?php 
    $data = mysql_query("SELECT * FROM tm_user a where a.jenis_user = '2'");
 ?>
  <div class="container-fluid">
  <div class="card-footer">
      <a href='?hal=createdatapencuci'><u><i class='glyphicon glyphicon-trash icon-white'></i>Tambah Data Karyawan</u></a>
  </div>
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Karyawan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5px">#</th>
                  <th>KTP</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No telp</th>
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
                      <td><?php echo $g['no_ktp']?></td>
                      <td><?php echo $g['nama']; ?></td>
                      <td><?php echo $g['alamat']; ?></td>
                      <td><?php echo $g['no_telp']; ?></td>
                      
                      <td class="center">
                        <a href='?hal=updatedatakurir&user_id=<?php echo $g['user_id'] ?>'><i class='glyphicon glyphicon-trash icon-white'></i>Update</a>
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