<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Tanggal di kembalikan</th>
                    <th>Terlambat</th>
                    <th>Denda</th>
                </tr>
            </thead>

            <tbody>
                 
                <?php 
                     $no = 1;
                        foreach ($data as $row) {?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_anggota']; ?></td>
                                <td><?= $row['judul']; ?></td>
                                <td><?= $row['tgl_pinjam']; ?></td>
                                <td><?= $row['tgl_kembali']; ?></td>
                                <td><?= $row['tgl_kembalikan']; ?></td>
                                <td>
                                    <?= ($row['telat'] > 0) ? $row ['telat'] . ' hari' : 'Tepat Waktu'; ?>
                                </td>
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