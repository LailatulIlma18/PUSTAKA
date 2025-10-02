<?php 

class Kategori extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
        $this->load->library('form_validation');
    }

    public function index()
{
    $isi['judul']   = 'Kategori Buku';
    $isi['data']    = $this->m_kategori->get_all();
    $isi['content'] = 'kategori/v_kategori';
    $this->load->view('v_dashboard', $isi);
}

    public function tambah_kategori()
    {
        $isi['content'] = 'kategori/form_kategori';
        $isi['judul']   = 'Form Tambah Kategori Buku';
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('kategori/tambah_kategori');
        } else {
            $data['nama_kategori'] = $this->input->post('nama_kategori', TRUE);
            $query = $this->db->insert('kategori', $data);
            if ($query) {
                $this->session->set_flashdata('info', 'Data Berhasil di Simpan');
            } else {
                $this->session->set_flashdata('info', 'Data Gagal di Simpan');
            }
            redirect('kategori');
        }
    }

    public function simpan_ajax()
    {
        $nama = $this->input->post('nama_kategori', TRUE);

        if (empty($nama)) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Nama kategori wajib diisi'
            ]);
            return;
        }

        $data = ['nama_kategori' => $nama];
        $this->db->insert('kategori', $data);

        if ($this->db->affected_rows() > 0) {
            echo json_encode([
                'status' => 'success',
                'id'     => $this->db->insert_id(),
                'nama'   => $nama
            ]);
        } else {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Gagal menyimpan kategori'
            ]);
        }
    }

    public function edit($id)
    {
        $isi['content'] = 'kategori/edit_kategori';
        $isi['judul']   = 'Edit Kategori Buku';
        $isi['data']    = $this->m_kategori->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        $id_kategori = $this->input->post('id_kategori');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('kategori/edit/' . $id_kategori);
        } else {
            $data['nama_kategori'] = $this->input->post('nama_kategori', TRUE);
            $query = $this->m_kategori->update($id_kategori, $data);
            if ($query) {
                $this->session->set_flashdata('info', 'Data Berhasil di Update');
            } else {
                $this->session->set_flashdata('info', 'Data Gagal di Update');
            }
            redirect('kategori');
        }
    }

    public function hapus($id)
    {
        $query = $this->m_kategori->hapus($id);
        if ($query) {
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
        } else {
            $this->session->set_flashdata('info', 'Data Gagal di Hapus');
        }
        redirect('kategori');
    }
}
