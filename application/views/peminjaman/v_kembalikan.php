<?php
$tarif_hilang        = $konfigurasi['denda_hilang'] ?? 0;
$tarif_rusak_ringan  = $konfigurasi['denda_rusak_ringan'] ?? 0;
$tarif_rusak_berat   = $konfigurasi['denda_rusak_berat'] ?? 0;

// Hitung keterlambatan & denda otomatis
$tgl_kembali   = new DateTime($peminjaman['tgl_kembali']);
$tgl_sekarang  = new DateTime(date('Y-m-d'));
$selisih       = $tgl_kembali->diff($tgl_sekarang)->days;

if ($tgl_sekarang > $tgl_kembali) {
    $hari_terlambat  = $selisih;
    $denda_terlambat = $hari_terlambat * $konfigurasi['terlambat']; 
} else {
    $hari_terlambat  = 0;
    $denda_terlambat = 0;
}
?>

<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul; ?></h3>
        </div>

        <form method="post" action="<?= base_url('peminjaman/proses_kembalikan'); ?>" class="form-horizontal">
            <input type="hidden" name="id_peminjaman" value="<?= $peminjaman['id_peminjaman']; ?>">
            <input type="hidden" name="kode_peminjaman" value="<?= $peminjaman['kode_peminjaman']; ?>">
            <input type="hidden" name="id_anggota" value="<?= $peminjaman['id_anggota']; ?>">
            <input type="hidden" name="id_buku" value="<?= $peminjaman['id_buku']; ?>">

            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Transaksi</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $peminjaman['kode_peminjaman']; ?>" class="form-control" readonly>
                    </div>
                </div>

                <input type="hidden" name="tgl_pinjam" value="<?= $peminjaman['tgl_pinjam']; ?>">
                <input type="hidden" name="tgl_kembali" value="<?= $peminjaman['tgl_kembali']; ?>">


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
                            <option value="Terlambat">Terlambat</option>
                            <option value="Hilang">Hilang</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Tepat Waktu" <?= $hari_terlambat == 0 ? 'selected' : '' ?>>Tepat Waktu</option>
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

                <div class="form-group" id="form_terlambat_div" <?= $hari_terlambat > 0 ? '' : 'style="display:none;"' ?>>
                    <label class="col-sm-2 control-label">Hari Terlambat</label>
                    <div class="col-sm-10">
                        <input type="number" name="hari_terlambat" id="hari_terlambat" value="<?= $hari_terlambat ?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group" id="form_denda_div" <?= $hari_terlambat > 0 ? '' : 'style="display:none;"' ?>>
                    <label class="col-sm-2 control-label">Jumlah Denda (Rp)</label>
                    <div class="col-sm-10">
                        <input type="number" name="denda" id="denda" value="<?= $denda_terlambat ?>" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <a href="<?= base_url('peminjaman'); ?>" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Kembalikan</button>
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
    const formTerlambatDiv = document.getElementById('form_terlambat_div');
    const hariTerlambatInput = document.getElementById('hari_terlambat');

    statusDendaSelect.addEventListener('change', function() {
        const status = this.value;

        if (status === 'Rusak') {
            tipeRusakDiv.style.display = 'block';
            formTerlambatDiv.style.display = 'none';
            formDendaDiv.style.display = 'block';
            dendaInput.value = '';
        } 
        else if (status === 'Terlambat') {
            tipeRusakDiv.style.display = 'none';
            formTerlambatDiv.style.display = 'block';
            formDendaDiv.style.display = 'block';
            dendaInput.value = hariTerlambatInput.value * dendaConfig['Terlambat'];
        } 
        else if (status === 'Hilang') {
            tipeRusakDiv.style.display = 'none';
            formTerlambatDiv.style.display = 'none';
            formDendaDiv.style.display = 'block';
            dendaInput.value = dendaConfig['Hilang'];
        } 
        else {
            tipeRusakDiv.style.display = 'none';
            formTerlambatDiv.style.display = 'none';
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
