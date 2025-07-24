<?php 

class M_anggota Extends CI_Model{

    public function id_anggota()
    {
        $this->db->select('RIGHT(anggota.id_anggota,3) as kode', FALSE);
        $this->db->order_by('id_anggota', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('anggota');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "AG".$kodemax;
        return $kodejadi;
    }
}















?>