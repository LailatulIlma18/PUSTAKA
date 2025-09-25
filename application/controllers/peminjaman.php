<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Peminjaman');
        $this->load->model('M_Pengembalian');
    }

    public function index()
    {
        $isi['content'] = 'peminjaman/v_peminjaman';
        $isi['judul']   = "Data Peminjaman Buku";

        // ambil data, urutkan berdasarkan tanggal pinjam terbaru
        $this->db->order_by('tgl_pinjam', 'DESC');  
        $isi['data'] = $this->M_Peminjaman->getDataPeminjaman();

        $konfigurasi_denda       = $this->M_Peminjaman->getKonfigurasiDenda();
        $isi['denda_per_hari']   = isset($konfigurasi_denda['terlambat']) ? $konfigurasi_denda['terlambat'] : 0;

        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_peminjaman()
    {
        $isi['content']         = 'peminjaman/t_peminjaman';
        $isi['judul']           = "Form Tambah Peminjaman Buku";
        $isi['kode_peminjaman'] = $this->M_Peminjaman->kode_peminjaman();
        $isi['peminjam']        = $this->db->get('anggota')->result();
        $isi['buku']            = $this->db->get('buku')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('kode_peminjaman', 'Kode Peminjaman', 'required');
        $this->form_validation->set_rules('id_anggota', 'Anggota', 'required|numeric');
        $this->form_validation->set_rules('id_buku', 'Buku', 'required|numeric');
        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('peminjaman/tambah_peminjaman');
        } else {
            $data = [
                'kode_peminjaman'=> $this->input->post('kode_peminjaman', TRUE),
                'id_anggota'     => $this->input->post('id_anggota', TRUE),
                'id_buku'        => $this->input->post('id_buku', TRUE),
                'tgl_pinjam'     => $this->input->post('tgl_pinjam', TRUE),
                'tgl_kembali'    => $this->input->post('tgl_kembali', TRUE)
            ];
            $query = $this->db->insert('peminjaman', $data);
            if ($query) {
                $this->session->set_flashdata('info', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('info', 'Data Gagal Disimpan');
            }
            redirect('peminjaman');
        }
    }

    public function form_kembalikan($id)
    {
        $data = $this->M_Peminjaman->getDataById_peminjaman($id);
        if (!$data) redirect('peminjaman');

        $isi['content']     = 'peminjaman/v_kembalikan';
        $isi['judul']       = "Form Pengembalian Buku";
        $isi['peminjaman']  = $data;
        $isi['konfigurasi'] = $this->M_Peminjaman->getKonfigurasiDenda();
        $this->load->view('v_dashboard', $isi);
    }

    public function proses_kembalikan()
    {
        $data = [
            'id_peminjaman'   => $this->input->post('id_peminjaman'),
            'kode_peminjaman' => $this->input->post('kode_peminjaman'),
            'id_anggota'      => $this->input->post('id_anggota'),
            'id_buku'         => $this->input->post('id_buku'),
            'tgl_pinjam'      => $this->input->post('tgl_pinjam'),
            'tgl_kembali'     => $this->input->post('tgl_kembali'),
            'tgl_kembalikan'  => date('Y-m-d'), 
            'status_denda'    => $this->input->post('status_denda'),
            'tipe_rusak'      => $this->input->post('tipe_rusak') ?: '-',
            'denda'           => $this->input->post('denda') ?: 0
        ];

        $this->M_Pengembalian->simpan($data); 
        redirect('pengembalian'); 
    }
}
