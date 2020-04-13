<?php 
    // echo $_GET['user_id'];
    $query = mysql_query("SELECT a.*, b.agama as agama from tm_user a left join agama b on a.agama_id = b.id_agama where a.user_id = '".$_GET['user_id']."'");
    $row   = mysql_fetch_array($query);

    // membuat data jurusan menjadi dinamis dalam bentuk array
    $jk    = array('Laki-laki','Perempuan');

    $agama_id = $row['agama_id'];
?>
<div class="container-fluid">
  <div class="card-footer">
  </div>
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Pelanggan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="../cucimobil/controller/site.php?fungsi=actionupdatepelanggan" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="No KTP" id="ktp" name="ktp" value="<?php echo $row['no_ktp']; ?>" required>
                  <input type="hidden" class="form-control" placeholder="user" id="user" name="user" value="<?php echo $_GET['user_id']; ?>" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Tempat Lahir" id="tlahir" name="tlahir" value="<?php echo $row['tempat_lahir']; ?>" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="date" class="form-control" placeholder="Tanggal Lahir" id="tgllahir" name="tgllahir" value="<?php echo $row['tanggal_lahir']; ?>" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-calendar-alt"></span>
                    </div>
                  </div>
                </div>
                
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" required>
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
                <label>Kode Pos</label>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Kode Pos" id="kodepos" name="kodepos" value="<?php echo $row['kode_pos']; ?>" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                <label>Pilih Jenis Kelamin <?php echo $row['jenis_kelamin_id'];?></label>
                <select class="form-control select2" id="jk" name="jk" style="width: 100%;" required>
                            <?php
                            foreach ($jk as $j){
                                echo "<option value='$j' ";
                                echo $row['jenis_kelamin_id']==$j?'selected="selected"':'';
                                echo ">$j</option>";
                            }
                            ?>
                        </select>
                </select>
                </div>
                <div class="input-group mb-3">
                <label>Pilih Agama</label>
                <select class="form-control select2" id="agama" name="agama" style="width: 100%;" required>
                    <option value="">Pilih Agama</option>
                      <?php 
                        $per = mysql_query("SELECT * FROM agama");
                        while ($pr=mysql_fetch_array($per)) { ?>
                    <option value="<?php echo $pr['id_agama'] ; ?>" 
                      <?php if($agama_id== $pr['id_agama']) echo 'selected="selected"'; ?> >
                      <?php echo $pr['agama'] ; ?></option>
                    <?php } ?>
                </select>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="No Telp" id="telp" name="telp" value="<?php echo $row['no_telp']; ?>" required>
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