<?php
include "config/koneksi.php";
include("pdf/mpdf.php");
session_start();
if (empty($_SESSION['SES_USER'])){
    header("location:index.php"); // jika belum login, maka dikembalikan ke file form_login.php
} else
{
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cuci Mobil</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

      <!-- Navbar -->
      <?php 
          include "pages/header.php";
       ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      
      <?php 
          include "pages/sidebar.php";
      ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- /.row -->
        <!-- Main row (Main)-->
        <?php
            if(isset($_GET['hal']))
            {
                if($_GET['hal'] == 'controller')
                {
                    include "controller/site.php?fungsi=actioninsertpelanggan";
                }
                if($_GET['hal'] == 'dashboard')
                {
                    include "pages/main/dashboard.php";
                }
                if($_GET['hal'] == 'datapelanggan')
                {
                  include "view/admin/datapelanggan/index.php";
                }
                if($_GET['hal'] == 'createdatapelanggan')
                {
                  include "view/admin/datapelanggan/create.php";
                }
                if($_GET['hal'] == 'updatedatapelanggan')
                {
                  include "view/admin/datapelanggan/update.php";
                }
                if($_GET['hal'] == 'datapencuci')
                {
                  include "view/admin/datapencuci/index.php";
                }
                if($_GET['hal'] == 'updatedatapencuci')
                {
                  include "view/admin/datapencuci/update.php";
                }
                if($_GET['hal'] == 'createdatapencuci')
                {
                  include "view/admin/datapencuci/create.php";
                }
                if($_GET['hal'] == 'datapesanan')
                {
                  include "view/admin/datapesanan/index.php";
                }
                if($_GET['hal'] == 'updatedatapesanan')
                {
                  include "view/admin/datapesanan/update.php";
                }
                if($_GET['hal'] == 'lapbulanan')
                {
                  include "view/admin/datapesanan/cetak.php";
                }
                if($_GET['hal'] == 'lapantara')
                {
                  include "view/admin/datapesanan/cetakantara.php";
                }
                if($_GET['hal'] == 'modellokasi')
                {
                  include "model/lokasi.php";
                }  

                if($_GET['hal'] == 'setwaktu')
                {
                  include "view/admin/setwaktu/index.php";
                }
                if($_GET['hal'] == 'createsetwaktu')
                {
                  include "view/admin/setwaktu/create.php";
                }
                if($_GET['hal'] == 'updatesetwaktu')
                {
                  include "view/admin/setwaktu/update.php";
                }


                if($_GET['hal'] == 'hargacuci')
                {
                  include "view/admin/hargacuci/index.php";
                }
                if($_GET['hal'] == 'createhargacuci')
                {
                  include "view/admin/hargacuci/create.php";
                }
                if($_GET['hal'] == 'updatehargacuci')
                {
                  include "view/admin/hargacuci/update.php";
                }

                if($_GET['hal'] == 'datapesanankeluar')
                {
                  include "view/admin/datapesanankeluar/index.php";
                }
                if($_GET['hal'] == 'datapesananselesai')
                {
                  include "view/admin/datapesananselesai/index.php";
                } 

                if($_GET['hal'] == 'chat')
                {
                  include "view/admin/chat.php";
                }
            }
            elseif(isset($_GET['halpelanggan'])){
                if($_GET['halpelanggan'] == 'createpesan')
                {
                  include "view/pelanggan/pesan/create.php";
                }
                if($_GET['halpelanggan'] == 'indexpesan')
                {
                  include "view/pelanggan/pesan/index.php";
                }
                if($_GET['halpelanggan'] == 'validpesan')
                {
                  include "view/pelanggan/pesan/valid.php";
                }
                if($_GET['halpelanggan'] == 'kotakmasuk')
                {
                  include "view/pelanggan/pesan/kotakmasuk.php";
                }
                if($_GET['halpelanggan'] == 'profile')
                {
                  include "view/pelanggan/profile/index.php";
                }
            }
            elseif(isset($_GET['halpencuci'])){
                if($_GET['halpencuci'] == 'listjemput')
                {
                  include "view/pencuci/listjemput/index.php";
                }
                if($_GET['halpencuci'] == 'updatedatapesanan')
                {
                  include "view/pencuci/listjemput/update.php";
                }
                if($_GET['halpencuci'] == 'riwayatjemput')
                {
                  include "view/pencuci/listriwayat/index.php";
                }
                if($_GET['halpencuci'] == 'listriwayatjemput')
                {
                  include "view/pencuci/listriwayat/listriwayat.php";
                }
            }
            else{
              include "pages/main/dashboard.php";
            }
        ?>
        <!-- <?php 
            // include "pages/main/dashboard.php";
         ?> -->
        <!-- /.row (main row) -->
      
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-rc.1
    </div>
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS --> 
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script> 
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
</script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<script src="assets/vue/vue.js"></script>
<script src="assets/vue/vue.min.js"></script> 

<script type="text/javascript"> 
$(document).ready(function() {  


$("#kecamatan").append('<option value="">Pilih</option>'); 
$("#kelurahan").html(''); 
$("#kelurahan").append('<option value="">Pilih</option>'); 
url = 'model/filterkecamatan.php'; 
$.ajax({ url: url, 
type: 'GET', 
dataType: 'json', 
success: function(result) { 
for (var i = 0; i < result.length; i++) 
$("#kecamatan").append('<option value="' + result[i].kecamatan_id + '">' + result[i].kecamatan + '</option>'); 
} 
}); 
}); 
$("#kecamatan").change(function(){ 
var kecamatan_id = $("#kecamatan").val(); 
var url = 'model/filterkelurahan.php?kecamatan_id=' + kecamatan_id;
$("#kelurahan").html('');
$("#kelurahan").append('<option value="">Pilih</option>'); 
$.ajax({ url : url, 
type: 'GET', 
dataType : 'json', 
success : function(result){ 
for(var i = 0; i < result.length; i++) 
$("#kelurahan").append('<option value="'+ result[i].kelurahan_id +'">' + result[i].kelurahan + '</option>');

var kelurahan_id = $("#kelurahan").val();  
} 
});  
}); 

$("#kelurahan").change(function(){ 
  var kelurahan_id = $("#kelurahan").val(); 
  // alert(kelurahan_id);
});

</script>
 


<script type="text/javascript"> 
$(document).ready(function() { 
$("#lokasi").append('<option value="">Pilih</option>'); 
$("#provinsi").html(''); 
$("#provinsi").append('<option value="">Pilih</option>'); 
url = 'model/lokasi.php'; 
$.ajax({ url: url, 
type: 'GET', 
dataType: 'json', 
success: function(result) { 
for (var i = 0; i < result.length; i++) 
$("#lokasi").append('<option value="' + result[i].id_lokasi + '">' + result[i].lokasi + '</option>'); 
} 
}); 
}); 
$("#lokasi").change(function(){ 
var id_lokasi = $("#lokasi").val(); 
var url = 'model/filterprovinsilokasi.php?id_lokasi=' + id_lokasi;
$("#provinsipesan").html('');
$("#provinsipesan").append('<option value="">Pilih</option>'); 
$.ajax({ url : url, 
type: 'GET', 
dataType : 'json', 
success : function(result){ 
for(var i = 0; i < result.length; i++) 
$("#provinsipesan").append('<option value="'+ result[i].id_provinsi +'">' + result[i].provinsi + '</option>');

var id_provinsi = $("#provinsipesan").val();  
} 
});  
}); 

$("#provinsipesan").change(function(){ 
  var id_provinsi = $("#provinsipesan").val(); 
  // alert(id_provinsi);
});

$("#lokasi").change(function(){ 
var id_lokasi = $("#lokasi").val(); 
var url = 'model/pelayanan.php?id_lokasi=' + id_lokasi;
$("#jenislayananpesan").html('');
$("#jenislayananpesan").append('<option value="">Pilih</option>'); 
$.ajax({ url : url, 
type: 'GET', 
dataType : 'json', 
success : function(result){ 
for(var i = 0; i < result.length; i++) 
$("#jenislayananpesan").append('<option value="'+ result[i].id_pelayanan +'">' + result[i].pelayanan + '</option>');

var id_pelayanan = $("#jenislayananpesan").val();  
} 
});  
}); 

$("#jenislayananpesan").change(function(){ 
  var id_pelayanan = $("#jenislayananpesan").val(); 
  // alert(id_provinsi);
});

</script>

<!-- JQuery simpan onload -->
<script type="text/javascript">
  $(document).ready(function(){
    $(".tombol-simpan").click(function(){
      var data = $('.form-user').serialize();
      $.ajax({
        type: 'POST',
        url: "controller/site.php?fungsi=actioninsertpesanan",
        data: data,
        success: function() {
          $('.tampildata').load("tampil.php");
        }
      });
    });
  });
</script>

<!-- modal -->
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
<script type="text/javascript">
  $(document).ready(function(){
        $('#myModalBuktiBayar').on('show.bs.modal', function (e) {
            var pesanan_detail_id = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
              // alert(pesanan_detail_id);
            $.ajax({
                type : 'post', 
                url : 'view/pelanggan/profile/upload.php',
                data :  'pesanan_id='+ pesanan_detail_id,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });

          $('#myModalLoaddetail').on('show.bs.modal', function (e) {
            var pesanan_detail_id = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
              // alert(pesanan_detail_id);
            $.ajax({
                type : 'post', 
                url : 'view/pelanggan/pesan/detailtransaksi.php',
                data :  'pesanan_id='+ pesanan_detail_id,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>


<script type="text/javascript">
$(document).ready(function() { 
  $("#tanggal").change(function(){
  var tanggal = $("#tanggal").val(); 
  var nik = $("#nik").val();
  url = 'model/filterwaktu.php?tanggal='+tanggal+'&nik='+nik; 
  $("#jam").html('');
    $("#jam").append('<option value="">Pilih jam</option>');  
    
    // alert(url);
    $.ajax({ url: url, 
    type: 'GET', 
    dataType: 'json', 
    success: function(result) { 
      console.log(result);
        for (var i = 0; i < result.length; i++) 
        $("#jam").append('<option value="' + result[i].id + '">' + result[i].waktu + '</option>');  
        } 
    }); 
    });


      $("#jam").change(function(){ 
      // $("#infokuota").hmtl('');  
      $("#infokuota").html(''); 
      var jam = $("#jam").val();
      // alert(jam);
      url = 'model/ambilkuota.php?jam=' +jam;  
      $.ajax({ url: url, 
        type: 'GET', 
        dataType: 'json', 
        success: function(result) {  
          document.getElementById("telInfo1").style.display = "block"; 
          $("#infokuotaa").html(result);  
        }
      });  
    }); 

    $("#jam").change(function(){ 
      // $("#infokuota").hmtl('');  
      $("#sisakuota").html('0'); 
      var jam = $("#jam").val();
      var tanggal = $("#tanggal").val();
      // alert(jam);
      url = 'model/ambilkuotasisa.php?jam=' +jam+'&tanggal='+tanggal;  
      $.ajax({ url: url, 
        type: 'GET', 
        dataType: 'json', 
        success: function(result) {  
          console.log(result);
          document.getElementById("telInfo1").style.display = "block"; 
          $("#sisakuota").html(result);  
          var kuot = $("#sisakuota").val(result);  
          if(result > 0){
            document.getElementById("validkuota").style.display = "block"; 
            document.getElementById("infovalidkuota").style.display = "none"; 
          }else{ 
            document.getElementById("validkuota").style.display = "none"; 
            document.getElementById("infovalidkuota").style.display = "block"; 
          }

        }
      });  
    }); 

    $("#fasilitas").append('<option value="">Pilih fasilitas</option>');  
    url = 'model/selfasilitas.php';  
    $.ajax({ url: url, 
    type: 'GET', 
    dataType: 'json', 
    success: function(result) { 
      console.log(result);
        for (var i = 0; i < result.length; i++) 
        $("#fasilitas").append('<option value="' + result[i].id + '">' + result[i].jenis + ' - Rp. '+result[i].harga+'</option>');  
        } 
    }); 

}); 

  function jvPreview() {
     var xx = $("#tanggal").val();
     // alert(xx); 
     window.location.assign("./index_.php?hal=datapesanan&tanggal="+xx)
  }
  function jvPreviewjemput() {
     var xx = $("#tanggal").val();
     var xxtglsampai = $("#sampaitgl").val();
     // alert(xx); 
     window.location.assign("./index_.php?halpencuci=riwayatjemput&tanggal="+xx+"&sampaitgl="+xxtglsampai)
  }
  function jvPreviewkeluar() {
     var xx = $("#tanggal").val();
     // alert(xx); 
     window.location.assign("./index_.php?hal=datapesanankeluar&tanggal="+xx)
  }
  function myFunctions(id)
  {
    var sel = $("#kategori"+id).val();  
    var waktu = $("#waktu"+id).text();  
    var tanggal = $("#tanggal"+id).text();  
    // console.log(tanggal);
      // url = 'model/cekkuotapencuci.php?waktu='+waktu+'&tanggal='+tanggal+'&idcuci='+sel;  
      // $.ajax({ url: url, 
      //   type: 'GET', 
      //   dataType: 'json', 
      //   success: function(result) {  
      //     console.log(result); 

      //   }
      // });
    $.get('model/cekkuotapencuci.php',{idcuci:sel,tanggal:tanggal,waktu:waktu},function(data){ 
         // alert('Data Pencuci berhasil di simpan');
    var  eas =   data.replace(/"/g, '');
        if(eas == 0){
          $.get('../cucimobil/controller/site.php?fungsi=actioninsertpencuci',{id:id,iduser:sel},function(data){ 
               alert('Data Pencuci berhasil di simpan');
              // console.log(data);
          }); 

        }else{
          alert('Pencnuci Sudah di Pilih untuk pelanggan yang lain Silahkan Pilih Pencuci Yang Lain.');
        }
        // console.log(eas);
    }); 
  }
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>