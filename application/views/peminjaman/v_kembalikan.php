<?php
// $peminjaman = data peminjaman array, $konfigurasi = konfigurasi denda
?>

<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul; ?></h3>
        </div>

        <form method="post" action="<?= base_url('peminjaman/proses_kembalikan'); ?>" class="form-horizontal">
            <input type="hidden" name="id_peminjaman" value="<?= $peminjaman['id_peminjaman']; ?>">
            <input type="hidden" name="id_anggota" value="<?= $peminjaman['id_anggota']; ?>">
            <input type="hidden" name="id_buku" value="<?= $peminjaman['id_buku']; ?>">
            <input type="hidden" name="tgl_pinjam" value="<?= $peminjaman['tgl_pinjam']; ?>">
            <input type="hidden" name="tgl_kembali" value="<?= $peminjaman['tgl_kembali']; ?>">

            <div class="box-body">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Transaksi</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $peminjaman['kode_peminjaman']; ?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Peminjam</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $peminjaman['nama_anggota']; ?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $peminjaman['judul']; ?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Status Denda</label>
                    <div class="col-sm-10">
                        <select name="status_denda" id="status_denda" class="form-control" required>
                            <option value="">-- Pilih Status Denda --</option>
                            <option value="Terlambat">Terlambat</option>
                            <option value="Hilang">Hilang</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Tepat Waktu">Tepat Waktu</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" id="tipe_rusak_div" style="display:none;">
                    <label class="col-sm-2 control-label">Tipe Rusak</label>
                    <div class="col-sm-10">
                        <select name="tipe_rusak" id="tipe_rusak" class="form-control">
                            <option value="">-- Pilih Tipe Rusak --</option>
                            <option value="ringan">Ringan</option>
                            <option value="berat">Berat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" id="form_denda_div" style="display:none;">
                    <label class="col-sm-2 control-label">Jumlah Denda (Rp)</label>
                    <div class="col-sm-10">
                        <input type="number"  name="denda" id="denda"  value="" class="form-control" readonly>
                    </div>
                </div>

            </div>

            <div class="box-footer">
                <a href="<?= base_url('peminjaman'); ?>" class="btn btn-Primary">Cancel</a>
                <button type="submit" class="btn btn-warning">Kembalikan</button>
            </div>
        </form>
    </div>
</div>



<script>
    const dendaConfig = {
        'Terlambat': <?= $konfigurasi['terlambat']; ?>,
        'Hilang': <?= $konfigurasi['hilang']; ?>,
        'Rusak': {
            'ringan': <?= $konfigurasi['rusak']['ringan']; ?>,
            'berat': <?= $konfigurasi['rusak']['berat']; ?>
        }
    };

    const statusDendaSelect = document.getElementById('status_denda');
    const tipeRusakDiv = document.getElementById('tipe_rusak_div');
    const tipeRusakSelect = document.getElementById('tipe_rusak');
    const formDendaDiv = document.getElementById('form_denda_div');
    const dendaInput = document.getElementById('denda');

    statusDendaSelect.addEventListener('change', function() {
        const status = this.value;

        if (status === 'Rusak') {
            tipeRusakDiv.style.display = 'block';
            formDendaDiv.style.display = 'block';
            dendaInput.value = '';
        } else if (status === 'Terlambat' || status === 'Hilang') {
            tipeRusakDiv.style.display = 'none';
            formDendaDiv.style.display = 'block';
            dendaInput.value = dendaConfig[status];
        } else {
            tipeRusakDiv.style.display = 'none';
            formDendaDiv.style.display = 'none';
            dendaInput.value = '';
        }
    });

    tipeRusakSelect.addEventListener('change', function() {
        const tipe = this.value;
        if (tipe && dendaConfig['Rusak'][tipe] !== undefined) {
            dendaInput.value = dendaConfig['Rusak'][tipe];
        } else {
            dendaInput.value = '';
        }
    });
</script>
