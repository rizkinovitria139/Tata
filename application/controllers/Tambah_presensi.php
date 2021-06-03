<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_presensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
        $this->load->model('Presensi_model', 'm_presensi');
    }

    public function index()
    {
        $data['title'] = 'Data Presensi Siswa';
        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
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
    }
    public function inputPresensi()
    {
        //
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
    }
}
