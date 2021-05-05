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

        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('status_dalam_keluarga', 'Status Dalam Keluarga', 'required');
        $this->form_validation->set_rules('anak_ke', 'Anak Ke', 'required');
        $this->form_validation->set_rules('alamat_siswa', 'Alamat Siswa', 'required');
        $this->form_validation->set_rules('no_telp_rumah', 'Nomor Telepon Rumah', 'required');
        $this->form_validation->set_rules('sekolah_asal', 'Sekolah Asal', 'required');
        $this->form_validation->set_rules('diterima_di_kelas', 'Diterima di Kelas', 'required');
        $this->form_validation->set_rules('tanggal_diterima', 'Tanggal Diterima', 'required');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('alamat_orangtua', 'Alamat Orang Tua', 'required');
        $this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'required');
        $this->form_validation->set_rules('nama_wali', 'Nama Wali', 'required');
        $this->form_validation->set_rules('alamat_wali', 'Alamat Wali', 'required');
        $this->form_validation->set_rules('pekerjaan_wali', 'Pekerjaan Wali', 'required');
        $this->form_validation->set_rules('no_telp_wali', 'Nomor Telepon Wali', 'required');
        $this->form_validation->set_rules('email_siswa', 'Email Siswa', 'required');
        $this->form_validation->set_rules('no_telp_siswa', 'Nomor Telepom Siswa', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == true) {
            $data['nis'] = $this->input->post('nis');
            $data['nisn'] = $this->input->post('nisn');
            $data['nama'] = $this->input->post('nama');
            $data['tempat_lahir'] = $this->input->post('tempat_lahir');
            $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
            $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
            $data['agama'] = $this->input->post('agama');
            $data['status_dalam_keluarga'] = $this->input->post('status_dalam_keluarga');
            $data['anak_ke'] = $this->input->post('anak_ke');
            $data['alamat_siswa'] = $this->input->post('alamat_siswa');
            $data['no_telp_rumah'] = $this->input->post('no_telp_rumah');
            $data['sekolah_asal'] = $this->input->post('sekolah_asal');
            $data['diterima_di_kelas'] = $this->input->post('diterima_di_kelas');
            $data['tanggal_diterima'] = $this->input->post('tanggal_diterima');
            $data['nama_ayah'] = $this->input->post('nama_ayah');
            $data['nama_ibu'] = $this->input->post('nama_ibu');
            $data['alamat_orangtua'] = $this->input->post('alamat_orangtua');
            $data['pekerjaan ayah'] = $this->input->post('pekerjaan_ayah');
            $data['nama_wali'] = $this->input->post('nama_wali');
            $data['alamat_wali'] = $this->input->post('alamat_wali');
            $data['pekerjaan_wali'] = $this->input->post('pekerjaan_wali');
            $data['no_telp_wali'] = $this->input->post('no_telp_wali');
            $data['email_siswa'] = $this->input->post('email_siswa');
            $data['no_telp_siswa'] = $this->input->post('no_telp_siswa');
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('');

            $this->load->model('siswa_model', 'siswa');
            $this->siswa->siswa_tambah($data);
            $this->session->set_flashdata('status', 'Siswa berhasil ditambahkan');
            redirect('admin/siswa_tambah');
        }

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
            $this->session->set_flashdata('gagal', 'Siswa gagal ditambahkan!');
            redirect('admin/get_siswa');
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