<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wali_kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }


    public function index()
    {
        $data['title'] = 'Halaman Wali Kelas';
        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        // $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/walikelas_sidebar', $data);
        $this->load->view('templates/walikelas_topbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }
}

/* End of file Wali_kelas.php */
