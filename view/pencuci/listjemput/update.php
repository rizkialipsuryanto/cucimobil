<?php 

    $query = mysql_query("SELECT 
                          a.*, 
                          b.user_id as iduser,
                          b.nama,
                          b.alamat,
                          b.no_telp,
                          c.harga,
                          b.fotosatu
                          from tr_cuci a   
                          join tm_user b on a.pelanggan_id = b.no_ktp 
                           JOIN tm_hargacuci c ON c.id = a.id_harga
                          where a.no_cuci = '".$_GET['cuci_id']."'");
    $row   = mysql_fetch_array($query);
    // print_r($row['iduser']);
    // die();

    $no_cuci = $row['no_cuci'];  
    $data = mysql_query("SELECT  b.mobil,a.no_cuci,d.jenis
                          FROM tr_cuci_detail a 
                          JOIN tm_userdetailmobil b ON a.mobil_id = b.id 
                          JOIN tr_cuci c ON a.no_cuci = c.no_cuci 
                          JOIN tm_hargacuci d ON d.id = c.id_harga 
                          where a.no_cuci = '".$no_cuci."'");

    // $agama_id = $row['agama_id'];
?>
<head>
<!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjAuXQD6MiN7V3WjTXbD-eGbVtavyNfGQ&callback=initialize" async defer></script>
<script type="text/javascript">   
    var marker;
    function initialize(){
        // Variabel untuk menyimpan informasi lokasi
        var infoWindow = new google.maps.InfoWindow;
        //  Variabel berisi properti tipe peta
        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
        // Pembuatan peta
        var peta = new google.maps.Map(document.getElementById('googleMap'), mapOptions);      
    // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();
        // Pengambilan data dari database MySQL
        <?php
    // Sesuaikan dengan konfigurasi koneksi Anda
      $host     = "localhost";
      $username = "root";
      $password = "";
      $Dbname   = "cuci_mobil";
      $db     = new mysqli($host,$username,$password,$Dbname);
      // include "config/koneksi.php";
      
      $query = $db->query("SELECT * FROM tm_user where user_id = '".$row['iduser']."'");
      while ($row = $query->fetch_assoc()) {
        $nama = $row["alamat"];
        $lat  = $row["latitude"];
        $long = $row["longitude"];
        echo "addMarker($lat, $long, '$nama');\n";
      }
        ?> 
        // Proses membuat marker 
        function addMarker(lat, lng, info){
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: peta,
                position: lokasi
            });       
            peta.fitBounds(bounds);
            bindInfoWindow(marker, peta, infoWindow, info);
         }
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, peta, infoWindow, html){
            google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(peta, marker);
          });
        }
    }
</script>
</head>
<?php 

    $query = mysql_query("SELECT 
                          a.*, 
                          b.user_id as iduser,
                          b.nama,
                          b.alamat,
                          b.no_telp,
                          c.harga,
                          b.fotosatu
                          from tr_cuci a   
                          join tm_user b on a.pelanggan_id = b.no_ktp 
                           JOIN tm_hargacuci c ON c.id = a.id_harga
                          where a.no_cuci = '".$_GET['cuci_id']."'");
    $row   = mysql_fetch_array($query);
    // print_r($row['iduser']);
    // die();

    $no_cuci = $row['no_cuci'];  
    $data = mysql_query("SELECT  b.mobil,a.no_cuci,d.jenis
                          FROM tr_cuci_detail a 
                          JOIN tm_userdetailmobil b ON a.mobil_id = b.id 
                          JOIN tr_cuci c ON a.no_cuci = c.no_cuci 
                          JOIN tm_hargacuci d ON d.id = c.id_harga 
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
          
          <form action="../cucimobil/controller/site.php?fungsi=actionvalidpencuci" method="post"> 
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
                            <tr>
                              <td>Foto</td>
                              <td>:</td>
                              <td><img src="static/<?=@$row['fotosatu']; ?>" width="150" height="100"> </td> 
                            </tr>
                          </table>
                      </div>
                </div> 
                <div class="form-group">
                  <?php 
                    $datapencuci = mysql_query("SELECT count(*) as jmlmobil FROM  tr_cuci_detail WHERE no_cuci = '".$row['no_cuci']."' "); 
                    $gpencuci=mysql_fetch_array($datapencuci);
                    
                  ?>
                  <label>Perincian Biaya :</label>
                   <table>
                     <tr>
                       <td>Jumlah </td>
                       <td>:</td>
                       <td><?=$gpencuci['jmlmobil'];?> mobil <input type="hidden" name="jmlmobil" id="jmlmobil"  value="<?=$gpencuci['jmlmobil'];?>"></td>
                     </tr>
                     <tr>
                       <td>Biaya</td>
                       <td>:</td>
                       <td><input type="hidden" name="biaya" id="biaya" placeholder="Harga Per Satu Mobil"   value="<?=@$row['harga']?>" ><?=@$row['harga']?></td>
                     </tr>
                   </table>
                </div>
              </div>
              <div class="col-md-8">
                  <div class="card card-secondary">
                      <div class="card-header">
                        <h3 class="card-title">Data Mobil</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body"> 
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Nama Mobil</th> 
                                      <th>Fasilitas</th> 
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
                                      <td><?php echo $g['jenis'];?></td> 
                                    </tr>
                                    <?php
                                    }  
                                    ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div id="googleMap" style="width:1100px;height:500px;"></div>
              <br><br>
              <!-- /.col -->
              <!-- /.col -->
            </div>
            <br><br>
            <?php 
              if($row['status'] == '2'){?>
                  <button type="submit" class="btn btn-success">Verifikasi Cuci</button>  
              <?php }
             ?>
            
          </form>
                
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

