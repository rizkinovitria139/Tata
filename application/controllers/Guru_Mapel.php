<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Guru_Mapel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data['title'] = 'Halaman Guru Mata Pelajaran';

        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('guruMapel/mp_sidebar', $data);
        $this->load->view('guruMapel/mp_topbar', $data);
        $this->load->view('guruMapel/index', $data);
        $this->load->view('templates/footer');
    }

}