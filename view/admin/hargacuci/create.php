<div class="container-fluid">
  <div class="card-footer"> 
  </div>
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Input Harga Pencucian</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="../cucimobil/controller/site.php?fungsi=actioninserhargacuci" method="post" class="form-horizontal">
                <div class="input-group mb-3">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis</label>
                  <input type="text" class="form-control" placeholder="Cth. Cuci" id="jenis" name="jenis" required>  
                </div>
                <div class="input-group mb-3">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Cuci</label>
                  <input type="text" class="form-control" placeholder="Kuota" id="harga" name="harga"  required> 
                </div> 
                
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan Data</button>
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