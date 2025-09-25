<?php 

class M_laporan extends CI_Model {

    // =========================
    // Laporan Peminjaman
    // =========================
    public function getAllData($sort = 'DESC')
    {
        return $this->db->select('p.*, a.nama_anggota, b.judul')
                        ->from('peminjaman p')
                        ->join('anggota a', 'a.id_anggota = p.id_anggota')
                        ->join('buku b', 'b.id_buku = p.id_buku')
                        ->order_by('p.tgl_pinjam', $sort)
                        ->order_by('p.id_peminjaman', 'DESC')
                        ->get()
                        ->result();
    }

    public function filterData($tgl_awal, $tgl_akhir, $sort = 'DESC')
    {
        return $this->db->select('p.*, a.nama_anggota, b.judul')
                        ->from('peminjaman p')
                        ->join('anggota a', 'a.id_anggota = p.id_anggota')
                        ->join('buku b', 'b.id_buku = p.id_buku')
                        ->where('p.tgl_pinjam >=', $tgl_awal)
                        ->where('p.tgl_pinjam <=', $tgl_akhir)
                        ->order_by('p.tgl_pinjam', $sort)
                        ->order_by('p.id_peminjaman', 'DESC')
                        ->get()
                        ->result();
    }

    // =========================
    // Laporan Pengembalian
    // =========================
    public function getAllDataPengembalian($sort = 'DESC')
    {
        return $this->db->select('pg.kode_peminjaman, a.nama_anggota, b.judul, pg.tgl_pinjam, pg.tgl_kembali, pg.tgl_kembalikan, pg.telat, pg.denda, pg.status_denda, pg.tipe_rusak')
                        ->from('pengembalian pg')
                        ->join('anggota a', 'a.id_anggota = pg.id_anggota')
                        ->join('buku b', 'b.id_buku = pg.id_buku')
                        ->order_by('pg.tgl_kembalikan', $sort)
                        ->order_by('pg.id_pengembalian', 'DESC')
                        ->get()
                        ->result();
    }

    public function filterDataPengembalian($tgl_awal, $tgl_akhir, $sort = 'DESC')
    {
        return $this->db->select('pg.kode_peminjaman, a.nama_anggota, b.judul, pg.tgl_pinjam, pg.tgl_kembali, pg.tgl_kembalikan, pg.telat, pg.denda, pg.status_denda, pg.tipe_rusak')
                        ->from('pengembalian pg')
                        ->join('anggota a', 'a.id_anggota = pg.id_anggota')
                        ->join('buku b', 'b.id_buku = pg.id_buku')
                        ->where('pg.tgl_kembali >=', $tgl_awal)
                        ->where('pg.tgl_kembali <=', $tgl_akhir)
                        ->order_by('pg.tgl_kembalikan', $sort)
                        ->order_by('pg.id_pengembalian', 'DESC')
                        ->get()
                        ->result();
    }

}

?>
