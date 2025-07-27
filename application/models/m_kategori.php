<?php 

class M_kategori Extends CI_Model {

    public function edit($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get('kategori')->row_array();
    }

    public function update($id_kategori, $data)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }

    public function hapus($id_kategori)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }
}




?>