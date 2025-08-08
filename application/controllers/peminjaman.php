<?php 

class Peminjaman extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_peminjaman");
    }

    public function index()
    {
        $isi['content'] = 'peminjaman/v_peminjaman';
        $isi['judul'] = "Data Peminjaman Buku";
        $isi ['data'] = $this->m_peminjaman->getDataPeminjaman();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_peminjaman()
    {
        $isi['content'] = 'peminjaman/t_peminjaman';
        $isi['judul'] = "Form Tambah Peminjaman Buku";
        $isi['kode_peminjaman'] = $this->m_peminjaman->kode_peminjaman();
        $isi['peminjam'] = $this->db->get('anggota')->result();
        $isi['buku'] = $this->db->get('buku')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'id_peminjaman' => $this->input->post('id_peminjaman'),
            'kode_peminjaman' => $this->input->post('kode_peminjaman'),
            'id_anggota'    => $this->input->post('id_anggota'),
            'id_buku'       => $this->input->post('id_buku'),
            'tgl_pinjam'    => $this->input->post('tgl_pinjam'),
            'tgl_kembali'   => $this->input->post('tgl_kembali')
        );
        $query = $this->db->insert('peminjaman', $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data Transaksi Peminjaman Berhasil Disimpan');
            redirect ('peminjaman');
        }
    }

    public function jumlah_buku()
    {
        $id = $this->input->post('id');
        $data = $this->m_peminjaman->jumlah_buku($id);
        echo json_encode($data);    
    }

    public function kembalikan($id)
    {
        $data = $this->m_peminjaman->getDataById_peminjaman($id);

        $tgl_kembali = new DateTime($data['tgl_kembali']);
        $tgl_sekarang = new DateTime();
        $selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");
            if ($tgl_sekarang > $tgl_kembali) {
                $telat = $selisih;
                $denda = $telat * 1000;
            }else{
                $telat = 0;
                $denda = 0;
            }

        $kembalikan = array(
            'id_anggota' => $data['id_anggota'],
            'id_buku' => $data['id_buku'],
            'tgl_pinjam' => $data['tgl_pinjam'],
            'tgl_kembali' => $data['tgl_kembali'],
            'tgl_kembalikan' => date('Y-m-d'),
            'telat' => $telat,
            'denda' => $denda
        );

        $query = $this->db->insert('pengembalian', $kembalikan);
        if ($query = true) {
            $delete = $this->m_peminjaman->deletePeminjaman($id);
            if ($denda > 0) {
                $this->session->set_flashdata('info', 'Buku diKembalikan. Denda : Rp ' . number_format($denda, 0, ',', '.'));
            }else{
                $this->session->set_flashdata('info', 'Buku dikembalikan tanpa denda');
             redirect('peminjaman');
            }
        }
    }
}


?>