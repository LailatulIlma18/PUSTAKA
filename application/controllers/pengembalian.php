<?php 

class Pengembalian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Pengembalian');
        $this->load->model('M_Peminjaman');
    }
    
    public function index() {
        $isi['content'] = 'pengembalian/v_pengembalian';
        $isi['judul']   = 'Pengembalian Buku';
        $isi['data']    = $this->M_Pengembalian->getAllData();
        $this->load->view('v_dashboard', $isi);
    }
   
    public function kembalikan($id_pinjam)
    {
        $pinjam = $this->M_Peminjaman->getById($id_pinjam);
        $tgl_pinjam    = new DateTime($pinjam->tgl_pinjam);
        $tgl_kembali   = new DateTime($pinjam->tgl_kembali);
        $tgl_sekarang  = new DateTime(date('Y-m-d'));
        $selisih       = max(0, $tgl_sekarang->diff($tgl_kembali)->days);

        if ($pinjam->kondisi_buku == 'hilang') {
            $status_buku = 'Hilang';
            $denda = 60000;
        } elseif ($pinjam->kondisi_buku == 'rusak') {
            $status_buku = 'Rusak';
            $denda = 30000;
        } elseif ($tgl_sekarang > $tgl_kembali) {
            $status_buku = 'Terlambat';
            $denda = $selisih * 1000; 
        } else {
            $status_buku = 'Tepat Waktu';
            $denda = 0;
        }

       $data_pengembalian = [
        'id_peminjaman'  => $pinjam->id_peminjaman,
        'id_anggota'     => $pinjam->id_anggota,
        'id_buku'        => $pinjam->id_buku,
        'kode_peminjaman'  => $pinjam->kode_peminjaman,
        'tgl_pinjam'     => $pinjam->tgl_pinjam,
        'tgl_kembali'    => $this->tgl_kembali,
        'tgl_kembalikan' => date('Y-m-d'), 
        'status_denda'   => $status_buku,
        'tipe_rusak'     => $pinjam->tipe_rusak,
        'denda'          => $denda
   ];
        $this->M_Pengembalian->simpan($data_pengembalian);
        $this->M_Peminjaman->updateStatus($id_pinjam, 'dikembalikan');
        redirect('pengembalian');
    }

}
