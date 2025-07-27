<?php 

class M_buku Extends CI_Model{

    public function id_buku()
    {
        $this->db->select('RIGHT (buku.id_buku,3) as kode', FALSE);
        $this->db->order_by('id_buku', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('buku');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "MAKN".$kodemax;
        return $kodejadi;
    }
}


?>