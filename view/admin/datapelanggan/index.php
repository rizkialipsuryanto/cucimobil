<?php 
    $data = mysql_query("SELECT * FROM tm_user a where a.jenis_user = '3'");
 ?>
  <div class="container-fluid">
  <div class="card-footer">
      <a href='?hal=createdatapelanggan'><u><i class='glyphicon glyphicon-trash icon-white'></i>Tambah Data Pelanggan</u></a>
  </div>
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Pelanggan</h3>
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
                  <th>Foto Rumah</th>
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
                      <td><?php echo $g['no_ktp']?></td>
                      <td><?php echo $g['nama']; ?></td>
                      <td><?php echo $g['alamat']; ?></td>
                      <td><?php echo $g['no_telp']; ?></td>
                      <td><img src="static/<?=@$g['fotosatu']; ?>" width="150" height="100"></td>
                      
                      <td class="center">
                        <a href='?hal=updatedatapelanggan&user_id=<?php echo $g['user_id'] ?>'><i class='glyphicon glyphicon-trash icon-white'></i>Edit</a>
                        <!-- <a href='?hal=updatedatapelanggan&user_id=<?php echo $g['user_id'] ?>'><i class='glyphicon glyphicon-trash icon-white'></i>Hapus</a> -->
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