 <?php 
    if (!empty($this->session->flashdata('info'))) {?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
   <?php }
?>

<div class="row">
    <div class="col-md-12">
        <a href="peminjaman/tambah_peminjaman" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
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
                    <th>Nomor Transaksi</th>
                    <th>Peminjam</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Total Denda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
<tbody>
  <?php 
   foreach ($data as $row) {
   $tgl_kembali = new DateTime($row->tgl_kembali);
   $tgl_sekarang = new DateTime();
   $selisih = $tgl_sekarang->diff($tgl_kembali )->format("%a");
   ?>
   <tr>
   <td><?= $row->kode_peminjaman;?></td>
   <td><?= $row->nama_anggota;?></td>
   <td><?= $row->judul;?></td>
   <td><?= date('d F Y', strtotime($row->tgl_pinjam)); ?></td>
   <td><?= date('d F Y', strtotime($row->tgl_kembali)); ?></td>
                            
 <td>
    <?php 
        if ($tgl_kembali >= $tgl_sekarang OR $selisih == 0) {
            echo '<span class="badge label-warning text-dark">Dipinjam</span>';
        } else {
            echo '<span class="badge label-danger">Terlambat ' . $selisih . ' hari</span>';
        }
    ?>
</td>

    <td>
      <?php 
      if ($tgl_kembali < $tgl_sekarang && $selisih > 0) {
	  $total_denda = $selisih * $denda_per_hari;
      echo "Rp " . number_format($total_denda, 0, ',', '.');
      } else {
      echo "_";
      } 
      ?>
      </td>

 <td>
    <button type="button" class="btn btn-primary btn-xs" 
            data-toggle="modal" 
            data-target="#modalKembalikan<?= $row->id_peminjaman; ?>">
             Kembalikan
    </button>

            <div class="modal fade" id="modalKembalikan<?= $row->id_peminjaman; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Konfirmasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
             Yakin buku <b><?= $row->judul; ?></b> mau dikembalikan?
            </div>
             <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <a href="<?= base_url()?>peminjaman/form_kembalikan/<?= $row->id_peminjaman;?>" class="btn btn-primary btn-sm">Ya, Kembalikan</a>
          </div>
        </div>
      </div>
    </div>
      </td>     
        </tr>
          <?php  } 
           ?>  
        </tbody>
        </table>
    </div>
</div>
