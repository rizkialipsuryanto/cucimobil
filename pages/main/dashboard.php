<?php 
    $data = mysql_query("SELECT * FROM view_user WHERE no_ktp='".$_SESSION['SES_USER']."' ");
    $gdiriket=mysql_fetch_array($data); 

    $data = mysql_query("SELECT * FROM tm_userdetailmobil  WHERE nik ='".$_SESSION['SES_USER']."'");
    $gmobil=mysql_fetch_array($data); 
 ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b>Home</b></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <div class="col-lg-12 col-12">
        <?php if($_SESSION['SES_JENISUSER'] == 3){?>
          <?php  if(empty($gdiriket['fotosatu'])||empty($gmobil)){?> 
              <div class="callout callout-info">
                  <h5>Info Penting!</h5> 
                  <p style="color: red;">Maaf anda harus melengkapi <a href="?halpelanggan=profile">Data Diri</a> dan <a href="">Data Kendaraan</a> agar dapat melakukan pemesanan pencucian. Terimakasih.</p>
          </div>
          <?php }else{?>
            <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Terimkasih!</h5>
                  Anda telah melengkapi data diri sebagai pendukung pemesanan.
            </div>
          <?php }?>
        <?php }?>
            <div class="small-box bg-primary">
              <div class="inner">
              <br><br>
                <center><h1>Selamat datang di Aplikasi Cuci Mobil</h1></center>
                <br><br>
              </div>
            </div>
          </div>
          </div>