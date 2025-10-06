<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Peminjaman</title>
<style type="text/css">
    .tgl_akhir { margin-left: -20px; }
    .btn-filter { margin-left: -40px; }
    .btn-refresh { margin-left: -60px; }
    .btn-excel { margin-left: -80px; }

    .badge {
        padding: 4px 10px;
        border-radius: 4px;
        color: #fff;
        font-size: 12px;
        font-weight: bold;
    }
    .badge-warning { background-color: orange; }
    .badge-success { background-color: green; }
</style>


<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css'); ?>">
</head> 

<body>
<div class="box">
<div class="box-header">
    <form method="POST" action="<?= base_url() ?>laporan/peminjaman">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-primary"><b>Filter Laporan Peminjaman</b></h4>
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
                <a href="<?= base_url() ?>laporan/refresh" class="btn btn-warning btn-block btn-refresh">
                    <i class="fa fa-refresh"></i> Refresh
                </a>
            </div>

            <div class="col-md-2">
                <a href="<?= base_url('laporan/export_peminjaman'); ?>" class="btn btn-success btn-block btn-excel">       
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
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?= $row->kode_peminjaman; ?></td>
                    <td><?= $row->nama_anggota; ?></td>
                    <td><?= $row->judul; ?></td>
                    <td data-order="<?= $row->tgl_pinjam ?>"><?= date('d F Y', strtotime($row->tgl_pinjam)); ?></td>
                    <td data-order="<?= $row->tgl_kembali ?>"><?= date('d F Y', strtotime($row->tgl_kembali)); ?></td>
                    <td>
                        <?php if (empty($row->tgl_kembalikan)) { ?>
                            <span class="badge badge-warning">Dipinjam</span>
                        <?php } else { ?>
                            <span class="badge badge-success">Kembali</span>
                        <?php } ?>
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
    "order": [[3, "desc"]], 
    "columnDefs": [
        { "orderable": false, "targets": [5] } 
    ]
});
});
</script>
