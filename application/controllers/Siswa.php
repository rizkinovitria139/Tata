<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = 'Halaman Siswa';

        $this->session->set_userdata($data);
        $this->load->view('templates/header');
        $this->load->view('templates/siswa_sidebar');
        $this->load->view('templates/siswa_topbar');
        $this->load->view('siswa/index');
        $this->load->view('templates/footer');
    }
}

/* End of file Siswa.php */
