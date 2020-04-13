<?php 

    $query = mysql_query("SELECT 
                          a.*, 
                          b.nama,
                          b.alamat,
                          b.no_telp 
                          from tr_cuci a   
                          join tm_user b on a.pelanggan_id = b.no_ktp 
                          where a.no_cuci = '".$_GET['cuci_id']."'");
    $row   = mysql_fetch_array($query);

    $no_cuci = $row['no_cuci'];  
    $data = mysql_query("SELECT  b.mobil,c.merk,d.kategori,a.no_cuci,a.cuci_detail_id 
                          FROM tr_cuci_detail a 
                          JOIN tm_mobil b ON a.mobil_id = b.mobil_id
                          JOIN tm_merk c ON b.merk_id = c.merk_id
                          JOIN tm_kategori d ON c.kategori_id=d.kategori_id 
                          where a.no_cuci = '".$no_cuci."'");

    // $agama_id = $row['agama_id'];
?>
<div class="container-fluid">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Validasi Pesanan</h1>
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
          
          <form action="../cucimobil/controller/site.php?fungsi=actionstatus" method="post"> 
            <input type="hidden" name="cuciid" id="cuciid" value="<?=$_GET['cuci_id']?>">
            <div class="row">
              <div class="col-md-4">
                <div class="card card-secondary">
                      <div class="card-header">
                        <h3 class="card-title">Data Pemesan</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <table>
                            <tr>
                              <td> Nama </td>
                              <td>  : </td>
                              <td> <?php echo $row['nama']?> </td>
                            </tr>
                            <tr>
                              <td>  Alamat </td>
                              <td> : </td>
                              <td> <?=@$row['alamat']?> </td>
                            </tr>
                            <tr>
                              <td> No. Telp </td>
                              <td>  : </td>
                              <td> <?=@$row['no_telp']?></td>
                            </tr>
                          </table>
                      </div>
                </div> 
                <div class="form-group">
                  <label>Pencuci</label>
                  <select class="form-control select2" id="pencuci" name="pencuci" style="width: 100%;" required>
                      <option value="">Pilih Pencuci</option>
                        <?php 
                          $per = mysql_query("SELECT * FROM tm_user where jenis_user = '2'");
                          while ($pr=mysql_fetch_array($per)) { ?>
                      <option value="<?php echo $pr['no_ktp'] ; ?>">
                        <?php echo $pr['nama'] ; ?></option>
                      <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-8">
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
                                      <th>Nama Mobil</th> 
                                  </tr>
                              </thead>

                              <tbody>
                                <?php 
                                while($g=mysql_fetch_array($data)){
                                        @$no++;
                                ?>
                                    <tr>
                                      <td><?php echo $no; ?></td>
                                      <td><?php echo $g['mobil'];?></td> 
                                    </tr>
                                    <?php
                                    }  
                                    ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <!-- /.col -->
              <!-- /.col -->
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