<?php 
class Buku extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_buku');
    }

    public function index ()
    {
        $isi['content']= 'buku/v_buku';
        $isi['judul'] = 'Daftar Data Buku';
        $isi['data'] = $this->m_buku->get_data_buku();
        $this->load->view('v_dashboard', $isi);
    }

     public function tambah_buku()
    {
        $isi['content'] = 'buku/form_buku';
        $isi['judul'] = 'Form Tambah Buku';
        $isi['kode_buku'] = $this->m_buku->kode_buku();
        $isi['kategori'] = $this->db->get('kategori')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan ()
    {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required|trim');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|numeric|trim');
        $this->form_validation->set_rules('isbn', 'ISBN', 'required|numeric|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|integer|greater_than_equal_to[0]');


	    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('buku/tambah_buku');

		} else {
        $data = array (
            'kode_buku'     => $this->input->post('kode_buku', TRUE),
            'judul'         => $this->input->post('judul', TRUE),
            'id_kategori'   => $this->input->post('id_kategori', TRUE),
            'penulis'       => $this->input->post('penulis', TRUE),
            'penerbit'      => $this->input->post('penerbit', TRUE),
            'tahun_terbit'  => $this->input->post('tahun_terbit', TRUE),
            'isbn'          => $this->input->post('isbn', TRUE),
            'jumlah'        => $this->input->post('jumlah', TRUE)
        );
        $query = $this->db->insert('buku', $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data Berhasil di simpan');
        } else {
            $this->session->set_flashdata('info', 'Data Gagal di simpan'); 
        }
		 redirect('buku');
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
		$this->load->library('form_validation');

		$this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required|trim');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|numeric|trim');
        $this->form_validation->set_rules('isbn', 'ISBN', 'required|numeric|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric|trim');

        $id_buku = $this->input->post('id_buku',TRUE);

		 if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('buku/edit/' . $id_buku);
        } else {
        $data = array (
            'kode_buku'     => $this->input->post('kode_buku', TRUE),
            'judul'         => $this->input->post('judul', TRUE),
            'id_kategori'   => $this->input->post('id_kategori', TRUE),
            'penulis'       => $this->input->post('penulis', TRUE),
            'penerbit'      => $this->input->post('penerbit', TRUE),
            'tahun_terbit'  => $this->input->post('tahun_terbit', TRUE),
            'isbn'          => $this->input->post('isbn', TRUE),
            'jumlah'        => $this->input->post('jumlah', TRUE)
        );
        $query = $this->m_buku->update($id_buku, $data);
        if ($query ) {
			if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('info', 'Data Berhasil di Update');
        } else {
			$this->session->set_flashdata('info', 'Data Belum Berhasil di Update');
		}
		 redirect('buku');
    }
}
	}

     public function hapus ($id)
     {
        $query = $this->m_buku->hapus($id);
        if ($query) {
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
            } else {
				$this->session->set_flashdata('info','Data Gagal di Hapus');
			}
			redirect('buku');
	 }

	}

?>
