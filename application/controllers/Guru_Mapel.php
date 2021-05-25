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

    public function nilai()
    {
        $data['title'] = "Nilai Siswa";
        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $id = $this->session->userdata('nip');

        $this->load->model('Mapel_model', 'mapel');

        $data['mapel'] = $this->mapel->get_mapel_guru($id);
        // print_r($id);

        $this->load->view('templates/header', $data);
        $this->load->view('guruMapel/mp_sidebar', $data);
        $this->load->view('guruMapel/mp_topbar', $data);
        $this->load->view('guruMapel/nilai', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_nilai()
    {
    }
}
