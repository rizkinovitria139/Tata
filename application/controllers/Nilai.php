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
      //  $data['nilai_siswa'] = $this->Nilai_model->getById();

    //   $data = [
    //     'nis' => $this->Nilai_model->getAll()($this->session->userdata('user_logged')->id),
    // ];
       
        $this->session->set_userdata($data);

        $this->db->select('a.nis, a.nilai_tugas, a.nilai_uts,a.nilai_uas, b.nama_mapel');
        $this->db->from('nilai_siswa AS a');
        $this->db->join('mata_pelajaran AS b', 'a.id_mapel = b.id_mapel');
        $this->db->get();
        $this->load->model('Nilai_model', 'nilai');
        $data['nilai_siswa'] = $this->nilai->getAll();


        $this->load->view('templates/header');
	    $this->load->view('templates/siswa_sidebar');
		$this->load->view('templates/siswa_topbar');
        $this->load->view('siswa/nilai', $data);
		$this->load->view('templates/footer');
    }
}