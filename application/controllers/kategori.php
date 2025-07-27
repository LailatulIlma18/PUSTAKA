<?php 

class kategori Extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
    }
    public function index()
    {
        $isi['content'] = 'kategori/v_kategori';
        $isi['judul'] = 'Kategori Buku';
        $isi['data'] = $this->db->get('kategori')->result();
        $this->load->view('v_dashboard', $isi);
        }

         public function tambah_kategori()
    {
        $isi['content'] = 'kategori/form_kategori';
        $isi['judul'] = 'Form Tambah Kategori Buku';
        $this->load->view('v_dashboard', $isi);
        }

        public function simpan()
        {
            $data['nama_kategori'] = $this->input->post('nama_kategori');
            $query = $this->db->insert('kategori', $data);
            if ($query = true) {
                $this->session->set_flashdata('info', 'Data Berhasil di Simpan');
                redirect ('kategori');
            }
        }

        public function edit($id)
    {
        $isi['content'] = 'kategori/edit_kategori';
        $isi['judul'] = 'Edit Kategori Buku';
        $isi['data'] = $this->m_kategori->edit($id);
        $this->load->view('v_dashboard', $isi);
        }

          public function update()
        {
            $id_kategori = $this->input->post('id_kategori');
            $data['nama_kategori'] = $this->input->post('nama_kategori');
            $query = $this->m_kategori->update($id_kategori, $data);
            if ($query = true) {
                $this->session->set_flashdata('info', 'Data Berhasil di Update');
                redirect ('kategori');
            }
        }

         public function hapus($id)
        {
            $query = $this->m_kategori->hapus($id);
            if ($query = true) {
                $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
                redirect ('kategori');
            }
        }
}




?>