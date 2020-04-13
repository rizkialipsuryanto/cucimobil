<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIPB Tiki</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="template/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="template/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="template/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="template/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="template/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="template/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="template/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="template/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="template/css/util.css">
  <link rel="stylesheet" type="text/css" href="template/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
  
  <div class="limiter">
    <div class="container-login100">
      <div class="login100-more" style="background-image: url('image/tiki.jpg');"></div>

      <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
        <a href="index.php" class="pull-right"><span class="fa fa-home"> Halaman Depan</span></a>

        <form class="login100-form validate-form" action="controller/site.php?fungsi=actionLogin" method="post">
          <span class="login100-form-title p-b-59">
            Login
          </span>

          <div class="wrap-input100 validate-input" data-validate="Username wajib diisi">
            <span class="label-input100">Username</span>
            <input class="input100" type="text" name="username" placeholder="Username...">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password wajib diisi">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="*************">
            <span class="focus-input100"></span>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button type="submit" class="login100-form-btn">
                Masuk
              </button>
            </div>
            
          </div>
          <br>
          
            
        </form>
        <div class="pull-right"><label>Belum punya akun?Klik <u><a href="register.php"> Daftar</a></u></label></div>
      </div>
    </div>
  </div>
  
<!--===============================================================================================-->
  <script src="template/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="template/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="template/vendor/bootstrap/js/popper.js"></script>
  <script src="template/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="template/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="template/vendor/daterangepicker/moment.min.js"></script>
  <script src="template/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="template/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="template/js/main.js"></script>

</body>
</html>