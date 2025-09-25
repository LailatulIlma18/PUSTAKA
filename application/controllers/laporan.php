<?php 

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
    }

    public function peminjaman()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $this->session->set_userdata('tanggal_awal', $tgl_awal);
        $this->session->set_userdata('tanggal_akhir', $tgl_akhir);

        if (empty($tgl_awal) || empty($tgl_akhir)) {
            $isi['content'] = 'laporan/v_lpeminjaman';
            $isi['judul'] = 'Laporan Peminjaman';
            $isi['data'] = $this->m_laporan->getAllData();
        }else{
            $isi['content'] = 'laporan/v_lpeminjaman';
            $isi['judul'] = 'Laporan Peminjaman';
            $isi['data'] = $this->m_laporan->filterData($tgl_awal, $tgl_akhir);
        }
            
            $this->load->view('v_dashboard', $isi);
    }
public function pengembalian()
{
    $tgl_awal = $this->input->post('tgl_awal');
    $tgl_akhir = $this->input->post('tgl_akhir');

    $this->session->set_userdata('tanggal_awal', $tgl_awal);
    $this->session->set_userdata('tanggal_akhir', $tgl_akhir);

    $isi['content'] = 'laporan/v_lpengembalian';
    $isi['judul'] = 'Laporan Pengembalian';

    if (empty($tgl_awal) || empty($tgl_akhir)) {
        $isi['data'] = $this->m_laporan->getAllDataPengembalian();
    } else {
        $isi['data'] = $this->m_laporan->filterDataPengembalian($tgl_awal, $tgl_akhir);
    }

    $this->load->view('v_dashboard', $isi);
}
    public function refresh($jenis = 'peminjaman')
{
    if ($jenis == 'pengembalian') {
        $isi['content'] = 'laporan/v_lpengembalian';
        $isi['judul'] = 'Laporan Pengembalian';
        $isi['data'] = $this->m_laporan->getAllDataPengembalian();
    } else {
        $isi['content'] = 'laporan/v_lpeminjaman';
        $isi['judul'] = 'Laporan Peminjaman';
        $isi['data'] = $this->m_laporan->getAllData();
    }
    $this->load->view('v_dashboard', $isi);
}

}

?>







