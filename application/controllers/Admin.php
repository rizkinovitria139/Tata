<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('kelas_model', 'kelas');
        $this->load->model('Admin_model', 'guru');
        $this->load->model('Mapel_model', 'mapel');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = 'Dashboard - Admin';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        // $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'Profile Admin';

        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile');
        $this->load->view('templates/footer');
    }

    public function get_guru()
    {
        $data['title'] = 'Daftar Guru';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->load->model('Admin_model', 'admin');
        $data['guru'] = $this->admin->getAll();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }

    public function get_siswa()
    {

        $data['title'] = 'Daftar Siswa';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->load->model('Siswa_model', 'siswa');
        $data['siswa'] = $this->siswa->getAll();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function siswa_tambah()
    {
        $data['title'] = 'Tambah Siswa';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->model('Siswa_model', 'siswa');
        $data['siswa'] = $this->siswa->getAll();


        $this->session->set_userdata($data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/siswa_tambah', $data);
        $this->load->view('templates/footer');
    }

    // start bagian kelas

    public function get_kelas()
    {
        $data['title'] = 'Daftar Kelas';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);


        $this->load->model('kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kelas()
    {
        // $this->form_validation->set_rules('id_kelas', 'ID Kelas', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('nip_wali_kelas', 'NIP Wali Kelas', 'required');
        $this->form_validation->set_rules('id_tahun_akademik', 'Id Tahun Akademik', 'required');

        if ($this->form_validation->run() == true) {
            // $data['id_kelas'] = $this->input->post('id_kelas');
            $data['nama_kelas'] = $this->input->post('nama_kelas');
            $data['nip_wali_kelas'] = $this->input->post('nip_wali_kelas');
            $data['id_tahun_akademik'] = $this->input->post('id_tahun_akademik');

            $this->load->model('kelas_model', 'kelas');
            $this->kelas->tambah_kelas($data);
            $this->session->set_flashdata('status', 'Kelas berhasil ditambahkan');
            redirect('admin/tambah_kelas');
        } else {
            $this->session->set_flashdata('gagal', 'Kelas gagal ditambahkan!');
            redirect('admin/get_kelas');
        }
    }

    public function edit_kelas($id)
    {
        $this->db->update('kelas', ['nama_kelas' => $this->input->post('nama_kelas')], ['id_kelas' => $id]);
        $this->db->update('kelas', ['nip_wali_kelas' => $this->input->post('nip_wali_kelas')], ['id_kelas' => $id]);
        $this->db->update('kelas', ['id_tahun_akademik' => $this->input->post('id_tahun_akademik')], ['id_kelas' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">kelas has ben edited!</div>');
        redirect('admin/get_kelas', 'refresh');
    }

    public function delete_kelas($id)
    {
        $this->kelas_model->delete_kelas($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('flash-data', 'Kelas was deleted!');
        redirect('admin/get_kelas', 'refresh');
    }

    // end bagian kelas


    // start bagian mapel
    public function get_mapel()
    {
        $data['title'] = 'Daftar Mata Pelajaran';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);


        $this->load->model('mapel_model', 'mapel');
        $data['mapel'] = $this->mapel->get_mapel();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/mapel', $data);
        $this->load->view('templates/footer');
    }
    // end bagian mapel

    public function get_jadwal()
    {
        $data['title'] = 'Daftar Jadwal';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);


        $this->load->model('jadwal_model', 'jadwal');
        $data['jadwal'] = $this->jadwal->get_jadwal();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jadwal', $data);
        $this->load->view('templates/footer');
    }
}
    
    /* End of file Guru.php */