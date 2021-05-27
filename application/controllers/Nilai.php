<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model');
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
        $data['username']  =   $this->session->userdata('nama');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/nilai', $data);
        $this->load->view('templates/footer');
    }
}