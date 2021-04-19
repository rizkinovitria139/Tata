<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('kelas_model', 'kelas');
        $this->load->model('Admin_model', 'guru');
        $this->load->model('Mapel_model', 'mapel');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = 'Dashboard - Admin';

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'Profile Admin';


        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/profile');
        $this->load->view('templates/footer');
    }

    public function get_guru()
    {
        $data['title'] = 'Daftar Guru';

        $this->load->model('Admin_model', 'admin');
        $data['guru'] = $this->admin->getAll();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }

    public function get_siswa()
    {

        $data['title'] = 'Daftar Siswa';

        $this->load->model('Siswa_model', 'siswa');
        $data['siswa'] = $this->siswa->getAll();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer');
    }


    public function get_kelas()
    {
        $data['title'] = 'Daftar Kelas';

        $this->session->set_userdata($data);


        $this->load->model('kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/kelas', $data);
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
            $this->session->set_flashdata('status', 'Kelas berhasil ditambahkan');
            redirect('admin/tambah_kelas');
        } else {
            redirect('admin/get_kelas');
        }
    }

    public function get_mapel()
    {
        $data['title'] = 'Daftar Mata Pelajaran';

        $this->session->set_userdata($data);


        $this->load->model('mapel_model', 'mapel');
        $data['mapel'] = $this->mapel->get_mapel();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/mapel', $data);
        $this->load->view('templates/footer');
    }
}
    
    /* End of file Guru.php */