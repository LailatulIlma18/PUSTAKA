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
    $isi['data']    = $this->M_Peminjaman->getDataPeminjaman();

    
    $konfigurasi_denda = $this->M_Peminjaman->getKonfigurasiDenda();

    
    $denda_per_hari = isset($konfigurasi_denda['terlambat']) ? $konfigurasi_denda['terlambat'] : 0;

    
    $isi['denda_per_hari'] = $denda_per_hari;

    $this->load->view('v_dashboard', $isi);
}

    public function tambah_peminjaman()
    {
        $isi['content']        = 'peminjaman/t_peminjaman';
        $isi['judul']          = "Form Tambah Peminjaman Buku";
        $isi['kode_peminjaman'] = $this->M_Peminjaman->kode_peminjaman();
        $isi['peminjam']       = $this->db->get('anggota')->result();
        $isi['buku']           = $this->db->get('buku')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $data = [
            'id_peminjaman' => $this->input->post('id_peminjaman'),
            'kode_peminjaman' => $this->input->post('kode_peminjaman'),
            'id_anggota'    => $this->input->post('id_anggota'),
            'id_buku'       => $this->input->post('id_buku'),
            'tgl_pinjam'    => $this->input->post('tgl_pinjam'),
            'tgl_kembali'   => $this->input->post('tgl_kembali')
        ];

        $this->db->insert('peminjaman', $data);
        $this->session->set_flashdata('info', 'Data Transaksi Peminjaman Berhasil Disimpan');
        redirect('peminjaman');
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
            'kode_peminjaman'   => $this->input->post('kode_peminjaman'),
            'id_anggota'      => $this->input->post('id_anggota'),
            'id_buku'         => $this->input->post('id_buku'),
            'tgl_pinjam'      => $this->input->post('tgl_pinjam'),
            'tgl_kembali'     => $this->input->post('tgl_kembali'),
            'tgl_kembalikan'  => date('Y-m-d'),
            'status_denda'    => $this->input->post('status_denda'),
            'tipe_rusak'      => $this->input->post('tipe_rusak'),
            'denda'           => $this->input->post('denda')
        ];

        $this->M_Pengembalian->simpan($data);
        redirect('pengembalian');
    }
}
