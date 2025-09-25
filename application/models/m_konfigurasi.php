<?php
class M_konfigurasi extends CI_Model {

    public function get_denda()
    {
        return $this->db->get('konfigurasi_denda')->row_array();
    }

	public function edit($id)
    {
        $this->db->where('id_denda', $id);
        return $this->db->get('konfigurasi_denda')->row_array();
    }

    public function update($id_denda, $data)
    {
        $this->db->where('id_denda', $id_denda);
        return $this->db->update('konfigurasi_denda', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_denda', $id);
        return $this->db->delete('konfigurasi_denda');
    }
}

?>
