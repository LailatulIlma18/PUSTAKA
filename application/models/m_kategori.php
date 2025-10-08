<?php 

class M_kategori extends CI_Model {

	public function get_all()
    {
        $this->db->order_by('id_kategori', 'DESC');
        return $this->db->get('kategori')->result();
    }

    public function edit($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get('kategori')->row_array();
    }

    public function update($id_kategori, $data)
    {
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->update('kategori', $data);
    }

   public function hapus($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->delete('kategori');
    }
}

?>
