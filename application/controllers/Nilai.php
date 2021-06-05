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

    public function get_nilai_by($id_semester, $user_id)
    {
        $data['title'] = 'Daftar Nilai Siswa';


        $this->session->set_userdata($data);
        $user_id  =   $this->session->userdata('nis');

        // $data['data_nilai'] = $this->Nilai_model->getNilai($user_id);
        $data['data_nilai'] = $this->Nilai_model->get_nilai_by($id_semester, $user_id);
        $data['semester'] = $this->Semester_model->getAll();
        $data['username']  =   $this->session->userdata('nama');

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/nilai', $data);
        $this->load->view('templates/footer');
    }
}
