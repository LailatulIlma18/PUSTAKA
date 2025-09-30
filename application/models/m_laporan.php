<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

// Laporan Peminjaman
public function getAllData()
{
    $this->db->select('p.*, a.nama_anggota, b.judul');
    $this->db->from('peminjaman p');
    $this->db->join('anggota a', 'a.id_anggota = p.id_anggota');
    $this->db->join('buku b', 'b.id_buku = p.id_buku');
    $this->db->order_by('p.tgl_pinjam', 'DESC');
    $this->db->order_by('p.id_peminjaman', 'DESC');
    return $this->db->get()->result();
}

public function filterData($tgl_awal, $tgl_akhir)
{
    $this->db->select('p.*, a.nama_anggota, b.judul');
    $this->db->from('peminjaman p');
    $this->db->join('anggota a', 'a.id_anggota = p.id_anggota');
    $this->db->join('buku b', 'b.id_buku = p.id_buku');
    $this->db->where('p.tgl_pinjam >=', $tgl_awal);
    $this->db->where('p.tgl_pinjam <=', $tgl_akhir);
    $this->db->order_by('p.tgl_pinjam', 'DESC');
    $this->db->order_by('p.id_peminjaman', 'DESC');
    return $this->db->get()->result();
}


// Laporan Pengembalian
public function getAllDataPengembalian()
{
    $this->db->select('pg.*, a.nama_anggota, b.judul');
    $this->db->from('pengembalian pg');
    $this->db->join('anggota a', 'a.id_anggota = pg.id_anggota');
    $this->db->join('buku b', 'b.id_buku = pg.id_buku');
    $this->db->order_by('pg.tgl_kembalikan', 'DESC');
    $this->db->order_by('pg.id_pengembalian', 'DESC');
    return $this->db->get()->result();
}

public function filterDataPengembalian($tgl_awal, $tgl_akhir)
{
    $this->db->select('pg.*, a.nama_anggota, b.judul');
    $this->db->from('pengembalian pg');
    $this->db->join('anggota a', 'a.id_anggota = pg.id_anggota');
    $this->db->join('buku b', 'b.id_buku = pg.id_buku');
    $this->db->where('pg.tgl_kembalikan >=', $tgl_awal);
    $this->db->where('pg.tgl_kembalikan <=', $tgl_akhir);
    $this->db->order_by('pg.tgl_kembalikan', 'DESC');
    $this->db->order_by('pg.id_pengembalian', 'DESC');
    return $this->db->get()->result();
}
}
