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
                                <td><?= date('d F Y', strtotime($row['tgl_pinjam'])); ?></td>
                                <td><?= date('d F Y', strtotime($row['tgl_kembali'])); ?></td>
								<td>
									<?= !empty($row['tgl_kembalikan'])
									? date ('d F Y', strtotime($row['tgl_kembalikan']))
									: '-'; ?>
								</td>
                                 
                                <td>
									<?php 
									if ($row['status_denda'] == 'Terlambat') {
										$tgl_kembali = new DateTime($row['tgl_kembali']);
										$tgl_kembalikan = new DateTime($row['tgl_kembalikan']);
										$selisih = $tgl_kembalikan->diff($tgl_kembali)->days;
										echo "Terlambat {$selisih} Hari";
									} elseif ($row['status_denda'] == 'Hilang') {
										echo "Hilang";
									} elseif ($row['status_denda'] == 'Rusak') {
										echo "Rusak";
									} else {
										echo "Tepat Waktu";
									}
									?>
								</td>

                                <td>
								<?= ($row['status_denda'] == 'Rusak')
                               ? (!empty ($row['tipe_rusak']) ? $row['tipe_rusak'] : '-')
							   : '-'; ?>
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

