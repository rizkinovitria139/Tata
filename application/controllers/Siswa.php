<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {

        $this->load->view('templates/header');
        $this->load->view('siswa/dashboard');
        $this->load->view('templates/footer');
    }
}

/* End of file Siswa.php */
