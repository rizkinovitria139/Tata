<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model');
        $this->load->model('Semester_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Halaman Nilai Siswa';

        $user_id  =   $this->session->userdata('nis');
        // print_r($user_id);
        $data['data_nilai'] = $this->Nilai_model->getNilai($user_id);
        // print_r($data['data_nilai']);
        // die();
        $data['semester'] = $this->Semester_model->getAll();
        $data['username']  =   $this->session->userdata('nama');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/nilai', $data);
        $this->load->view('templates/footer');
    }


    public function get_semester_1()
    {
        $data['title'] = 'Nilai Semester 7-1';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();

        $siswa_id  =   $this->session->userdata('nis');
        $data['data_nilai'] = $this->Nilai_model->get_semester_1($siswa_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/nilai', $data);
        $this->load->view('templates/footer');
    }


    public function get_semester_2()
    {
        $data['title'] = 'Nilai Semester 7-2';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();

        $siswa_id  =   $this->session->userdata('nis');
        $data['data_nilai'] = $this->Nilai_model->get_semester_2($siswa_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/nilai', $data);
        $this->load->view('templates/footer');
    }

    public function get_semester_3()
    {
        $data['title'] = 'Nilai Semester 8-1';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();

        $siswa_id  =   $this->session->userdata('nis');
        $data['data_nilai'] = $this->Nilai_model->get_semester_3($siswa_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/nilai', $data);
        $this->load->view('templates/footer');
    }

    public function get_semester_4()
    {
        $data['title'] = 'Nilai Semester 8-2';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();

        $siswa_id  =   $this->session->userdata('nis');
        $data['data_nilai'] = $this->Nilai_model->get_semester_4($siswa_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/nilai', $data);
        $this->load->view('templates/footer');
    }

    public function get_semester_5()
    {
        $data['title'] = 'Nilai Semester 9-1';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();

        $siswa_id  =   $this->session->userdata('nis');
        $data['data_nilai'] = $this->Nilai_model->get_semester_5($siswa_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/nilai', $data);
        $this->load->view('templates/footer');
    }

    public function get_semester_6()
    {
        $data['title'] = 'Nilai Semester 9-2';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();

        $siswa_id  =   $this->session->userdata('nis');
        $data['data_nilai'] = $this->Nilai_model->get_semester_6($siswa_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/nilai', $data);
        $this->load->view('templates/footer');
    }
}
