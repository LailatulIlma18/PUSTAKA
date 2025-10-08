      <?php
        if($this->session->userdata('level') == 'admin') {?>

    <?php 
    $segment1 = $this->uri->segment(1);
    $segment2 = $this->uri->segment(2);
    ?>

    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url('asset/dist/img/perempuan/'.$this->session->userdata('foto'));?>"       
            style="width:50px; height:50px; border-radius:50%; object-fit:cover;" 
              alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= $this->session->userdata('nama');?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
        <li class="<?= ($segment1 == 'dashboard') ? 'active' : '' ?>">
        <a href="<?= base_url('dashboard') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="<?= ($segment1 == 'anggota') ? 'active' : '' ?>">
        <a href="<?= base_url('anggota') ?>"><i class="fa fa-user"></i> Data Anggota</a>
      </li>

      <li class="<?= ($segment1 == 'kategori') ? 'active' : '' ?>">
        <a href="<?= base_url('kategori') ?>"><i class="fa fa-table"></i> Kategori</a>
      </li>

      <li class="<?= ($segment1 == 'buku') ? 'active' : '' ?>">
        <a href="<?= base_url('buku') ?>"><i class="fa fa-book"></i> Buku</a>
      </li>

          <li class="<?= ($segment1 == 'konfigurasi') ? 'active' : '' ?>">
        <a href="<?= base_url('konfigurasi') ?>"><i class="fa fa-gear"></i> Konfigurasi Denda</a>
      </li>

        <li class="treeview <?= ($segment1 == 'peminjaman' || $segment1 == 'pengembalian') ? 'active menu-open' : '' ?>">
        <a href="#">
          <i class="fa fa-bar-chart-o"></i> <span>Transaction</span>
          <span class="pull-right-container">
            <span class="label label-warning pull-right">2</span>
          </span>
        </a>
        <ul class="treeview-menu" style="<?= ($segment1 == 'peminjaman' || $segment1 == 'pengembalian') ? 'display:block;' : '' ?>">
          <li class="<?= ($segment1 == 'peminjaman') ? 'active' : '' ?>">
            <a href="<?= base_url('peminjaman') ?>"><i class="fa fa-upload"></i> Peminjaman</a>
          </li>
          <li class="<?= ($segment1 == 'pengembalian') ? 'active' : '' ?>">
            <a href="<?= base_url('pengembalian') ?>"><i class="fa fa-download"></i> Pengembalian</a>
          </li>
        </ul>
      </li>
      
          <li class="treeview <?= ($segment1 == 'laporan') ? 'active menu-open' : '' ?>">
        <a href="#">
          <i class="fa fa-pie-chart"></i> <span>Report</span>
          <span class="pull-right-container">
            <span class="label label-success pull-right">2</span>
          </span>
        </a>
        <ul class="treeview-menu" style="<?= ($segment1 == 'laporan') ? 'display:block;' : '' ?>">
          <li class="<?= ($segment2 == 'peminjaman') ? 'active' : '' ?>">
            <a href="<?= base_url('laporan/peminjaman') ?>"><i class="fa fa-file-text"></i> Laporan Peminjaman</a>
          </li>
          <li class="<?= ($segment2 == 'pengembalian') ? 'active' : '' ?>">
            <a href="<?= base_url('laporan/pengembalian') ?>"><i class="fa fa-file-text"></i> Laporan Pengembalian</a>
          </li>
        </ul>
      </li>
            <li><a href="<?= base_url('login/logout')?>"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>
        </ul>
        </section>
    </aside>

      <?php } else { ?>

    <?php 
    $segment1 = $this->uri->segment(1);
    $segment2 = $this->uri->segment(2);
    ?>

    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url('asset/dist/img/perempuan/'.$this->session->userdata('foto'));?>"       
            style="width:50px; height:50px; border-radius:50%; object-fit:cover;" 
              alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= $this->session->userdata('nama');?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
        <li class="<?= ($segment1 == 'dashboard') ? 'active' : '' ?>">
        <a href="<?= base_url('dashboard') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="<?= ($segment1 == 'anggota') ? 'active' : '' ?>">
        <a href="<?= base_url('anggota') ?>"><i class="fa fa-user"></i> Data Anggota</a>
      </li>

      <li class="<?= ($segment1 == 'kategori') ? 'active' : '' ?>">
        <a href="<?= base_url('kategori') ?>"><i class="fa fa-table"></i> Kategori</a>
      </li>

      <li class="<?= ($segment1 == 'buku') ? 'active' : '' ?>">
        <a href="<?= base_url('buku') ?>"><i class="fa fa-book"></i> Buku</a>
      </li>

      <li class="<?= ($segment1 == 'konfigurasi') ? 'active' : '' ?>">
        <a href="<?= base_url('konfigurasi') ?>"><i class="fa fa-gear"></i> Konfigurasi Denda</a>
      </li>

        <li class="treeview <?= ($segment1 == 'peminjaman' || $segment1 == 'pengembalian') ? 'active menu-open' : '' ?>">
        <a href="#">
          <i class="fa fa-bar-chart-o"></i> <span>Transaction</span>
          <span class="pull-right-container">
            <span class="label label-warning pull-right">2</span>
          </span>
        </a>
        <ul class="treeview-menu" style="<?= ($segment1 == 'peminjaman' || $segment1 == 'pengembalian') ? 'display:block;' : '' ?>">
          <li class="<?= ($segment1 == 'peminjaman') ? 'active' : '' ?>">
            <a href="<?= base_url('peminjaman') ?>"><i class="fa fa-upload"></i> Peminjaman</a>
          </li>
          <li class="<?= ($segment1 == 'pengembalian') ? 'active' : '' ?>">
            <a href="<?= base_url('pengembalian') ?>"><i class="fa fa-download"></i> Pengembalian</a>
          </li>
        </ul>
      </li>

        <li><a href="<?= base_url('login/logout') ?>"><i class="fa fa-sign-out"></i>Logout</a></li>
        </ul>
        </section>
    </aside>
      <?php }
      ?>

      
    