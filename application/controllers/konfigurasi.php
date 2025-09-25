<?php

class Konfigurasi extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('m_konfigurasi');
    }

    public function index()
    {
        $isi['content'] = 'konfigurasi/v_konfigurasi';
        $isi['judul'] = "konfigurasi Denda";
        $isi ['data'] = $this->db->get ('konfigurasi_denda')->result();
        $this->load->view('v_dashboard', $isi);
    }

	  public function tambah_konfigurasi()
    {
        $isi['content'] = 'konfigurasi/form_konfigurasi';
        $isi['judul'] = 'Form Tambah Konfigurasi Denda';
        $this->load->view('v_dashboard', $isi);
        }

        public function simpan()
        {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('jenis', 'Jenis', 'required');
            $this->form_validation->set_rules('denda_per_hari', 'Denda per Hari', 'required|numeric');
            $this->form_validation->set_rules('denda_per_bulan', 'Denda per Bulan', 'required|numeric');
            $this->form_validation->set_rules('denda_per_tahun', 'Denda per Tahun', 'required|numeric');
            $this->form_validation->set_rules('denda_ringan', 'Denda Ringan', 'required|numeric');
            $this->form_validation->set_rules('denda_berat', 'Denda Berat', 'required|numeric');
            $this->form_validation->set_rules('hilang', 'Hilang', 'required|numeric');

			if ($this->form_validation->run() == FALSE) {
			  $this->session->set_flashdata('error', validation_errors());
			  redirect('konfigurasi/tambah_konfigurasi');
			} else {
			 $data = array(
            'jenis' => $this->input->post('jenis', TRUE),
			'denda_per_hari' => $this->input->post('denda_per_hari', TRUE),
			'denda_per_bulan' => $this->input->post('denda_per_bulan', TRUE),
			'denda_per_tahun' => $this->input->post('denda_per_tahun', TRUE),
			'denda_ringan' => $this->input->post('denda_ringan', TRUE),
		    'denda_berat' => $this->input->post('denda_berat', TRUE),
		    'hilang' => $this->input->post('hilang', TRUE)
			);
            $query = $this->db->insert('konfigurasi_denda', $data);
            if ($query) {
                $this->session->set_flashdata('info', 'Data Berhasil di Simpan');
            } else {
                 $this->session->set_flashdata('info', 'Data Berhasil di Simpan');
			}
			  redirect ('konfigurasi');
        }
	}

	  public function edit($id)
    {
        $isi['content'] = 'konfigurasi/edit_konfigurasi';
        $isi['judul'] = 'Edit Konfigurasi Denda';
        $isi['data'] = $this->m_konfigurasi->edit($id);
        $this->load->view('v_dashboard', $isi);
        }

          public function update()
        {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('jenis', 'Jenis', 'required');
            $this->form_validation->set_rules('denda_per_hari', 'Denda per Hari', 'required|numeric');
            $this->form_validation->set_rules('denda_per_bulan', 'Denda per Bulan', 'required|numeric');
            $this->form_validation->set_rules('denda_per_tahun', 'Denda per Tahun', 'required|numeric');
            $this->form_validation->set_rules('denda_ringan', 'Denda Ringan', 'required|numeric');
            $this->form_validation->set_rules('denda_berat', 'Denda Berat', 'required|numeric');
            $this->form_validation->set_rules('hilang', 'Hilang', 'required|numeric');

			$id_denda = $this->input->post('id_denda');

          if ($this->form_validation->run() == FALSE) {
			  $this->session->set_flashdata('error', validation_errors());
			  redirect('konfigurasi/edit/'.$id_denda);
			} else {
			 $data = array(
            'jenis' => $this->input->post('jenis', TRUE),
			'denda_per_hari' => $this->input->post('denda_per_hari', TRUE),
			'denda_per_bulan' => $this->input->post('denda_per_bulan', TRUE),
			'denda_per_tahun' => $this->input->post('denda_per_tahun', TRUE),
			'denda_ringan' => $this->input->post('denda_ringan', TRUE),
		    'denda_berat' => $this->input->post('denda_berat', TRUE),
		    'hilang' => $this->input->post('hilang', TRUE)
			);
            $query = $this->m_konfigurasi->update($id_denda, $data);
            if ($query) {
				if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('info', 'Data Berhasil di Update');
            } else {
                $this->session->set_flashdata('info', 'Data Gagal di Update');
			}
			 redirect ('konfigurasi');
        }
	}
}
     public function hapus ($id)
     {
        $query = $this->m_konfigurasi->hapus($id);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
            redirect('konfigurasi');
        }
     }

}

?>
