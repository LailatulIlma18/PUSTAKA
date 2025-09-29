<?php

class Anggota extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_anggota');
    }

    public function index()
    {
        $isi['content'] = 'anggota/v_anggota';
        $isi['judul'] = 'Daftar Data Anggota';
        $isi['data'] = $this->db->get('anggota')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_anggota()
    {
        $isi['content'] = 'anggota/form_anggota';
        $isi['judul'] = 'Form Tambah Anggota';
        $isi['kode_anggota'] = $this->m_anggota->kode_anggota();
        $this->load->view('v_dashboard', $isi);
		}

public function simpan()
{
    $this->load->library('form_validation');

     $this->form_validation->set_rules('kode_anggota', 'Kode Anggota', 'required');
    $this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
    $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|numeric');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('anggota/tambah_anggota');
    } else {
        $data = array(
            'kode_anggota'  => $this->input->post('kode_anggota', TRUE),
            'nis'           => $this->input->post('nis', TRUE),
            'nama_anggota'  => $this->input->post('nama_anggota', TRUE),
            'email'         => $this->input->post('email', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'alamat'        => $this->input->post('alamat', TRUE),
            'no_telp'       => $this->input->post('no_telp', TRUE)
        );
		$query = $this->db->insert('anggota',$data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('info', 'Terjadi kesalahan saat menyimpan data.');
        }
        redirect('anggota');
    }
}
    public function edit($id)
    {
        $isi['content'] = 'anggota/edit_anggota';
        $isi['judul'] = 'Form Edit Anggota';
        $isi['data'] = $this->m_anggota->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
		$this->load->library('form_validation');

		 $this->form_validation->set_rules('kode_anggota', 'Kode Anggota', 'required');
         $this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
         $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required');
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
         $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
         $this->form_validation->set_rules('alamat', 'Alamat', 'required');
         $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|numeric');

        $id_anggota = $this->input->post('id_anggota');

        if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error',validation_errors());
			redirect('anggota/edit/'.$id_anggota);
		} else {
        $data = array(
                'kode_anggota'      => $this->input->post('kode_anggota',TRUE),
                'nis'               => $this->input->post('nis',TRUE),
                'nama_anggota'      => $this->input->post('nama_anggota',TRUE),
                'email'             => $this->input->post('email',TRUE),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin',TRUE),
                'alamat'            => $this->input->post('alamat',TRUE),
                'no_telp'           => $this->input->post('no_telp',TRUE)
            );
            $query = $this->m_anggota->update($id_anggota, $data);
            if ($query) {
				 if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('info', 'Data Berhasil di Update');
            } else {
				$this->session->set_flashdata('info', 'Data Belum  Berhasil di Update');
			}
			redirect('anggota');
		}
	}  
}
	
    public function hapus($id)
    {
        $query = $this->m_anggota->hapus($id);
        if ($query) {
                $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
            } else {
				$this->session->set_flashdata('info','Data Gagal di Hapus');
			}
			redirect('anggota');
    }

}

?>

