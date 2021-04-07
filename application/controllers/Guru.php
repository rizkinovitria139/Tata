<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
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

    public function kelas()
    {
        $data['title'] = 'Kelas';

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('guru/kelas');
        $this->load->view('templates/footer');
    }

    public function presensi()
    {
    }
}
    
    /* End of file Guru.php */