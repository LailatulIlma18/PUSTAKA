<?php 

class M_laporan extends CI_Model {

    public function getAllData()
    {
        $this->db->select("*");
        $this->db->from("peminjaman");
        $this->db->join('anggota','peminjaman.id_anggota = anggota.id_anggota');
        $this->db->join('buku','peminjaman.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }

    public function filterData($tgl_awal, $tgl_akhir)
    {
        $this->db->select("*");
        $this->db->from("peminjaman");
        $this->db->join('anggota','peminjaman.id_anggota = anggota.id_anggota');
        $this->db->join('buku','peminjaman.id_buku = buku.id_buku');
        $this->db->where('peminjaman.tgl_pinjam >=', $tgl_awal);
        $this->db->where('peminjaman.tgl_pinjam <=', $tgl_akhir);
        return $this->db->get()->result();
    }

 // pengembalian
   
public function getAllDataPengembalian()
{
    return $this->db->select('pengembalian.kode_peminjaman, anggota.nama_anggota, buku.judul, pengembalian.tgl_pinjam, pengembalian.tgl_kembali, pengembalian.tgl_kembalikan,  pengembalian.status_denda, pengembalian.tipe_rusak, pengembalian.telat, pengembalian.denda')
                    ->from('pengembalian')
                    ->join('anggota', 'anggota.id_anggota = pengembalian.id_anggota')
                    ->join('buku', 'buku.id_buku = pengembalian.id_buku')
                    ->get()
                    ->result();
}

public function filterDataPengembalian($tgl_awal, $tgl_akhir)
{
    return $this->db->select('pengembalian.kode_peminjaman, anggota.nama_anggota, buku.judul, pengembalian.tgl_pinjam, pengembalian.tgl_kembali, pengembalian.tgl_kembalikan,  pengembalian.status_denda, pengembalian.tipe_rusak, pengembalian.telat, pengembalian.denda')
                    ->from('pengembalian')
                    ->join('anggota', 'anggota.id_anggota = pengembalian.id_anggota')
                    ->join('buku', 'buku.id_buku = pengembalian.id_buku')
                    ->where('pengembalian.tgl_kembali >=', $tgl_awal)
                    ->where('pengembalian.tgl_kembali <=', $tgl_akhir)
                    ->get()
                    ->result();
}



}


?>
