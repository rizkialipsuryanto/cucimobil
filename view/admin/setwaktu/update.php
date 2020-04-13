<?php 
    // echo $_GET['user_id'];
    $query = mysql_query("SELECT a.* from tm_setwaktu a where a.id = '".$_GET['id']."'");
    $row   = mysql_fetch_array($query);

?>
<div class="container-fluid">
  <div class="card-footer"> 
  </div>
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Input Setting Waktu Pencucian</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="../cucimobil/controller/site.php?fungsi=actionupdatesetwaktu" method="post" class="form-horizontal">
                <div class="input-group mb-3">
                  <label for="inputEmail3" class="col-sm-2 control-label">Range Waktu</label>
                  <input type="hidden" class="form-control" placeholder="id" id="id" name="id" value="<?php echo $row['id']; ?>" required>  
                  <input type="text" class="form-control" placeholder="Cth. 08.00 - 10.00" id="range" name="range" value="<?php echo $row['waktu']; ?>" required>  
                </div>
                <div class="input-group mb-3">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kuota</label>
                  <input type="text" class="form-control" placeholder="Kuota" id="kuota" name="kuota" value="<?php echo $row['kuota']; ?>" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
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