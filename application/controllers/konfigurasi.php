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

}







?>