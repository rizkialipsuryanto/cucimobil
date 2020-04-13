<div class="container-fluid">
  <div class="card-footer">
      <!-- <a href='?hal=createdatapelanggan'><i class='glyphicon glyphicon-trash icon-white'></i>Create</a> -->
  </div>
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Karyawan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="../cucimobil/controller/site.php?fungsi=actioninsertkurir" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="No KTP" id="ktp" name="ktp" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Tempat Lahir" id="tlahir" name="tlahir" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="date" class="form-control" placeholder="Tanggal Lahir" id="tgllahir" name="tgllahir" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-calendar-alt"></span>
                    </div>
                  </div>
                </div>
                
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                <label>Pilih Kecamatan</label>
                <select class="form-control select2" style="width: 100%;" id="kecamatan" name="kecamatan" required>
                    
                </select>
                </div>
                <div class="input-group mb-3">
                <label>Pilih Kelurahan</label>
                <select class="form-control select2" style="width: 100%;" id="kelurahan" name="kelurahan" required>
                            
                </select>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Kode Pos" id="kodepos" name="kodepos" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                <label>Pilih Jenis Kelamin</label>
                <select class="form-control select2" id="jk" name="jk" style="width: 100%;" required>
                            <option selected="selected" value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                </select>
                </div>
                <div class="input-group mb-3">
                <label>Pilih Agama</label>
                <select class="form-control select2" id="agama" name="agama" style="width: 100%;" required>
                    <option value="">Pilih Agama</option>
                      <?php 
                        $per = mysql_query("SELECT * FROM agama");
                        while ($pr=mysql_fetch_array($per)) { ?>
                    <option value="<?php echo $pr['id_agama'] ; ?>">
                      <?php echo $pr['agama'] ; ?></option>
                    <?php } ?>
                </select>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="No Telp" id="telp" name="telp" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-phone"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
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