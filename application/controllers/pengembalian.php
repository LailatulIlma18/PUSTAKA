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
        $isi['data']    = $this->M_Pengembalian->getAllData('DESC');
        $this->load->view('v_dashboard', $isi);
    }
   
    public function kembalikan($id_pinjam)
    {
        $pinjam = $this->M_Peminjaman->getById($id_pinjam);
        $tgl_pinjam    = new DateTime($pinjam->tgl_pinjam);
        $tgl_kembali   = new DateTime($pinjam->tgl_kembali);
        $tgl_sekarang  = new DateTime(date('Y-m-d'));
        $selisih       = max(0, $tgl_sekarang->diff($tgl_kembali)->days);

        $this->M_Pengembalian->simpan($data_pengembalian);
        $this->M_Peminjaman->updateStatus($id_pinjam, 'dikembalikan');
        redirect('pengembalian');
    }

}

?>
