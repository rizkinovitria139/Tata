<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model');
    }

    public function index()
    {
        $data['title'] = 'Halaman Nilai Siswa';
        $data['nilai_siswa'] = $this->Nilai_model->getAll();
       

        $this->load->view('templates/header');
	    $this->load->view('templates/siswa_sidebar');
		$this->load->view('templates/siswa_topbar');
        $this->load->view('siswa/nilai', $data);
		$this->load->view('templates/footer');
    }
}