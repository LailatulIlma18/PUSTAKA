    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perpustakaan | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url() ?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/iCheck/square/blue.css">


    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        .login {
            font-size : 20px;
            font-weight: bold;
            color : #3c8dbc;
        }
    </style>
    </head>


    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Login</b>Perpustakaan
     </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg login">Login Perpustakaan</p>

        <?= $this->session->flashdata('info');?>

        <form action="<?= base_url()?>login/proses_login" method="post">
        <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="username" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">
        <div class="col-xs-6">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <div class="col-xs-6">
            <a href="<?= base_url('register') ?>" class="btn btn-danger btn-block btn-flat">Registerasi</a>
        </div>
        </div>
        </form>


        <!-- <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a> -->


    </div>
    <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

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
