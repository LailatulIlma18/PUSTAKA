<?php
class M_konfigurasi extends CI_Model {

    public function get_denda()
    {
        // Ambil data config denda (1 baris)
        return $this->db->get('konfigurasi_denda')->row_array();
    }

}
