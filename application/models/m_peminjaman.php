<?php 

class M_peminjaman extends CI_Model {

    public function kode_peminjaman()
    {
        $this->db->select('RIGHT(peminjaman.id_peminjaman,3) as kode', FALSE);
        $this->db->order_by('id_peminjaman', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('peminjaman');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "TR".$kodemax;
        return $kodejadi;
    }

    public function jumlah_buku($id)
    {
        $this->db->select('jumlah');
        $this->db->from('buku');
        $this->db->where('id_buku', $id);
        return $this->db->get()->row_array();
    }

    public function getDataPeminjaman()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }

    public function getDataById_peminjaman($id)
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $this->db->where('peminjaman.id_peminjaman', $id);
        return $this->db->get()->row_array();
    }

    public function deletePeminjaman($id)
    {
        $this->db->where('id_peminjaman', $id);
        return $this->db->delete('peminjaman');
    }

    public function get_by_id($id)
    {
        $this->db->select('peminjaman.*, anggota.nama_anggota, buku.judul');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
        $this->db->join('buku', 'buku.id_buku = peminjaman.id_buku');
        $this->db->where('peminjaman.id_peminjaman', $id);
        return $this->db->get()->row();
    }


public function getKonfigurasiDenda()
{
    
    $terlambat = $this->db->get_where('konfigurasi_denda', ['jenis' => 'terlambat'])->row_array();
    
    
    $hilang = $this->db->get_where('konfigurasi_denda', ['jenis' => 'hilang'])->row_array();


    $rusak = $this->db->get_where('konfigurasi_denda', ['jenis' => 'rusak'])->row_array();

    return [
        'terlambat' => $terlambat['denda_per_hari'],
        'hilang'    => $hilang['hilang'],
        'rusak'     => [
        'ringan' => $rusak['denda_ringan'],
        'berat'  => $rusak['denda_berat']
        ]
    ];
}  
    public function get_denda()
    {
        return $this->db->get('konfigurasi_denda')->row_array();
    }
   
}

?>
