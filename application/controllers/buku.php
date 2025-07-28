<?php 
class Buku Extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_buku');
    }

    public function index ()
    {
        $isi['content'] = 'buku/v_buku';
        $isi['judul'] = 'Daftar Data Buku';
        $isi['data'] = $this->m_buku->get_data_buku();
        $this->load->view('v_dashboard', $isi);
    }

     public function tambah_buku()
    {
        $isi['content'] = 'buku/form_buku';
        $isi['judul'] = 'Form Tambah Buku';
        $isi['id_buku'] = $this->m_buku->id_buku();
        $isi['kategori'] = $this->db->get('kategori')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan ()
    {
        $data = array (
            'id_buku'       => $this->input->post('id_buku'),
            'judul'         => $this->input->post('judul'),
            'id_kategori'   => $this->input->post('id_kategori'),
            'penulis'       => $this->input->post('penulis'),
            'penerbit'      => $this->input->post('penerbit'),
            'tahun_terbit'  => $this->input->post('tahun_terbit'),
            'isbn'          => $this->input->post('isbn'),
            'jumlah'        => $this->input->post('jumlah')
        );

        $query = $this->db->insert('buku', $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data Buku Berhasil di simpan');
            redirect('buku');
        } else {
            $this->session->set_flashdata('info', 'Data Buku Gagal di simpan');
            redirect('buku/tambah_buku');
        }
    }

     public function edit($id)
    {
        $isi['content'] = 'buku/edit_buku';
        $isi['judul'] = 'Form Edit Data Buku';
        $isi['kategori'] = $this->db->get('kategori')->result();
        $isi['data'] = $this->m_buku->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

     public function update()
    {   
        $id_buku = $this->input->post('id_buku');
        $data = array (
            'id_buku'       => $this->input->post('id_buku'),
            'judul'         => $this->input->post('judul'),
            'id_kategori'   => $this->input->post('id_kategori'),
            'penulis'       => $this->input->post('penulis'),
            'penerbit'      => $this->input->post('penerbit'),
            'tahun_terbit'  => $this->input->post('tahun_terbit'),
            'isbn'          => $this->input->post('isbn'),
            'jumlah'        => $this->input->post('jumlah')
        );

        $query = $this->m_buku->update($id_buku, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Buku Berhasil di Update');
            redirect('buku');
        } 
    }

     public function delete($id)
     {
        $query = $this->m_buku->delete($id);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Buku Berhasil di Hapus');
            redirect('buku');
        }
     }



}





?>