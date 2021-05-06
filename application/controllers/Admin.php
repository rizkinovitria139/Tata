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

    public function tambah_siswa()
    {
        $data['title'] = 'Tambah Siswa';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->model('Kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();
        $this->load->model('Role_model', 'role');
        $data['role'] = $this->role->getRole();

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
        $this->form_validation->set_rules('nomor_telp_wali', 'Nomor Telepon Wali', 'required');
        $this->form_validation->set_rules('email_siswa', 'Email Siswa', 'required');
        $this->form_validation->set_rules('role_id', 'Role Id', 'required');
        $this->form_validation->set_rules('is_active', 'Is Active', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_userdata($data);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/siswa_tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $query = "SELECT `siswa`.*
            FROM `siswa`
            ";

            $counter = 0;
            $nis = $this->input->post('nis', true);
            $siswa = $this->db->query($query)->result_array();
            foreach ($siswa as $s) {  //cek user lama nis
                if ($s['nis'] == $nis) { //cek nis input sama or tidak dengan user lama
                    $counter++;
                }
            }
            if ($counter == 0) { //nisnya tidak ada yang sama
                $dataSiswa = array(
                    'nis' => $nis,
                    'nama' => $this->input->post('nama', true),
                    'tempat_lahir' => $this->input->post('tempat_lahir', true),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                    'agama' => $this->input->post('agama', true),
                    'status_dalam_keluarga' => $this->input->post('status_dalam_keluarga', true),
                    'anak_ke' => $this->input->post('anak_ke', true),
                    'alamat_siswa' => $this->input->post('alamat_siswa', true),
                    'no_telp_rumah' => $this->input->post('no_telp_rumah', true),
                    'sekolah_asal' => $this->input->post('sekolah_asal', true),
                    'diterima_di_kelas' => $this->input->post('diterima_di_kelas', true),
                    'tanggal_diterima' => $this->input->post('tanggal_diterima', true),
                    'nama_ayah' => $this->input->post('nama_ayah', true),
                    'nama_ibu' => $this->input->post('nama_ibu', true),
                    'alamat_orangtua' => $this->input->post('alamat_orangtua', true),
                    'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah', true),
                    'nama_wali' => $this->input->post('nama_wali', true),
                    'alamat_wali' => $this->input->post('alamat_wali', true),
                    'pekerjaan_wali' => $this->input->post('pekerjaan_wali', true),
                    'nomor_telp_wali' => $this->input->post('nomor_telp_wali', true),
                    'email_siswa' => $this->input->post('email_siswa', true),
                    'no_telp_siswa' => $this->input->post('no_telp_siswa', true),
                    'role_id' => $this->input->post('role_id', true),
                    'is_active' => $this->input->post('is_active', true),
                    'username' => $this->input->post('username', true),
                    'password' => $this->input->post('password', true),
                    'id_kelas' => $this->input->post('id_kelas', true)

                );

                $this->siswa->siswa_tambah($dataSiswa);
                $this->session->set_flashdata('siswa_message', '<div class="alert alert-success" role="alert">Data Siswa Telah Ditambahkan!</div>');
                redirect('admin/get_siswa');
            } else {
                $this->session->set_flashdata('siswa_message', '<div class="alert alert-danger" role="alert">NIS telah terdaftar, gunakan NIS lain!</div>');

                $this->session->set_userdata($data);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/topbar', $data);
                $this->load->view('admin/siswa_tambah', $data);
                $this->load->view('templates/footer');
            }
        }
    }

    public function delete_siswa($id)
    {
        $this->load->model('Siswa_model', 'siswa');
        $this->siswa->delete_user($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('siswa_message', '<div class="alert alert-success" role="alert">Data Siswa berhasil dihapus!</div>');
        redirect('admin/get_siswa');
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
            $this->session->set_flashdata('kelas_message', 'Kelas berhasil ditambahkan');
            redirect('admin/tambah_kelas');
        } else {
            $this->session->set_flashdata('kelas_message', 'Kelas gagal ditambahkan!');
            redirect('admin/get_kelas');
        }
    }

    public function edit_kelas($id)
    {
        $this->db->update('kelas', ['nama_kelas' => $this->input->post('nama_kelas')], ['id_kelas' => $id]);
        $this->db->update('kelas', ['nip_wali_kelas' => $this->input->post('nip_wali_kelas')], ['id_kelas' => $id]);
        $this->db->update('kelas', ['id_tahun_akademik' => $this->input->post('id_tahun_akademik')], ['id_kelas' => $id]);
        $this->session->set_flashdata('kelas_message', '<div class="alert alert-success" role="alert">Kelas berhasil diubah!</div>');
        redirect('admin/get_kelas', 'refresh');
    }

    public function delete_kelas($id)
    {
        $this->load->model('Kelas_model', 'kelas');
        $this->kelas->delete_kelas($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('kelas_message', '<div class="alert alert-success" role="alert">Kelas berhasil dihapus!</div>');
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