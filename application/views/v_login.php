<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan | Login</title>
  <link rel="icon" href="<?= base_url()?>asset/dist/img/logo.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url() ?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/iCheck/square/blue.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

     <style>
        body {
            background: #f5f5f5;
        }
        .register-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px 40px;
            max-width: 400px;
            margin: 40px auto;
        }
        .register-card img {
            margin-bottom: 15px;
        }
        h4 {
            margin-bottom: 5px;
            color: #0c7b71ff;
        }
        .form-control {
            border-radius: 10px;
        }
        p {
            color: #818181ff;
            font-weight: bold;
        }
        label {
            text-align: left;
            display: block;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
        }
        .btn-login {
            background: #169b90ff;
            color: #fff;
            font-weight: bold;
            border-radius: 10px;
            height: 45px;
            font-size: 15px;
        }
        .btn-login:hover {
            background: #0f635cff;
            color: #fff;
        }
        .btn-register {
            background: #FFCA4F;
            color: #fff;
            font-weight: bold;
            border-radius: 10px;
            height: 35px;
            font-size: 15px;
        }
        .btn-register:hover {
            background: #c0973aff;
            color: #fff;
        }
        .form-group {
            position: relative;
            text-align: left;
        }
        .form-group span {
            position: absolute;
            right: 15px;
            top: 35px;
            color: #474646ff;
        }
      .help-links {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-size: 13px;
        }
        .help-links a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
        }
        .help-links a:hover{
            text-decoration: underline;
        }
    </style>
</head>

  <body>
   <div class="register-card text-center">
          <img src="<?= base_url()?>asset/dist/img/logo.png" width="90px" alt="Logo">
          <h4><b>Sistem Perpustakaan MAKN Ende</b></h4> <br>
          <p style="font-size: 14px; margin-bottom:25px;">Welcome ! <br> Masukkan Username dan Password</p>

          <form action="<?=base_url()?>login/proses_login" method="post">

              <div class="form-group has-feedback">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Masukkan Username Anda disini" required>
              <span class="fa fa-user-circle form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda disini" required>
              <span class="fa fa-eye-slash form-control-feedback"></span>
            </div>

                <div class="help-links">
                    <a href="#" class="left">Butuh Bantuan ?</a>
                    <a href="#" class="right">Lupa Password ?</a>
               </div>
                <br>
                
              <button type="submit" class="btn btn-login btn-block">Login</button>

               <p style="margin:15px 0 10px;">Atau Belum Memiliki Akun ?</p>
               <a href="<?= base_url('register')?>" class="btn btn-register btn-block">Register</a>
          </form>
        </div>

          <!-- jQuery 3 -->
          <script src="<?= base_url() ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
          <!-- Bootstrap 3.3.7 -->
          <script src="<?= base_url() ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
          <!-- iCheck -->
          <script src="<?= base_url() ?>asset/plugins/iCheck/icheck.min.js"></script>
          <script>
            $(function () {
              $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
              });
            });
      </script>

    </body>
</html>
