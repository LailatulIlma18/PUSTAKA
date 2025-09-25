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

// Export Excel Peminjaman
   

    public function export_peminjaman()
    {
        $tgl_awal  = $this->session->userdata('tanggal_awal');
        $tgl_akhir = $this->session->userdata('tanggal_akhir');

        $data = empty($tgl_awal) || empty($tgl_akhir) 
                ? $this->m_laporan->getAllData('DESC') 
                : $this->m_laporan->filterDataPeminjaman($tgl_awal, $tgl_akhir, 'DESC');

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=laporan_peminjaman.xls");

        echo "<table border='1'>
                <tr>
                    <th>No</th>
                    <th>Kode Peminjaman</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>";

        $no = 1;
        foreach ($data as $row) {
            echo "<tr>
                    <td>".$no++."</td>
                    <td>".$row->kode_peminjaman."</td>
                    <td>".$row->nama_anggota."</td>
                    <td>".$row->judul."</td>
                    <td>".(!empty($row->tgl_pinjam) ? date('d-m-Y', strtotime($row->tgl_pinjam)) : '-')."</td>
                    <td>".(!empty($row->tgl_kembali) ? date('d-m-Y', strtotime($row->tgl_kembali)) : '-')."</td>
                  </tr>";
        }
        echo "</table>";
        exit;
    }

    
    // Export Excel Pengembalian
    
    
    public function export_pengembalian()
    {
        $tgl_awal  = $this->session->userdata('tanggal_awal');
        $tgl_akhir = $this->session->userdata('tanggal_akhir');

        $data = empty($tgl_awal) || empty($tgl_akhir) 
                ? $this->m_laporan->getAllDataPengembalian('DESC') 
                : $this->m_laporan->filterDataPengembalian($tgl_awal, $tgl_akhir, 'DESC');

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=laporan_pengembalian.xls");

        echo "<table border='1'>
                <tr>
                    <th>No</th>
                    <th>Kode Peminjaman</th>
                    <th>Peminjam</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Jumlah Hari</th>
                    <th>Tipe Rusak</th>
                    <th>Denda</th>
                </tr>";

        $no = 1;
        foreach ($data as $row) {
            $jumlah_hari = (!empty($row->tgl_kembalikan) && !empty($row->tgl_kembali) && strtotime($row->tgl_kembalikan) > strtotime($row->tgl_kembali))
                ? (strtotime($row->tgl_kembalikan) - strtotime($row->tgl_kembali)) / (60*60*24)
                : '-';

            echo "<tr>
                    <td>".$no++."</td>
                    <td>".$row->kode_peminjaman."</td>
                    <td>".$row->nama_anggota."</td>
                    <td>".$row->judul."</td>
                    <td>".(!empty($row->tgl_pinjam) ? date('d-m-Y', strtotime($row->tgl_pinjam)) : '-')."</td>
                    <td>".(!empty($row->tgl_kembali) ? date('d-m-Y', strtotime($row->tgl_kembali)) : '-')."</td>
                    <td>".(!empty($row->status_denda) ? $row->status_denda : '-')."</td>
                    <td>".$jumlah_hari."</td>
                    <td>".(!empty($row->tipe_rusak) ? $row->tipe_rusak : '-')."</td>
                    <td>".(!empty($row->denda) ? 'Rp'.number_format($row->denda,0,',','.') : '-')."</td>
                  </tr>";
        }
        echo "</table>";
        exit;
    }
}








