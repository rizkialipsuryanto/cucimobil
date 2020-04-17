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
          <form action="../cucimobil/cetakantara.php" method="post">
            <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                  <label>Dari Tanggal</label>
                  <div class="input-group mb-3">
                    <input type="date" class="form-control" placeholder="Dari Tanggal" id="daritgl" name="daritgl" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-calendar-alt"></span>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                  <label>Sampai Tanggal</label>
                  <div class="input-group mb-3">
                    <input type="date" class="form-control" placeholder="Sampai Tanggal" id="sampaitgl" name="sampaitgl" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-calendar-alt"></span>
                      </div>
                    </div>
                  </div>
              </div>                
              <!-- /.col -->
            </div>
            <div class="col-md-12">
                
                <div class="form-group">
                  <label>Pencuci</label>
                  <select class="form-control" id='pencuci' name="pencuci">
                           <option>ALL</option>
                            <?php 
                            $query = mysql_query("SELECT * FROM tm_user WHERE jenis_user = '2'");
                              while($row = mysql_fetch_array($query)){?>
                                 <option value="<?=$row['user_id']?>"><?=$row['nama']?></option>
                            <?php }?>
                         </select>
                </div>
                <!-- /.form-group -->
              </div>
              <br><br>
                  <button type="submit" class="btn btn-primary">Print</button>  
                  <!-- <a href="../jasatiki/cetak.php?bulan="></a> -->
            
          </form>
                
          </div>
          <!-- /.card-body -->
          
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