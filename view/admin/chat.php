<?php 
    $cuci_id = $_GET['cuci_id'];
 ?>

<div class="container-fluid">
  <div class="card-footer">
      <!-- <a href='?hal=createdatapelanggan'><i class='glyphicon glyphicon-trash icon-white'></i>Create</a> -->
  </div>
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Kirim Keterangan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="../cucimobil/controller/site.php?fungsi=actioninsertchat" method="post">
                <div class="input-group mb-3">
                  <input type="hidden" class="form-control" placeholder="ID" id="cuci_id" name="cuci_id" value="<?php echo $cuci_id; ?>" required>
                  
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Keterangan" id="keterangan" name="keterangan" required>
                  
                </div>
                
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>