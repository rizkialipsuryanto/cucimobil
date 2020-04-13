<?php 
// echo $_SESSION['SES_USER'];
    $data = mysql_query("SELECT * FROM view_user WHERE  no_ktp='".$_SESSION['SES_USER']."' ");
    $gdiriket=mysql_fetch_array($data);  
 
    $data = mysql_query("SELECT * FROM tm_userdetailmobil WHERE nik ='".$_SESSION['SES_USER']."'");
    $gmobil=mysql_fetch_array($data); 
 ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
          <?php if($_SESSION['SES_JENISUSER'] == 3){?>
          <?php  if((empty($gdiriket['fotosatu']))||(empty($gmobil))){?> 
              <div class="callout callout-info">
                  <h5>Info Penting!</h5> 
                  <p style="color: red;">Silahkan Upload Foto Rumah Lokasi Pencucian dan Isikan List Kendaraan. Terimkasih.</p>
          </div>
          <?php }else{?>
            <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Terimkasih!</h5>
                  Anda telah melengkapi data diri sebagai pendukung pemesanan.
            </div>
          <?php }?>
        <?php }?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center"> 
                </div>

                <h3 class="profile-username text-center"><?=@$gdiriket['no_ktp']?></h3>

                <p class="text-muted text-center"><?=@$gdiriket['nama']?></p>
                <a href='#myModalBuktiBayar' id='custId' data-toggle='modal' class='btn btn-warning btn-block'  data-id="<?=@$gdiriket['no_ktp']?>"  ><b>Upload Foto Rumah</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
 
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active " href="#activity" data-toggle="tab">Data Diri</a></li>
                  <li class="nav-item"><a class="nav-link " href="#timeline" data-toggle="tab">List Kendaraan</a></li> 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active " id="activity"> 
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Detail Identitas</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <table class="table table-striped"> 
                          <tbody>
                            <tr>
                              <td>Alamat</td>
                              <td>:</td>
                              <td><?=@$gdiriket['alamat']?>, Kel. <?=@$gdiriket['kelurahan']?>, Kec. <?=@$gdiriket['kecamatan']?></td> 
                            </tr>    
                            <tr>
                              <td>No. Telp</td>
                              <td>:</td>
                              <td><?=@$gdiriket['no_telp']?></td> 
                            </tr> 
                            <tr>
                              <td>Foto</td>
                              <td>:</td>
                              <td><img src="static/<?=@$gdiriket['fotosatu']; ?>" width="150" height="100"> </td> 
                            </tr>  
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane " id="timeline">  
                     <div align="right">
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mediumModal"> <i class="fa fa-file"></i> Tambah </button> 
                    </div> <br>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px">No.</th>
                            <th>Mobil</th> 
                            <th style="width: 40px">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php  
                          $data = mysql_query("SELECT * FROM tm_userdetailmobil  where nik = '".$_SESSION['SES_USER']."'");
                          while($g=mysql_fetch_array($data)){
                                  @$no++;
                          ?>
                              <tr>
                                <td><?=@$no; ?></td>
                                <td><?=@$g['mobil'];?></td> 
                                <td> </td> 
                              </tr>
                              <?php }  ?> 
                        </tbody>
                      </table>
                  </div>
                  <!-- /.tab-pane -->

                   
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

<!--Ini modal untuk tambah jenis mobil --->
 <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content"> 
                            <div class="modal-body">
                                 <form action="../cucimobil/controller/site.php?fungsi=actioninsertkendaraan" method="post" class="form-horizontal" enctype="multipart/form-data">   
                                  <div><p style="padding:5px;background:#ffa64d;color: white;"><b>Form Input Data Kendaraan.</b></p></div> 
                                  <input type="hidden" name="nik"  id="nik" class="form-control" value="<?=$_SESSION['SES_USER']?>"  required>   
                                  <div class="row form-group">
                                  <div class="col col-md-3"><label for="hf-password" class=" form-control-label"> Nama Mobil</label></div>  
                                      <div class="col-12 col-md-9">
                                       <input type="text" name="mobil"  id="mobil" class="form-control"  required> 
                                      </div>
                                  </div>
                            </div>

                            <div class="modal-footer"> 
                                 <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan </button>
                            </div>
                         </form>
                        </div>
                    </div>
                </div>

<!--Ini modal untuk tambah jenis mobil --->


<!--Ini modal untuk Upload file-->
<div class="modal fade" id="myModalBuktiBayar" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"> 
                    <h4 class="modal-title">Upload</h4>
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
<!--Ini modal untuk Upload file-->