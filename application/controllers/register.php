<?php 

class Register Extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }

    public function index()
    {
        $this->load->view('v_register');
    }

    public function proses_register()
    {
        $nama       = $this->input->post('nama');
        $username   = $this->input->post('username');
        $password   = md5($this->input->post('password'));
        $level      = $this->input->post('level');
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'level' => $level
        );
        $this->m_login->register($data);
        $this->session->set_flashdata('info',  '<div class="alert alert-success">Registrasi berhasil, silakan login.</div>');
        redirect('login');
    }
}




?>