<table class="table table-bordered">
    <tr>
        <th width="30%">Kode Peminjaman</th>
        <td><?= !empty($detail->kode_peminjaman) ? $detail->kode_peminjaman : '-' ?></td>
    </tr>
    <tr>
        <th>Nama Peminjam</th>
        <td><?= !empty($detail->nama_anggota) ? $detail->nama_anggota : '-' ?></td>
    </tr>
    <tr>
        <th>Judul Buku</th>
        <td><?= !empty($detail->judul) ? $detail->judul : '-' ?></td>
    </tr>
    <tr>
        <th>Penulis</th>
        <td><?= !empty($detail->penulis) ? $detail->penulis : '-' ?></td>
    </tr>
    <tr>
        <th>Penerbit</th>
        <td><?= !empty($detail->penerbit) ? $detail->penerbit : '-' ?></td>
    </tr>
    <tr>
        <th>Tahun Terbit</th>
        <td><?= !empty($detail->tahun_terbit) ? $detail->tahun_terbit : '-' ?></td>
    </tr>
    <tr>
        <th>ISBN</th>
        <td><?= !empty($detail->isbn) ? $detail->isbn : '-' ?></td>
    </tr>
    <tr>
       <th>Kategori</th>
       <td><?= !empty($detail->nama_kategori) ? $detail->nama_kategori : '-' ?></td>
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
    <th>Status</th>
    <td>
    <?php if (empty($detail->tgl_kembalikan)) : ?>
        Dipinjam
    <?php else : ?>
        Kembali 
    <?php endif; ?>
   </td>

    </tr>
</table>
