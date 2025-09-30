<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Pengembalian</title>
<style type="text/css">
.tgl_akhir { margin-left: -20px; }
.btn-filter { margin-left: -40px; }
.btn-refresh { margin-left: -60px; }
.btn-excel { margin-left: -80px; }
.status-tepat { color: green; font-weight: bold; }
.status-terlambat { color: red; font-weight: bold; }
.status-rusak { color: brown; font-weight: bold; }
.status-hilang { color: orange; font-weight: bold; }
</style>


<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css'); ?>">
</head>

<body>
<div class="box">
<div class="box-header">
<form method="POST" action="<?= base_url() ?>laporan/pengembalian">
    <div class="row">
        <div class="col-md-3">
            <h4 class="text-primary"><b>Filter Laporan Pengembalian</b></h4>
        </div>
        <div class="col-md-2">
            <input type="text" name="tgl_awal" class="form-control" placeholder="Tanggal Awal" onfocus="(this.type='date')">
        </div>
        <div class="col-md-2">
            <input type="text" name="tgl_akhir" class="form-control tgl_akhir" placeholder="Tanggal Akhir" onfocus="(this.type='date')">
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary btn-block btn-filter">
                <i class="fa fa-filter"></i> Filter
            </button>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url() ?>laporan/pengembalian" class="btn btn-warning btn-block btn-refresh">
                <i class="fa fa-refresh"></i> Refresh
            </a>
        </div> 
        <div class="col-md-2">
            <a href="<?= base_url('laporan/export_pengembalian'); ?>" class="btn btn-success btn-block btn-excel">
                <i class="fa fa-file-excel-o"></i> Export Excel
            </a>
        </div>
    </div>
</form>
</div>

<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Kode Peminjaman</th>
            <th>Peminjam</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Tanggal Dikembalikan</th>
            <th>Status</th>
            <th>Jumlah Hari</th>
            <th>Tipe Rusak</th>
            <th>Denda</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) { ?>
        <tr>
            <td><?= $row->kode_peminjaman; ?></td>
            <td><?= $row->nama_anggota; ?></td>
            <td><?= $row->judul; ?></td>
            <td><?= date('d F Y', strtotime($row->tgl_pinjam)); ?></td>
            <td><?= date('d F Y', strtotime($row->tgl_kembali)); ?></td>

            <td data-order="<?= !empty($row->tgl_kembalikan) ? $row->tgl_kembalikan : '' ?>">
            <?= !empty($row->tgl_kembalikan) ? date('d F Y', strtotime($row->tgl_kembalikan)) : '-' ?>
            </td>

            <?php 
                $status = "Tepat Waktu";
                $class  = "status-tepat";
                $jumlah_hari = "-";

                if ($row->status_denda == 'Terlambat') {
                    $tgl_kembali    = new DateTime($row->tgl_kembali);
                    $tgl_kembalikan = new DateTime($row->tgl_kembalikan);
                    $selisih        = $tgl_kembali->diff($tgl_kembalikan)->days;

                    $jumlah_hari    = $selisih . " Hari";
                    $status         = "Terlambat";
                    $class          = "status-terlambat";
                } elseif ($row->status_denda == 'Rusak') {
                    $status = "Rusak";
                    $class  = "status-rusak";
                } elseif ($row->status_denda == 'Hilang') {
                    $status = "Hilang";
                    $class  = "status-hilang";
                }
            ?>
            <td><span class="<?= $class ?>"><?= $status ?></span></td>
            <td class="<?= ($status == 'Terlambat') ? 'status-terlambat' : '' ?>">
                <?= $jumlah_hari ?>
            </td>
            <td>
                <?php if ($row->status_denda == 'Rusak') { ?>
                    <span class="status-rusak">
                        <?= !empty($row->tipe_rusak) ? $row->tipe_rusak : '-' ?>
                    </span>
                <?php } else { ?>
                    -
                <?php } ?>
            </td>
            <td>
                <?= ($row->denda > 0) ? 'Rp' . number_format($row->denda, 0, ',', '.') : '-'; ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</div> 
</body>
</html>

<script>
$(document).ready(function() {
$('#example1').DataTable({
"order": [[5, "desc"]], 
"columnDefs": [
    { "orderable": false, "targets": [6, 7, 8, 9] }
]
});
});

</script>
