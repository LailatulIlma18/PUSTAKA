<?php 
    if (!empty($this->session->flashdata('info'))) {?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>

   <?php }

?>

<div class="row">
    <div class="col-md-12">
        <a href="anggota/tambah_anggota" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Anggota</a>
    </div>
</div>

<br>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id Anggota</th>
                    <th>NIS</th>
                    <th>Nama Anggota</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    foreach ($data as $row) {?>
                        <tr>
                            <td><?= $row->id_anggota;?></td>
                            <td><?= $row->nis;?></td>
                            <td><?= $row->nama_anggota;?></td>
                            <td><?= $row->email;?></td>
                            <td><?= $row->jenis_kelamin;?></td>
                            <td><?= $row->alamat;?></td>
                            <td><?= $row->no_telp;?></td>
                            <td>
                                <a href="<?= base_url()?>anggota/edit/<?= $row->id_anggota?>" class="btn btn-success btn-xs">edit</a>
                                <a href="<?= base_url()?>anggota/hapus/<?= $row->id_anggota?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin  Mau Menghapus?')">hapus</a>
                            </td>
                        </tr>
                  <?php  }
                ?>
            </tbody>
        </table>
    </div>
</div>