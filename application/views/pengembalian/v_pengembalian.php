<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Tanggal di kembalikan</th>
                    <th>Status</th>
                    <th>Tipe Rusak</th>
                    <th>Denda</th>
                </tr>
            </thead>

            <tbody>
                 
                <?php 
                        foreach ($data as $row) {?>
                            <tr>
                                <td><?= $row['kode_peminjaman']; ?></td>
                                <td><?= $row['nama_anggota']; ?></td>
                                <td><?= $row['judul']; ?></td>
                                <td><?= $row['tgl_pinjam']; ?></td>
                                <td><?= $row['tgl_kembali']; ?></td>
                                <td><?= $row['tgl_kembalikan']; ?></td>
                                <td><?= isset($row['status_denda']) ? $row['status_denda'] : '-'; ?></td>
                                <td><?= isset($row['tipe_rusak']) ? $row['tipe_rusak'] : '-'; ?></td>
                                <td>
                                    <?= ($row['denda'] > 0) ? 'Rp' . number_format($row['denda'], 0, ',', '.') : '-'; ?>
                                </td>
                            </tr>
                       <?php }
                ?>

            </tbody>
        </table>
        
    </div>
</div>

