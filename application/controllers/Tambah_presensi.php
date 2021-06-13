<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_presensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
        $this->load->model('Presensi_model', 'm_presensi');
        $this->load->model('User_model', 'm_user');
        $this->m_user->checkAccount();
    }

    public function index()
    {
        $data['title'] = 'Data Presensi Siswa';
        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulan = $tahun . "-" . $bulan;
            $bulantahun = date('Y-m-d', strtotime($bulan));
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulan = $bulan . $tahun;
            $bulantahun = date('Y-m-d', strtotime($bulan));
        }
        $data['datapresensi'] = $this->m_presensi->get_presensi($bulantahun);
        $data['datajadwal'] = $this->m_presensi->get_jadwal($this->session->userdata('nip'));
        // var_dump($data1);
        // die();   
        $this->load->view('templates/header', $data);
        $this->load->view('guruMapel/mp_sidebar', $data);
        $this->load->view('guruMapel/mp_topbar', $data);
        $this->load->view('guruMapel/tambahpresensi', $data);
        $this->load->view('templates/footer');
        $this->load->view('guruMapel/presensijs', $data);
    }
    public function jadwal($id)
    {
        $data['title'] = 'Data Presensi Siswa';
        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswaJadwal'] = $this->m_presensi->get_siswakelas($id);

        $this->load->view('templates/header', $data);
        $this->load->view('guruMapel/mp_sidebar', $data);
        $this->load->view('guruMapel/mp_topbar', $data);
        $this->load->view('guruMapel/presensi', $data);
        $this->load->view('templates/footer');
        $this->load->view('guruMapel/presensijs', $data);
    }

    // untuk input presensi dengan javascript
    public function inputPresensi()
    {
        $dataPresensi = $this->input->post('presensiData');
        $tanggalPresensi = $this->input->post('tanggalpresensi');

        foreach ($dataPresensi as $key => $value) {
            $this->m_presensi->doPresensi($value, $tanggalPresensi);
        }
        echo true;
    }
    public function getPresensiSiswa($id)
    {
        $data['siswaPresensi'] = $this->m_presensi->getPresensiSiswa($id);
        $data['dataabsensi'] = $this->m_presensi->getPresensiHarianSiswa($id);
        print_r($this->load->view('guruMapel/modal/presensimodal', $data, TRUE));
    }
    public function getHarianSiswa($id)
    {
        $data['siswaPresensi'] = $this->m_presensi->getPresensiByID($id);
        print_r($this->load->view('guruMapel/modal/presensiharianmodal', $data, TRUE));
    }
    public function doEditPresensi($idpresensi)
    {
        $update = array(
            "hadir" => $this->input->post('hadir'),
            "keterangan" => $this->input->post('keterangan'),
        );
        $this->m_presensi->doUpdatePresensi($idpresensi, $update);
        $this->session->set_flashdata(
            'alert',
            'Berhasil melakukan update presensi siswa dengan nama ' . $this->input->post('namasiswa') . " kelas " . $this->input->post('kelassiswa') . " bulan " . $this->input->post('bulan')
        );

        redirect("Tambah_presensi");
    }
}
