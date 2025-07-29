<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url() ?>asset/dist/img/perempuan/XI PPLG 2/ILMA.JPG" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Avicena</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>


    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li><a href="<?= base_url() ?>anggota"><i class="fa fa-user"></i> Data Anggota</a></li>
      <li><a href="<?= base_url() ?>kategori"><i class="fa fa-table"></i>Kategori</a></li>
      <li><a href="<?= base_url() ?>buku"><i class="fa fa-book"></i> Buku</a></li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-bar-chart-o"></i>
          <span>Transaction</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">2</span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="peminjaman"><i class="fa fa-upload"></i> Peminjaman</a></li>
          <li><a href="pengembalian"><i class="fa fa-download"></i> Pengembalian </a></li>
        </ul>
      </li>

      <li><a href="login/logout"><i class="fa fa-sign-out"></i> Logout</a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>