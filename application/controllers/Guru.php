<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model', 'siswa');
        $this->load->model('kelas_model', 'kelas');
        $this->load->model('Guru_model', 'guru');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = 'Dashboard - Guru';

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('guru/index');
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'Profile Guru';


        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('guru/profile');
        $this->load->view('templates/footer');
    }

    public function getGuru()
    {
    }

    public function get_siswa()
    {

        $data['title'] = 'Daftar Siswa';

        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->get();
        $this->load->model('siswa_model', 'siswa');
        $this->siswa->getAll();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('guru/siswa', $data);
        $this->load->view('templates/footer');
    }

    // public function kelas()
    // {
    //     $data['title'] = 'Kelas';

    //     $this->session->set_userdata($data);
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('templates/topbar');
    //     $this->load->view('guru/kelas');
    //     $this->load->view('templates/footer');
    // }

    public function get_kelas()
    {
        $data['title'] = 'Daftar Kelas';

        $this->session->set_userdata($data);

        $this->db->select('a.id_kelas, a.nama_kelas, b.nama');
        $this->db->from('kelas AS a');
        $this->db->join('guru AS b', 'a.nip_wali_kelas = b.nip');
        $this->db->get();
        $this->load->model('kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();

        // $this->db->select('guru.nip');
        // $this->db->from('guru');
        // $this->db->get();
        // $data['guru'] = $this->guru->get_guru();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('guru/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kelas()
    {
        $this->form_validation->set_rules('id_kelas', 'ID Kelas', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('nip_wali_kelas', 'NIP Wali Kelas', 'required');

        if ($this->form_validation->run() == true) {
            $data['id_kelas'] = $this->input->post('id_kelas');
            $data['nama_kelas'] = $this->input->post('nama_kelas');
            $data['nip_wali_kelas'] = $this->input->post('nip_wali_kelas');

            $this->load->model('kelas_model', 'kelas');
            $this->kelas->tambah_kelas($data);
            redirect('guru/tambah_kelas');
        } else {
            redirect('guru/get_kelas');
        }

        // $this->session->set_userdata($data);
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar');
        // $this->load->view('templates/topbar');
        // $this->load->view('guru/kelas', $data);
        // $this->load->view('templates/footer');
    }
}
    
    /* End of file Guru.php */