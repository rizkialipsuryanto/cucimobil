<?php
     include "config/koneksi.php";
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
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link rel="stylesheet" type="text/css" href="plugins/bootstrap/js/bootstrap.min.js">
  <!-- date -->
  <link rel="stylesheet" type="text/css" href="plugins/datepicker/bootstrap-datepicker.min.js">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Cuci Mobil </b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg"><b>Daftar Akun</b></p>

      <form action="controller/site.php?fungsi=actioninsertregistrasi" method="post">
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
          <label type="text">Alamat Rumah</label>
          <!-- <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div> -->
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
                    <option selected="selected" value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
        </select>
        </div>
        <!-- <div class="input-group mb-3">
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
        </div> -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="No Telp" id="telp" name="telp" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Latitude" id="latitude" name="latitude" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Longitude" id="longitude" name="longitude" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
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
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="index.php" class="text-center">Login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });
  })
</script>
<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>

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
</body>
</html>
