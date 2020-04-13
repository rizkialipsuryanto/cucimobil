<?php 

    $query = mysql_query("SELECT a.*, b.nama from tr_cuci a left join tm_user b on a.pelanggan_id = b.user_id where cuci_id = '".$_GET['cuci_id']."'");
    $row   = mysql_fetch_array($query);

    $no_cuci = $row['no_cuci'];
    // if($row['status'] == '1'){
    //     $queryupdate = mysql_query("UPDATE tr_pesanan SET status = '2' where pesanan_id = '".$_GET['pesanan_id']."'");  
    // }
    // membuat data jurusan menjadi dinamis dalam bentuk array
    $jk    = array('Laki-laki','Perempuan');

    $data = mysql_query("SELECT a.* FROM tr_cuci_detail a where a.no_cuci = '".$no_cuci."'");

    // $agama_id = $row['agama_id'];
?>
<div class="container-fluid">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Isi Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create </li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- <a href="?hal=createpelangganpesan"><button type="submit" class="btn btn-primary">Create</button></a> -->
      
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Form</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <?php if($row['status'] == 1){?>
          <form action="../cucimobil/controller/site.php?fungsi=actionstatus" method="post">
          <?php } ?>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Penerima</label>
                  <input type="text" class="form-control" placeholder="Penerima" name="penerima" required value="<?php echo $row['nama']; ?>">
                  <input type="hidden" class="form-control" placeholder="user_id" name="user_id" required value="<?php echo $_SESSION['SES_ID']; ?>">
                  <input type="hidden" class="form-control" placeholder="cuci_id" name="cuci_id" required value="<?php echo $row['cuci_id']; ?>">
                  <input type="hidden" class="form-control" placeholder="no_cuci" name="no_cuci" required value="<?php echo $row['no_cuci']; ?>">
                  <input type="hidden" class="form-control" placeholder="status" name="status" required value="<?php echo $row['status']; ?>">
                </div>
                <div class="form-group">
                  <label>Alamat Lengkap</label>
                  <input type="text" class="form-control" placeholder="Alamat Penerima" name="alamat_penerima" value="<?php echo $row['alamat_lengkap']; ?>" required>
                  <label style="color: red">*isi alamat lengkap untuk memudahkan pencuci mencari lokasi</label>
                </div>
                <div class="form-group">
                  <label>No Telp</label>
                  <input type="text" class="form-control" placeholder="No Telepon" name="telp" value="<?php echo $row['no_hp']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Pencuci</label>
                  <select class="form-control select2" id="pencuci" name="pencuci" style="width: 100%;" required>
                      <option value="">Pilih Pencuci</option>
                        <?php 
                          $per = mysql_query("SELECT * FROM tm_user where jenis_user = '2'");
                          while ($pr=mysql_fetch_array($per)) { ?>
                      <option value="<?php echo $pr['user_id'] ; ?>">
                        <?php echo $pr['nama'] ; ?></option>
                      <?php } ?>
                  </select>
                </div>
              </div>
              <!-- /.col -->
              <!-- /.col -->
            </div>
            <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Data Mobil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <!-- <form action="../jasatiki/controller/site.php?fungsi=actioninsertpesananberat" method="post"> -->
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <?php if($row['status'] == 4) {?>
                            <th>Berat</th>
                            <th></th>
                            <?php } ?>
                        </tr>
                    </thead>

                    <tbody>
                      <?php 
                      while($g=mysql_fetch_array($data)){
                              @$no++;
                      ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $g['nama_barang'];?></td>
                            <?php if($row['status'] == 4) {?>
                            <td><?php echo $g['berat_barang_kg'];?></td>
                            <?php echo "<td><a href='#myModalBerat' id='custId' data-toggle='modal' data-id=".$g['pesanan_detail_id'].">Detail</a></td>"; ?>
                            <?php } ?>
                          </tr>
                          <?php
                          }  
                          ?>
                    </tbody>
                </table>
            </div>
            </div>
            <?php 
              if($row['status'] == '1'){?>
                  <button type="submit" class="btn btn-success">Proses Cuci</button>  
              <?php }
             ?>
            
          </form>
                
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div>
      </div>
  </section>
</div>

<div class="modal fade" id="myModalBerat" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Barang</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>