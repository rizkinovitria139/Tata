<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data['title'] = 'Dashboard - Guru';

        $this->session->set_userdata($data);
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('guru/index');
        $this->load->view('templates/auth_footer');
    }
}
    
    /* End of file Guru.php */