<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['title'] = 'Halaman Jadwal Mata Pelajaran';
        // $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        // $this->session->set_userdata($data);

        $siswa_id  =   $this->session->userdata('nis');
        // print_r($user_id);
         $data['data_jadwal'] = $this->Jadwal_model->tampilJadwal($siswa_id);
        //  print_r($data['data_jadwal']);
        //    die();
         $data['username']  =   $this->session->userdata('nama');
 
        // $this->db->select('a.hari, a.waktu, a.jam_ke, b.kelas,b.nama_mapel');
        // $this->db->from('jadwal AS a');
        // $this->db->join('mata_pelajaran AS b', 'a.id_mapel = b.id_mapel');
        // $this->db->get();
        // $this->load->model('Jadwal_model', 'jadwal');
        // $data['jadwal'] = $this->jadwal->get_jadwal();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function get_hari_senin()
    {
        $data['title'] = 'Jadwal Pelajaran';
        $data['siswa'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $siswa_id  =   $this->session->userdata('nis');
        $data['data_jadwal'] = $this->Jadwal_model->get_hari_senin($siswa_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/jadwal', $data);
        $this->load->view('templates/footer');
    }
    public function get_hari_selasa()
    {
        $data['title'] = 'Jadwal Pelajaran';
        $data['siswa'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $siswa_id  =   $this->session->userdata('nis');
        $data['data_jadwal'] = $this->Jadwal_model->get_hari_selasa($siswa_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/jadwal', $data);
        $this->load->view('templates/footer');
    }
    public function get_hari_rabu()
    {
        $data['title'] = 'Jadwal Pelajaran';
        $data['siswa'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $siswa_id  =   $this->session->userdata('nis');
        $data['data_jadwal'] = $this->Jadwal_model->get_hari_rabu($siswa_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/jadwal', $data);
        $this->load->view('templates/footer');
    }
    public function get_hari_kamis()
    {
        $data['title'] = 'Jadwal Pelajaran';
        $data['siswa'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $siswa_id  =   $this->session->userdata('nis');
        $data['data_jadwal'] = $this->Jadwal_model->get_hari_kamis($siswa_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/jadwal', $data);
        $this->load->view('templates/footer');
    }
    public function get_hari_jumat()
    {
        $data['title'] = 'Jadwal Pelajaran';
        $data['siswa'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $siswa_id  =   $this->session->userdata('nis');
        $data['data_jadwal'] = $this->Jadwal_model->get_hari_jumat($siswa_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/jadwal', $data);
        $this->load->view('templates/footer');
    }
    public function get_hari_sabtu()
    {
        $data['title'] = 'Jadwal Pelajaran';
        $data['siswa'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $siswa_id  =   $this->session->userdata('nis');
        $data['data_jadwal'] = $this->Jadwal_model->get_hari_sabtu($siswa_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/jadwal', $data);
        $this->load->view('templates/footer');
    }
}