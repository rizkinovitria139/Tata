<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Wali_kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data['title'] = 'Halaman Wali Kelas';

        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/wali_sidebar', $data);
        $this->load->view('templates/wali_topbar', $data);
        $this->load->view('wali_kelas/index', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Wali_kelas.php */
