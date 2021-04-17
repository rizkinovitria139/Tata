<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mapel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Mata Pelajaran';
      //  $data['nilai_siswa'] = $this->Nilai_model->getById();

    //   $data = [
    //     'nis' => $this->Nilai_model->getAll()($this->session->userdata('user_logged')->id),
    // ];
    $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')]) ->row_array();
       
        $this->session->set_userdata($data);

        $this->db->select('a.kelas, a.nama_mapel, b.nama');
        $this->db->from('mata_pelajaran AS a');
        $this->db->join('guru AS b', 'a.nip_pengajar = b.nip');
        $this->db->get();
        $this->load->model('Mapel_model', 'mapel');
        $data['mata_pelajaran'] = $this->mapel->getAll();


        $this->load->view('templates/header');
	    $this->load->view('templates/siswa_sidebar', $data);
		$this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/mapel', $data);
		$this->load->view('templates/footer');
    }
}