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
            $data['jenis'] = $this->input->post('jenis');
			$data['denda_per_hari'] = $this->input->post('denda_per_hari');
			$data['denda_per_bulan'] = $this->input->post('denda_per_bulan');
			$data['denda_per_tahun'] = $this->input->post('denda_per_tahun');
			$data['denda_ringan'] = $this->input->post('denda_ringan');
		    $data['denda_berat'] = $this->input->post('denda_berat');
		    $data['hilang'] = $this->input->post('hilang');
            $query = $this->db->insert('konfigurasi_denda', $data);
            if ($query = true) {
                $this->session->set_flashdata('info', 'Data Berhasil di Simpan');
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
            $id_denda = $this->input->post('id_denda');
            $data['jenis'] = $this->input->post('jenis');
			$data['denda_per_hari'] = $this->input->post('denda_per_hari');
			$data['denda_per_bulan'] = $this->input->post('denda_per_bulan');
			$data['denda_per_tahun'] = $this->input->post('denda_per_tahun');
			$data['denda_ringan'] = $this->input->post('denda_ringan');
			$data['denda_berat'] = $this->input->post('denda_berat');
			$data['hilang'] = $this->input->post('hilang');
            $query = $this->m_konfigurasi->update($id_denda, $data);
            if ($query = true) {
                $this->session->set_flashdata('info', 'Data Berhasil di Update');
                redirect ('konfigurasi');
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
