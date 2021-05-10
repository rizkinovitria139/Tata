<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Bk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data['title'] = 'Bimbingan Konseling';

        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/bk_sidebar', $data);
        $this->load->view('templates/bk_topbar', $data);
        $this->load->view('Bim_Kon/index', $data);
        $this->load->view('templates/footer');
    }


}

/* End of file BK_kelas.php */