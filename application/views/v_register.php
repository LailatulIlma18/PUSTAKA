
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url() ?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/iCheck/square/blue.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

     <style>
        .register {
            font-size : 20px;
            font-weight: bold;
            color : #3c8dbc;
        }
    </style>

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
         <b>Register</b>Perpustakaan
  </div>

  <div class="register-box-body">
    <p class="login-box-msg register">Register</p>

    <form action="<?= base_url()?>register/proses_register" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
        <select name="level" class="form-control" required>
          <option value="">-- Pilih Level --</option>
          <option value="admin">Admin</option>
          <option value="petugas">Petugas</option>
          <!-- <option value="anggota">Anggota</option> -->
        </select>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <div class="col-xs-6">
          <a href="<?= base_url('login') ?>" class="btn btn-danger btn-block btn-flat">Login</a>
        </div>
      </div>
    </form>


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
