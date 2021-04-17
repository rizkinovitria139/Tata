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

        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')]) ->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Siswa.php */