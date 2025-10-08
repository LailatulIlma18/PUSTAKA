<?php if (!empty($detail)) { ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <th width="30%">Kode Peminjaman</th>
                <td><?= $detail->kode_peminjaman ?></td>
            </tr>
            <tr>
                <th>Nama Anggota</th>
                <td><?= $detail->nama_anggota ?></td>
            </tr>
            <tr>
                <th>Judul Buku</th>
                <td><b><?= $detail->judul ?></b></td>
            </tr>
			<tr>
                <th>Kategori</th>
                <td><?= !empty($detail->nama_kategori) ? $detail->nama_kategori : '-' ?></td>
            </tr>
            <tr>
                <th>Penulis</th>
                <td><?= $detail->penulis ?></td>
            </tr>
            <tr>
                <th>Penerbit</th>
                <td><?= $detail->penerbit ?></td>
            </tr>
            <tr>
                <th>Tahun Terbit</th>
                <td><?= $detail->tahun_terbit ?></td>
            </tr>
			<tr>
                <th>ISBN</th>
                <td><?= !empty($detail->isbn) ? $detail->isbn : '-' ?></td>
            </tr>
            <tr>
                <th>Tanggal Pinjam</th>
                <td><?= !empty($detail->tgl_pinjam) ? date('d F Y', strtotime($detail->tgl_pinjam)) : '-' ?></td>
            </tr>
            <tr>
                <th>Tanggal Kembali</th>
                <td><?= !empty($detail->tgl_kembali) ? date('d F Y', strtotime($detail->tgl_kembali)) : '-' ?></td>
            </tr>
            <tr>
                <th>Tanggal Dikembalikan</th>
                <td><?= !empty($detail->tgl_kembalikan) ? date('d F Y', strtotime($detail->tgl_kembalikan)) : '-' ?></td>
            </tr>
            <tr>
                <th>Jumlah Hari</th>
                <td>
                    <?php
                        if (!empty($detail->tgl_kembali) && !empty($detail->tgl_kembalikan)) {
                            $tglKembali = new DateTime($detail->tgl_kembali);
                            $tglDikembalikan = new DateTime($detail->tgl_kembalikan);
                            $diff = $tglKembali->diff($tglDikembalikan)->days;
                            echo ($tglDikembalikan > $tglKembali) ? $diff . ' hari' : '0 hari';
                        } else {
                            echo '-';
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <?php if ($detail->status_denda == 'Terlambat') { ?>
                        <span class="badge badge-danger">Terlambat</span>
                    <?php } elseif ($detail->status_denda == 'Rusak') { ?>
                        <span class="badge badge-warning">Rusak</span>
                    <?php } elseif ($detail->status_denda == 'Hilang') { ?>
                        <span class="badge badge-dark">Hilang</span>
                    <?php } else { ?>
                        <span class="badge badge-success">Tepat Waktu</span>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th>Tipe Rusak</th>
                <td><?= !empty($detail->tipe_rusak) ? $detail->tipe_rusak : '-' ?></td>
            </tr>
            <tr>
                <th>Denda</th>
                <td><?= ($detail->denda > 0) ? 'Rp' . number_format($detail->denda, 0, ',', '.') : '-' ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?php } else { ?>
<div class="alert alert-warning text-center">
    <i class="fa fa-exclamation-triangle"></i> Data tidak ditemukan.
</div>
<?php } ?>

