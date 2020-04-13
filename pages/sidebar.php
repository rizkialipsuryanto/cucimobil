<aside class="main-sidebar sidebar-blue-primary elevation-4">
 
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['SES_NAMA']; ?></a>

        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if($_SESSION['SES_JENISUSER'] == '1'){
          ?>
          <li class="nav-header">ADMIN</li>
          <li class="nav-item">
            <a href="?hal=dashboard" class="nav-link">
                        <!-- <a href="?hal=dashboard" class="nav-link active"> -->
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right badge badge-danger"></i>
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="?hal=datapelanggan" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Pelanggan</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="?hal=datapencuci" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Karyawan</p>
                    </a>
                  </li>
                </ul>  
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="?hal=hargacuci" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Harga Cuci</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="?hal=setwaktu" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Setting Waktu</p>
                    </a>
                  </li>
                </ul>
          </li>
 

          <li class="nav-item">
            <a href="?hal=datapesanan" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pesanan Masuk
                <?php 
                  $total = mysql_query("SELECT count(cuci_id) as total from tr_cuci where status = '1'");
                  $exec = mysql_fetch_assoc($total);
                ?>
                <span class="right badge badge-danger"><?php echo $exec['total']; ?></span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="?hal=datapesanankeluar" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pesanan Keluar
                <?php 
                  $total = mysql_query("SELECT count(cuci_id) as total from tr_cuci where status = '2'");
                  $exec = mysql_fetch_assoc($total);
                ?>
                <span class="right badge badge-danger"><?php echo $exec['total']; ?></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?hal=datapesananselesai" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pesanan Selesai
                <?php 
                  $total = mysql_query("SELECT count(cuci_id) as total from tr_cuci where status = '3'");
                  $exec = mysql_fetch_assoc($total);
                ?>
                <span class="right badge badge-danger"><?php echo $exec['total']; ?></span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?hal=lapbulanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Harian</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?hal=lapantara" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Antara</p>
                </a>
              </li>
            </ul>
          </li>
          <?php }elseif($_SESSION['SES_JENISUSER']=='2'){
           ?>
          <li class="nav-header">Pencuci</li>
          <li class="nav-item">
            <a href="?hal=dashboard" class="nav-link">
                        <!-- <a href="?hal=dashboard" class="nav-link active"> -->
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right badge badge-danger"></i>
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="?halpencuci=listjemput" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Cuci
                <?php 
                  $total = mysql_query("SELECT count(cuci_id) as tot from tr_cuci where status = '2' and id_user_pencuci = '".$_SESSION['SES_ID']."'");
                  $exec = mysql_fetch_assoc($total);
                ?>
                <span class="right badge badge-danger"><?php echo $exec['tot']; ?></span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="?halpencuci=riwayatjemput" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Riwayat Cuci
                <?php 
                  $total = mysql_query("SELECT count(cuci_id) as total from tr_cuci where status > '2'");
                  $exec = mysql_fetch_assoc($total);
                ?>
                <span class="right badge badge-danger"><?php echo $exec['total']; ?></span>
              </p>
            </a>
          </li>
          <?php }elseif ($_SESSION['SES_JENISUSER'] == '3') {
            # code...
           ?>
          <b><li class="nav-header">PELANGGAN</li></b>
          <li class="nav-item">
            <a href="?hal=dashboard" class="nav-link">
                        <!-- <a href="?hal=dashboard" class="nav-link active"> -->
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right badge badge-danger"></i>
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="?halpelanggan=createpesan" class="nav-link">
              <i class="nav-icon fas fa-sync-alt"></i>
              <p>
                Transaksi
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="?halpelanggan=kotakmasuk" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Kotak Masuk
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="?halpelanggan=indexpesan" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                History Transaksi
                <?php 
                  $total = mysql_query("SELECT count(cuci_id) as total from tr_cuci where pelanggan_id = '".$_SESSION['SES_USER']."'");
                  $exec = mysql_fetch_assoc($total);
                ?>
                <span class="right badge badge-danger"><?php echo $exec['total']; ?></span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="?halpelanggan=profile" class="nav-link">
              <i class="nav-icon fas fa-sync-alt"></i>
              <p>
                Akun
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <?php } ?>
          

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>