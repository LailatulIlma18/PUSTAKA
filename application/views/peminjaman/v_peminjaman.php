<?php 
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('info'); ?>
    </div>
<?php } ?>

<div class="row mb-2">
    <div class="col-md-12">
        <a href="<?= base_url('peminjaman/tambah_peminjaman'); ?>" class="btn btn-success">
            <i class="fa fa-plus"></i> Tambah Peminjaman
        </a>
    </div>
</div>

<br>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Peminjaman</h3>
    </div>
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
                <?php foreach ($data as $row) : 
                    $tgl_kembali  = new DateTime($row->tgl_kembali);
                    $tgl_sekarang = new DateTime();
                    $selisih      = $tgl_sekarang->diff($tgl_kembali)->format("%a");
                ?>
                <tr>
                    <td><?= $row->kode_peminjaman; ?></td>
                    <td><?= $row->nama_anggota; ?></td>
                    <td><?= $row->judul; ?></td>
                    <td><?= date('d F Y', strtotime($row->tgl_pinjam)); ?></td>
                    <td><?= date('d F Y', strtotime($row->tgl_kembali)); ?></td>
                    <td>
                        <?php if ($tgl_kembali >= $tgl_sekarang || $selisih == 0) : ?>
                            <span class="badge label-warning text-dark">Dipinjam</span>
                        <?php else : ?>
                            <span class="badge label-danger">Terlambat <?= $selisih; ?> hari</span>
                        <?php endif; ?>
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

<div class="modal fade" id="modalKembalikan<?= $row->id_peminjaman; ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content custom-modal">

      <div class="modal-body text-center p-4">
        <div class="icon-circle mb-3">
          <i class="fa fa-book"></i>
        </div>
        <h5 class="mb-3">Konfirmasi</h5>
        <p class="mb-4">
          Yakin buku <strong>"<?= $row->judul; ?>"</strong> mau dikembalikan?
        </p>

        <div class="d-flex justify-content-center gap-2">
          <button type="button" class="btn btn-light btn-sm px-3" data-dismiss="modal">
            <i class="fa fa-times"></i> Batal
          </button>
          <a href="<?= base_url('peminjaman/form_kembalikan/' . $row->id_peminjaman); ?>" 
             class="btn btn-primary btn-sm px-3">
            <i class="fa fa-check"></i> Ya, Kembalikan
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
.custom-modal {
  border-radius: 20px;
  border: none;
  box-shadow: 0px 8px 25px rgba(0,0,0,0.15);
  animation: scaleIn 0.3s ease;
}

.icon-circle {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  background: #007bff;
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 28px;
  margin: 0 auto;
  box-shadow: 0 4px 10px rgba(0,123,255,0.4);
}

@keyframes scaleIn {
  from { transform: scale(0.8); opacity: 0; }
  to   { transform: scale(1); opacity: 1; }
}
</style>
 </td>     
  </tr>
  <?php endforeach; ?>
  </tbody>
  </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#example1').DataTable({
        "order": [[3, "desc"]], 
        "columnDefs": [
            { "orderable": false, "targets": [0, 7] } 
        ]
    });
});
</script>
