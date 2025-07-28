  <!DOCTYPE html>
  <html>

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Perpustakaan | Dashboard</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="<?= base_url ()?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?= base_url ()?>asset/bower_components/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?= base_url ()?>asset/bower_components/Ionicons/css/ionicons.min.css">
      <link rel="stylesheet" href="<?= base_url ()?>asset/dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="<?= base_url ()?>asset/dist/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="<?= base_url ()?>asset/bower_components/morris.js/morris.css">
      <link rel="stylesheet" href="<?= base_url ()?>asset/bower_components/jvectormap/jquery-jvectormap.css">
      <link rel="stylesheet" href="<?= base_url ()?>asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <link rel="stylesheet" href="<?= base_url ()?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
      <link rel="stylesheet" href="<?= base_url ()?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <link rel="stylesheet" href="<?= base_url ()?>asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet" href="<?= base_url ()?>asset/bower_components/select2/dist/css/select2.min.css">


      <!-- Google Font -->
      <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

      <script src="<?= base_url()?>asset/bower_components/jquery/dist/jquery.min.js"></script>
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">

          <header class="main-header">
              <!-- Logo -->
              <a href="" class="logo">
                  <!-- mini logo for sidebar mini 50x50 pixels -->
                  <span class="logo-mini"><b>A</b>LT</span>
                  <!-- logo for regular state and mobile devices -->
                  <span class="logo-lg"><b>Admin</b>Perpustakaan</span>
              </a>
              <!-- Header Navbar: style can be found in header.less -->
              <nav class="navbar navbar-static-top">
                  <!-- Sidebar toggle button-->
                  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                      <span class="sr-only">Toggle navigation</span>
                  </a>
              </nav>
          </header>

          <!-- Awal Menu  -->

          <?php $this->load->view('v_menu');?>

          <!-- Akhir Menu  -->

          <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                  <h1>
                      <?= $judul;?>
                  </h1>
                  
                  <ol class="breadcrumb">
                      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                      <li class="active">Dashboard</li>
                  </ol>
              </section>

              <!-- Main content -->
              <section class="content">
                  <?php $this->load->view($content);?>
              </section>
          </div>
          <footer class="main-footer">
              <div class="pull-right hidden-xs">
                  <b>Version</b> 2.4.13-pre
              </div>
              <strong>Copyright &copy; 2025 All rights reserved.</strong>
          </footer>

          <div class="control-sidebar-bg"></div>
      </div>

      <script src="<?= base_url()?>asset/bower_components/jquery-ui/jquery-ui.min.js"></script>
      <script>
      $.widget.bridge('uibutton', $.ui.button);
      </script>
      <script src="<?= base_url ()?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="<?= base_url ()?>asset/bower_components/raphael/raphael.min.js"></script>
      <script src="<?= base_url ()?>asset/bower_components/morris.js/morris.min.js"></script>
      <script src="<?= base_url ()?>asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
      <script src="<?= base_url ()?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="<?= base_url ()?>asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <script src="<?= base_url ()?>asset/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
      <script src="<?= base_url ()?>asset/bower_components/moment/min/moment.min.js"></script>
      <script src="<?= base_url ()?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
      <script src="<?= base_url ()?>asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
      <script src="<?= base_url ()?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
      <script src="<?= base_url ()?>asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <script src="<?= base_url ()?>asset/bower_components/fastclick/lib/fastclick.js"></script>
      <script src="<?= base_url ()?>asset/dist/js/adminlte.min.js"></script>
      <script src="<?= base_url ()?>asset/dist/js/pages/dashboard.js"></script>
      <script src="<?= base_url ()?>asset/dist/js/demo.js"></script>
      <script src="<?= base_url ()?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="<?= base_url ()?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="<?= base_url ()?>asset/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>
        $(function () {
        $('.select2').select2()
        });
        </script>

      <script>
      $(function() {
          $('#example1').DataTable()
          $('#example2').DataTable({
              'paging': true,
              'lengthChange': false,
              'searching': false,
              'ordering': true,
              'info': true,
              'autoWidth': false
          })
      })
      </script>

  </body>
  </html>