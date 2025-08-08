 <?php 
    if (!empty($this->session->flashdata('info'))) {?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>

   <?php }

?>

<div class="row">
    <div class="col-md-12">
        <a href="buku/tambah_buku" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Buku</a>
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
                    <!-- <th>Id Buku</th> -->
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>ISBN</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach($data->result() as $row) {?>
                    <tr>
                        <td><?= $row->kode_buku;?></td>
                        <td><?= $row->judul;?></td>
                        <td><?= $row->nama_kategori;?></td>
                        <td><?= $row->penulis;?></td>
                        <td><?= $row->penerbit;?></td>
                        <td><?= $row->tahun_terbit;?></td>
                        <td><?= $row->isbn;?></td>
                        <td><?= $row->jumlah;?></td>
                        <td>
                            <a href="<?= base_url()?>buku/edit/<?= $row->id_buku;?>" class="btn btn-success btn-xs">Edit</a>
                            <a href="<?= base_url()?>buku/hapus/<?= $row->id_buku;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Menghapus?')">Hapus</a>
                        </td>
                    </tr>

                  <?php }
                
                
                
                ?>
            </tbody>
        </table>
    </div>
</div>