<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataPresensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Presensi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Presensi Siswa';
        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        if ((isset($_GET['bulan']) && $_GET['bulan'] !='') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                $bulan =$_GET['bulan'];
                $tahun =$_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else {
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
            }
    
            $this->load->model('Presensi_model', 'datapresensi');
            $data['datapresensi'] = $this->datapresensi->get_presensi();
            

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dataPresensi', $data);
        $this->load->view('templates/footer');
    }
    
    public function get_presensi()
    {
        $data['title'] = 'Daftar Kelas';
        $data['Guru_Mapel'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->session->set_userdata($data);


        $this->load->model('kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();
        $this->load->model('Admin_model', 'guru');
        $data['guru'] = $this->guru->getAll();
        $this->load->model('Tahun_model', 'tahun_akademik');
        $data['tahun_akademik'] = $this->tahun_akademik->getAll();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('guruMapel/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function edit_presensi($id)
    {
        $this->db->update('presensi', ['bulan' => $this->input->post('bulan')], ['id_presensi' => $id]);
        $this->db->update('presensi', ['hadir' => $this->input->post('hadir')], ['id_presensi' => $id]);
        $this->db->update('presensi', ['sakit' => $this->input->post('sakit')], ['id_presensi' => $id]);
        $this->db->update('presensi', ['alpha' => $this->input->post('alpha')], ['id_presensi' => $id]);
        
        $this->session->set_flashdata('kelas_message', '<div class="alert alert-success" role="alert">Kelas berhasil diubah!</div>');
        redirect('DataPresensi/get_presensi', 'refresh');
    }

    public function view_presensi_siswa()
    {
        $data['title'] = 'Data Presensi ';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();

        if ((isset($_GET['bulan']) && $_GET['bulan'] !='') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                $bulan =$_GET['bulan'];
                $tahun =$_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else {
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
            }
    
            $this->load->model('Presensi_model', 'datapresensi');
            $data['datapresensi'] = $this->datapresensi->get_presensi();
            

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/viewPresensi', $data);
        $this->load->view('templates/footer');
    }
    
}