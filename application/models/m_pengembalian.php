<?php
class M_Pengembalian extends CI_Model {

    public function getAllData($sort = 'DESC')
    {
        $this->db->select('p.*,  m.nama_anggota, b.judul');
        $this->db->from('pengembalian p');
        $this->db->join('anggota m', 'p.id_anggota = m.id_anggota', 'left');
        $this->db->join('buku b', 'p.id_buku = b.id_buku', 'left');
        $this->db->order_by('p.tgl_kembalikan', 'DESC'); // DESC by default
        $this->db->order_by('p.id_pengembalian', 'DESC');
        return $this->db->get()->result_array();
    }
    public function simpan($data)
    {
        $this->db->insert('pengembalian', $data);
        if (isset($data['id_peminjaman'])) {
        $this->db->where('id_peminjaman', $data['id_peminjaman']);
        return $this->db->delete('peminjaman');
    }
    }
     public function getById($id)
    {
        $this->db->select('p.*, m.nama_anggota, b.judul');
        $this->db->from('pengembalian p');
        $this->db->join('anggota m', 'p.id_anggota = m.id_anggota', 'left');
        $this->db->join('buku b', 'p.id_buku = b.id_buku', 'left');
        $this->db->where('p.id_pengembalian', $id);
        return $this->db->get()->row();
    }
}



?>
