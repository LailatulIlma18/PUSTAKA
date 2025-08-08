<?php 

class Pengembalian extends CI_Controller {

    public function index() {
        $isi['content'] = 'pengembalian/v_pengembalian';
        $isi['judul'] = 'Pengembalian Buku';
        $this->load->model('m_pengembalian');
        $isi['data'] = $this->m_pengembalian->getAllData();
        $this->load->view('v_dashboard', $isi);
    }

    // public function kembalikan($id) {
    //     $data = $this->m_peminjaman->getDataById_peminjaman($id);

    //     $tgl_kembali = new DateTime($data['tgl_kembali']);
    //     $tgl_sekarang = new DateTime();
    //     $selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");
    //         if ($tgl_sekarang > $tgl_kembali) {
    //             $telat = $selisih;
    //             $denda = $telat * 1000;
    //         }else{
    //             $telat = 0;
    //             $denda = 0;
    //         }

    //     $kembalikan = array(
    //         'id_anggota' => $data['id_anggota'],
    //         'id_buku' => $data['id_buku'],
    //         'tgl_pinjam' => $data['tgl_pinjam'],
    //         'tgl_kembali' => $data['tgl_kembali'],
    //         'tgl_kembalikan' => date('Y-m-d'),
    //         'telat' => $telat,
    //         'denda' => $denda
    //     );

        //  $query = $this->db->insert('pengembalian', $kembalikan);
        // if ($query = true) {
        //     $delete = $this->m_peminjaman->deletePeminjaman($id);
        //     if ($delete = true) {
        //         $this->session->set_flashdata('info', 'Buku Berhasil di Kembalikan');
        //         redirect('peminjaman');
        //     }
        // }
    // }
}









?>