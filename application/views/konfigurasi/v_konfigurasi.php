<?php 
    if (!empty($this->session->flashdata('info'))) {?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
   <?php }
?>

<div class="row">
    <div class="col-md-12">
        <a href="konfigurasi/tambah_konfigurasi" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Konfigurasi</a>
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
                    <th>Id Denda</th>
                    <th>Jenis</th>
                    <th>Denda Perhari</th>
                    <th>Denda Perbulan</th>
                    <th>Denda Pertahun</th>
                    <th>Rusak Ringan</th>
                    <th>Rusak Berat</th>
					 <th>Denda Hilang</th>
                    <th>Aksi</th> 
                </tr>
            </thead>

            <tbody>
                <?php 
                    foreach ($data as $row) {?>
                        <tr>
                            <td><?= $row->id_denda;?></td>
                            <td><?= $row->jenis;?></td>
                            <td><?= $row->denda_per_hari;?></td>
                            <td><?= $row->denda_per_bulan;?></td>
                            <td><?= $row->denda_per_tahun;?></td>
                            <td><?= $row->denda_ringan;?></td>
                            <td><?= $row->denda_berat;?></td>
							<td><?= $row->hilang;?></td>
                            <td>
                                 <a href="<?= base_url()?>konfigurasi/edit/<?= $row->id_denda;?>" class="btn btn-success btn-xs">Edit</a>
                                 <a href="<?= base_url()?>konfigurasi/hapus/<?= $row->id_denda;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Menghapus?');">Hapus</a>
                            </td> 
                        </tr>
                  <?php  } 
                ?>    

            </tbody>
        </table>
    </div>
</div>
