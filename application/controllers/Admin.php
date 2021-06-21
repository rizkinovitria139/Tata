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
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->model('User_model', 'm_user');
        $this->m_user->checkAccount();
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

    // start guru

    public function get_guru()
    {
        $data['title'] = 'Daftar Guru';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->load->model('Admin_model', 'admin');
        $data['guru'] = $this->admin->getAll();
        $this->load->model('Role_model', 'role');
        $data['role'] = $this->role->getRole();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }
    public function get_admin()
    {
        $data['title'] = 'Daftar Guru';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->load->model('Admin_model', 'admin');
        $data['guru'] = $this->admin->get_admin();
        $this->load->model('Role_model', 'role');
        $data['role'] = $this->role->getRole();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }

    public function get_guru_mapel()
    {
        $data['title'] = 'Daftar Guru';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->load->model('Admin_model', 'admin');
        $data['guru'] = $this->admin->get_guru_mapel();
        $this->load->model('Role_model', 'role');
        $data['role'] = $this->role->getRole();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }

    public function get_guru_bk()
    {
        $data['title'] = 'Daftar Guru';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->load->model('Admin_model', 'admin');
        $data['guru'] = $this->admin->get_guru_bk();
        $this->load->model('Role_model', 'role');
        $data['role'] = $this->role->getRole();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_guru()
    {
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('is_active', 'Is Active', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');


        if ($this->form_validation->run() == TRUE) {
            $dataArray = array(
                'nip'           => $this->input->post('nip', true),
                'nama'          => $this->input->post('nama', true),
                'tempat_lahir'  => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'agama'         => $this->input->post('agama', true),
                'alamat'        => $this->input->post('alamat', true),
                'no_telp'       => $this->input->post('no_telp', true),
                'tanggal_masuk' => $this->input->post('tanggal_masuk', true),
                'email'         => $this->input->post('email', true),
                'role_id'       => $this->input->post('role_id', true),
                'is_active'     => $this->input->post('is_active', true),
                'status'        => $this->input->post('status', true),
                'password'      => $this->input->post('password', true),
                'username'      => $this->input->post('username', true)
            );

            $this->load->model('Admin_model', 'admin');
            $this->admin->tambah_guru($dataArray);
            $this->session->set_flashdata('guru_message', '<div class="alert alert-success" role="alert">Data Guru Telah Ditambahkan!</div>');
            redirect('admin/get_guru');
        } else {
            $this->session->set_flashdata('guru_message', '<div class="alert alert-danger" role="alert">Data Guru gagal ditambahkan!</div>');
            redirect('admin/tambah_guru');
        }
    }

    public function update_guru($id)
    {
        // print_r($id);
        // die();
        $this->load->model('Admin_model', 'all');
        $i = 0;
        $j = 0;
        $data['allNip'] = $this->all->getAllnip();
        // print_r($this->input->post('nip'));
        // die();
        foreach ($data['allNip'] as $a) {
            // print_r($a);
            // die();
            if ($this->input->post('nip') == $a) {
                // nip yang diinputkan sama dengan data sebelumnya
                $j++;
            } else {
                // nipnya beda
                $i++;
            }
            // print_r($a);
        }
        if ($this->input->post('nip') == $id) {
            $this->db->update('guru', ['nip'           => $this->input->post('nip')], ['nip' => $id]);
            $this->db->update('guru', ['nama'          => $this->input->post('nama')], ['nip' => $id]);
            $this->db->update('guru', ['tempat_lahir'  => $this->input->post('tempat_lahir')], ['nip' => $id]);
            $this->db->update('guru', ['tanggal_lahir' => $this->input->post('tanggal_lahir')], ['nip' => $id]);
            $this->db->update('guru', ['jenis_kelamin' => $this->input->post('jenis_kelamin')], ['nip' => $id]);
            $this->db->update('guru', ['agama'         => $this->input->post('agama')], ['nip' => $id]);
            $this->db->update('guru', ['alamat'        => $this->input->post('alamat')], ['nip' => $id]);
            $this->db->update('guru', ['no_telp'       => $this->input->post('no_telp')], ['nip' => $id]);
            $this->db->update('guru', ['tanggal_masuk' => $this->input->post('tanggal_masuk')], ['nip' => $id]);
            $this->db->update('guru', ['email'         => $this->input->post('email')], ['nip' => $id]);
            $this->db->update('guru', ['role_id'       => $this->input->post('role_id')], ['nip' => $id]);
            $this->db->update('guru', ['is_active'     => $this->input->post('is_active')], ['nip' => $id]);
            $this->db->update('guru', ['status'        => $this->input->post('status')], ['nip' => $id]);
            $this->db->update('guru', ['password'      => $this->input->post('password')], ['nip' => $id]);
            $this->db->update('guru', ['username'      => $this->input->post('username')], ['nip' => $id]);

            $this->session->set_flashdata('guru_message', '<div class="alert alert-success mb-4" role="alert">Data Guru berhasil diubah!</div>');
            redirect('admin/get_guru', 'refresh');
        } else {
            print_r($j);
            if ($j != 0) {
                $this->session->set_flashdata('guru_message', '<div class="alert alert-danger mb-4" role="alert">Data Guru gagal diubah karena NIP sama!</div>');
                redirect('admin/get_guru', 'refresh');
            } else {

                $this->db->update('guru', ['nip'           => $this->input->post('nip')], ['nip' => $id]);
                $this->db->update('guru', ['nama'          => $this->input->post('nama')], ['nip' => $id]);
                $this->db->update('guru', ['tempat_lahir'  => $this->input->post('tempat_lahir')], ['nip' => $id]);
                $this->db->update('guru', ['tanggal_lahir' => $this->input->post('tanggal_lahir')], ['nip' => $id]);
                $this->db->update('guru', ['jenis_kelamin' => $this->input->post('jenis_kelamin')], ['nip' => $id]);
                $this->db->update('guru', ['agama'         => $this->input->post('agama')], ['nip' => $id]);
                $this->db->update('guru', ['alamat'        => $this->input->post('alamat')], ['nip' => $id]);
                $this->db->update('guru', ['no_telp'       => $this->input->post('no_telp')], ['nip' => $id]);
                $this->db->update('guru', ['tanggal_masuk' => $this->input->post('tanggal_masuk')], ['nip' => $id]);
                $this->db->update('guru', ['email'         => $this->input->post('email')], ['nip' => $id]);
                $this->db->update('guru', ['role_id'       => $this->input->post('role_id')], ['nip' => $id]);
                $this->db->update('guru', ['is_active'     => $this->input->post('is_active')], ['nip' => $id]);
                $this->db->update('guru', ['status'        => $this->input->post('status')], ['nip' => $id]);
                $this->db->update('guru', ['password'      => $this->input->post('password')], ['nip' => $id]);
                $this->db->update('guru', ['username'      => $this->input->post('username')], ['nip' => $id]);

                $this->session->set_flashdata('guru_message', '<div class="alert alert-success mb-4" role="alert">Data Guru berhasil diubah!</div>');
                redirect('admin/get_guru', 'refresh');
            }
        }
    }

    public function delete_guru($id)
    {
        $this->load->model('Admin_model', 'guru');
        $this->guru->delete_guru($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('guru_message', '<div class="alert alert-success" role="alert">Data Guru berhasil dihapus!</div>');
        redirect('admin/get_guru');
    }

    public function search_guru()
    {
        $data['title'] = 'Daftar Guru';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $keyword = $this->input->post('keyword');
        $data['guru'] = $this->Admin_model->get_keyword($keyword);
        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }
    // end guru

    // start siswa

    public function get_siswa()
    {

        $data['title'] = 'Daftar Siswa';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->model('Kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();
        $this->load->model('Role_model', 'role');
        $data['role'] = $this->role->getRole();

        $this->load->model('Siswa_model', 'siswa');
        $data['siswa'] = $this->siswa->getAll();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function get_siswa_by($id_kelas)
    {
        $data['title'] = 'Daftar Siswa';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);

        $this->load->model('Siswa_model', 'siswa');
        $data['siswa'] = $this->siswa->get_siswa_by($id_kelas);
        $this->load->model('Kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function search_siswa()
    {
        $data['title'] = 'Daftar Siswa Kelas';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $keyword = $this->input->post('keyword');
        $this->load->model('Siswa_model', 'siswa');
        $data['siswa'] = $this->siswa->get_keyword($keyword);
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
                    'nisn' => $this->input->post('nisn', true),
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

    public function update_siswa($id)
    {

        $this->db->update('siswa', ['nis'                   => $this->input->post('nis')], ['nis' => $id]);
        $this->db->update('siswa', ['nisn'                  => $this->input->post('nisn')], ['nis' => $id]);
        $this->db->update('siswa', ['nama'                  => $this->input->post('nama')], ['nis' => $id]);
        $this->db->update('siswa', ['tempat_lahir'          => $this->input->post('tempat_lahir')], ['nis' => $id]);
        $this->db->update('siswa', ['tanggal_lahir'         => $this->input->post('tanggal_lahir')], ['nis' => $id]);
        $this->db->update('siswa', ['jenis_kelamin'         => $this->input->post('jenis_kelamin')], ['nis' => $id]);
        $this->db->update('siswa', ['agama'                 => $this->input->post('agama')], ['nis' => $id]);
        $this->db->update('siswa', ['status_dalam_keluarga' => $this->input->post('status_dalam_keluarga')], ['nis' => $id]);
        $this->db->update('siswa', ['anak_ke'               => $this->input->post('anak_ke')], ['nis' => $id]);
        $this->db->update('siswa', ['alamat_siswa'          => $this->input->post('alamat_siswa')], ['nis' => $id]);
        $this->db->update('siswa', ['no_telp_rumah'         => $this->input->post('no_telp_rumah')], ['nis' => $id]);
        $this->db->update('siswa', ['sekolah_asal'          => $this->input->post('sekolah_asal')], ['nis' => $id]);
        $this->db->update('siswa', ['diterima_di_kelas'     => $this->input->post('diterima_di_kelas')], ['nis' => $id]);
        $this->db->update('siswa', ['tanggal_diterima'      => $this->input->post('tanggal_diterima')], ['nis' => $id]);
        $this->db->update('siswa', ['nama_ayah'             => $this->input->post('nama_ayah')], ['nis' => $id]);
        $this->db->update('siswa', ['nama_ibu'              => $this->input->post('nama_ibu')], ['nis' => $id]);
        $this->db->update('siswa', ['alamat_orangtua'       => $this->input->post('alamat_orangtua')], ['nis' => $id]);
        $this->db->update('siswa', ['pekerjaan_ayah'        => $this->input->post('pekerjaan_ayah')], ['nis' => $id]);
        $this->db->update('siswa', ['nama_wali'             => $this->input->post('nama_wali')], ['nis' => $id]);
        $this->db->update('siswa', ['alamat_wali'           => $this->input->post('alamat_wali')], ['nis' => $id]);
        $this->db->update('siswa', ['pekerjaan_wali'        => $this->input->post('pekerjaan_wali')], ['nis' => $id]);
        $this->db->update('siswa', ['nomor_telp_wali'       => $this->input->post('nomor_telp_wali')], ['nis' => $id]);
        $this->db->update('siswa', ['email_siswa'           => $this->input->post('email_siswa')], ['nis' => $id]);
        $this->db->update('siswa', ['no_telp_siswa'         => $this->input->post('no_telp_siswa')], ['nis' => $id]);
        $this->db->update('siswa', ['role_id'               => $this->input->post('role_id')], ['nis' => $id]);
        $this->db->update('siswa', ['is_active'             => $this->input->post('is_active')], ['nis' => $id]);
        $this->db->update('siswa', ['username'              => $this->input->post('username')], ['nis' => $id]);
        $this->db->update('siswa', ['password'              => $this->input->post('password')], ['nis' => $id]);
        $this->db->update('siswa', ['id_kelas'              => $this->input->post('id_kelas')], ['nis' => $id]);

        $this->session->set_flashdata('siswa_message', '<div class="alert alert-success" role="alert">Siswa berhasil diubah!</div>');
        redirect('admin/get_siswa', 'refresh');
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
        $this->load->model('Admin_model', 'guru');
        $data['guru'] = $this->guru->getAll();
        $this->load->model('Tahun_model', 'tahun_akademik');
        $data['tahun_akademik'] = $this->tahun_akademik->getAll();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function get_kelas_by($id_tahun_akademik)
    {
        $data['title'] = 'Daftar Kelas';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);

        $this->load->model('Kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas_by($id_tahun_akademik);
        $this->load->model('Tahun_model', 'tahun_akademik');
        $data['tahun_akademik'] = $this->tahun_akademik->getAll();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function search_kelas()
    {
        $data['title'] = 'Daftar Kelas';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $keyword = $this->input->post('keyword');
        $this->load->model('Kelas_model', 'kelas');
        $this->load->model('Tahun_model', 'tahun_akademik');
        $data['tahun_akademik'] = $this->tahun_akademik->getAll();

        $data['kelas'] = $this->kelas->get_keyword($keyword);
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
            $this->session->set_flashdata('kelas_message', '<div class="alert alert-success" role="alert">Data Kelas berhasil ditambahkan!</div>');
            redirect('admin/get_kelas');
        } else {
            $this->session->set_flashdata('kelasw_message', '<div class="alert alert-danger" role="alert">Data Kelas gagal ditambahkan!</div>');
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

        $this->load->model('Mapel_model', 'mapel');
        $data['mapel'] = $this->mapel->get_mapel();
        $this->load->model('Kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/mapel', $data);
        $this->load->view('templates/footer');
    }

    public function get_mapel_by($id_kelas)
    {
        $data['title'] = 'Daftar Mata Pelajaran';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);

        $this->load->model('Mapel_model', 'mapel');
        $data['mapel'] = $this->mapel->get_mapel_by($id_kelas);
        $this->load->model('Kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/mapel', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_mapel()
    {
        $this->form_validation->set_rules('nama_mapel', 'Nama Mapel', 'required');
        $this->form_validation->set_rules('nilai_kkm', 'Nilai KKM', 'required');
        $this->form_validation->set_rules('kelas', 'Tingkat', 'required');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');

        if ($this->form_validation->run() == true) {
            // $data['id_kelas'] = $this->input->post('id_kelas');
            $data['nama_mapel'] = $this->input->post('nama_mapel');
            $data['nilai_kkm'] = $this->input->post('nilai_kkm');
            $data['kelas'] = $this->input->post('kelas');
            $data['id_kelas'] = $this->input->post('id_kelas');

            $this->load->model('Mapel_model', 'mapel');
            $this->mapel->tambah_mapel($data);
            $this->load->model('Kelas_model', 'kelas');
            $data['kelas'] = $this->kelas->get_kelas();

            $this->session->set_flashdata('mapel_message', '<div class="alert alert-success" role="alert">Mata Pelajaran Berhasil ditambahkan!</div>');
            redirect('admin/get_mapel', 'refresh');
        } else {
            $this->session->set_flashdata('mapel_message', '<div class="alert alert-danger" role="alert">Mata Pelajaran gagal ditambahkan!</div>');
            redirect('admin/get_mapel', 'refresh');
        }
    }

    public function edit_mapel($id)
    {
        $this->db->update('mata_pelajaran', ['nama_mapel' => $this->input->post('nama_mapel')], ['id_mapel' => $id]);
        $this->db->update('mata_pelajaran', ['nilai_kkm' => $this->input->post('nilai_kkm')], ['id_mapel' => $id]);
        $this->db->update('mata_pelajaran', ['kelas' => $this->input->post('kelas')], ['id_mapel' => $id]);
        $this->db->update('mata_pelajaran', ['id_kelas' => $this->input->post('id_kelas')], ['id_mapel' => $id]);

        $this->session->set_flashdata('mapel_message', '<div class="alert alert-success" role="alert">Mata Pelajaran berhasil diubah!</div>');
        redirect('admin/get_mapel', 'refresh');
    }

    public function delete_mapel($id)
    {
        $this->load->model('Mapel_model', 'mapel');
        $this->mapel->delete_mapel($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('mapel_message', '<div class="alert alert-danger" role="alert">Mata Pelajaran berhasil dihapus!</div>');
        redirect('admin/get_mapel', 'refresh');
    }

    public function get_pengajar()
    {
        $data['title'] = 'Daftar Guru Pengajar';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);

        $this->load->model('Mapel_model', 'mapel');
        $data['mapel'] = $this->mapel->get_mapel();
        $this->load->model('Kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();
        $this->load->model('Admin_model', 'guru');
        $data['guru'] = $this->guru->get_guru_mapel();
        $this->load->model('Guru_model', 'pengajar');
        $data['pengajar'] = $this->pengajar->get_pengajar();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengajar', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pengajar()
    {
        $this->form_validation->set_rules('id_guru', 'ID Guru', 'required');
        $this->form_validation->set_rules('id_mapel', 'ID Mapel', 'required');

        if ($this->form_validation->run() == true) {
            $data['id_guru'] = $this->input->post('id_guru');
            $data['id_mapel'] = $this->input->post('id_mapel');

            $this->load->model('Admin_model', 'pengajar');
            $this->pengajar->tambah_pengajar($data);

            $this->session->set_flashdata('pengajar_message', '<div class="alert alert-success" role="alert">Pengajar Berhasil ditambahkan!</div>');
            redirect('admin/get_pengajar', 'refresh');
        } else {
            $this->session->set_flashdata('pengajar_message', '<div class="alert alert-danger" role="alert">Pengajar gagal ditambahkan!</div>');
            redirect('admin/get_pengajar', 'refresh');
        }
    }

    public function edit_pengajar($id)
    {
        $this->db->update('pengajar', ['id_guru' => $this->input->post('id_guru')], ['id' => $id]);
        $this->db->update('pengajar', ['id_mapel' => $this->input->post('id_mapel')], ['id' => $id]);

        $this->session->set_flashdata('pengajar_message', '<div class="alert alert-warning" role="alert">Pengajar berhasil diubah!</div>');
        redirect('admin/get_pengajar', 'refresh');
    }

    public function delete_pengajar($id)
    {
        $this->load->model('Guru_model', 'pengajar');
        $this->pengajar->delete_pengajar($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('pengajar_message', '<div class="alert alert-danger" role="alert">Pengajar berhasil dihapus!</div>');
        redirect('admin/get_pengajar', 'refresh');
    }
    // end bagian mapel

    // start bagian jadwal
    public function get_jadwal()
    {
        $data['title'] = 'Daftar Jadwal';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);


        $this->load->model('jadwal_model', 'jadwal');
        $data['jadwal'] = $this->jadwal->get_jadwal();
        $this->load->model('Kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();
        $this->load->model('Mapel_model', 'mapel');
        $data['mapel'] = $this->mapel->get_mapel();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function get_jadwal_by($id_kelas)
    {
        $data['title'] = 'Daftar Jadwal Kelas';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);

        $this->load->model('Jadwal_model', 'jadwal');
        $data['jadwal'] = $this->jadwal->get_jadwal_by($id_kelas);
        $this->load->model('Kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_jadwal()
    {
        // $this->form_validation->set_rules('id_kelas', 'ID Kelas', 'required');
        $this->form_validation->set_rules('id_mapel', 'ID Mapel', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('waktu_akhir', 'Waktu Akhir', 'required');
        $this->form_validation->set_rules('jam_akhir', 'Jam Akhir', 'required');

        if ($this->form_validation->run() == true) {
            // $data['id_kelas'] = $this->input->post('id_kelas');
            $data['id_mapel'] = $this->input->post('id_mapel');
            $data['hari'] = $this->input->post('hari');
            $data['waktu_mulai'] = $this->input->post('waktu_mulai');
            $data['jam_mulai'] = $this->input->post('jam_mulai');
            $data['waktu_akhir'] = $this->input->post('waktu_akhir');
            $data['jam_akhir'] = $this->input->post('jam_akhir');

            $this->load->model('Jadwal_model', 'jadwal');
            $this->jadwal->tambah_jadwal($data);

            $this->session->set_flashdata('jadwal_message', '<div class="alert alert-success" role="alert">Jadwal Berhasil ditambahkan!</div>');
            redirect('admin/get_jadwal', 'refresh');
        } else {
            $this->session->set_flashdata('jadwal_message', '<div class="alert alert-danger" role="alert">Jadwal gagal ditambahkan!</div>');
            redirect('admin/get_jadwal', 'refresh');
        }
    }

    public function edit_jadwal($id)
    {
        // $this->db->update('jadwal', ['id_kelas' => $this->input->post('id_kelas')], ['id' => $id]);
        $this->db->update('jadwal', ['id_mapel' => $this->input->post('id_mapel')], ['id' => $id]);
        $this->db->update('jadwal', ['hari' => $this->input->post('hari')], ['id' => $id]);
        $this->db->update('jadwal', ['waktu_mulai' => $this->input->post('waktu_mulai')], ['id' => $id]);
        $this->db->update('jadwal', ['jam_mulai' => $this->input->post('jam_mulai')], ['id' => $id]);
        $this->db->update('jadwal', ['waktu_akhir' => $this->input->post('waktu_akhir')], ['id' => $id]);
        $this->db->update('jadwal', ['jam_akhir' => $this->input->post('jam_akhir')], ['id' => $id]);

        $this->session->set_flashdata('jadwal_message', '<div class="alert alert-warning" role="alert">Jadwal berhasil diubah!</div>');
        redirect('admin/get_jadwal', 'refresh');
    }

    public function delete_jadwal($id)
    {
        $this->load->model('Jadwal_model', 'jadwal');
        $this->jadwal->delete_jadwal($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('jadwal_message', '<div class="alert alert-danger" role="alert">Jadwal berhasil dihapus!</div>');
        redirect('admin/get_jadwal', 'refresh');
    }
    // end bagian jadwal
    public function changePassword()
    {
        $data['title'] = 'Change Password';

        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $cek_old = $this->Admin_model->cek_old();
            if ($cek_old == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Wrong current password!</div>');

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/topbar', $data);
                $this->load->view('admin/changepassword', $data);
                $this->load->view('templates/footer');
            } else {
                $this->Admin_model->savepass();
                // $this->session->sess_destroy();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed</div>');
                redirect('admin/changepassword');
            }
        }
    }

    // Start bagian nilai
    public function get_nilai()
    {
        $data['title'] = 'Daftar Nilai Siswa';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);


        $this->load->model('Nilai_model', 'nilai');
        $data['nilai'] = $this->nilai->getAll();
        $this->load->model('Kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/nilai', $data);
        $this->load->view('templates/footer');
    }

    public function search_nilai_siswa()
    {
        $data['title'] = 'Daftar Nilai Siswa Kelas';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $keyword = $this->input->post('keyword');
        $this->load->model('Nilai_model', 'nilai');
        $data['nilai'] = $this->nilai->get_keyword($keyword);

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/nilai', $data);
        $this->load->view('templates/footer');
    }

    public function get_nilai_siswa_by($id_kelas)
    {
        $data['title'] = 'Daftar Nilai Siswa';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);

        $this->load->model('Nilai_model', 'nilai');
        $data['nilai'] = $this->nilai->get_nilai_siswa_by($id_kelas);
        $this->load->model('Kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/nilai', $data);
        $this->load->view('templates/footer');
    }

    // End bagian nilai

    // Start bagian tahun akademik
    public function get_tahun()
    {
        $data['title'] = 'Daftar Tahun Akademik';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);


        $this->load->model('Tahun_model', 'tahun');
        $data['tahun'] = $this->tahun->getAll();


        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tahun', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_tahun()
    {
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');


        if ($this->form_validation->run() == true) {
            // $data['id_kelas'] = $this->input->post('id_kelas');
            $data['tahun'] = $this->input->post('tahun');

            $this->load->model('Tahun_model', 'tahun');
            $this->tahun->tambah_tahun($data);

            $this->session->set_flashdata('tahun_message', '<div class="alert alert-success" role="alert">Tahun Berhasil ditambahkan!</div>');
            redirect('admin/get_tahun', 'refresh');
        } else {
            $this->session->set_flashdata('tahun_message', '<div class="alert alert-danger" role="alert">Tahun gagal ditambahkan!</div>');
            redirect('admin/get_tahun', 'refresh');
        }
    }

    public function edit_tahun($id)
    {
        $this->db->update('tahun_akademik', ['tahun' => $this->input->post('tahun')], ['id_tahun_akademik' => $id]);

        $this->session->set_flashdata('tahun_message', '<div class="alert alert-warning" role="alert">Tahun berhasil diubah!</div>');
        redirect('admin/get_tahun', 'refresh');
    }

    public function delete_tahun($id)
    {
        $this->load->model('Tahun_model', 'tahun');
        $this->tahun->delete_tahun($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('tahun_message', '<div class="alert alert-danger" role="alert">Tahun berhasil dihapus!</div>');
        redirect('admin/get_tahun', 'refresh');
    }
    // End bagian tahun akademik

    // Start bagian Pengembangan Diri
    public function get_pengembangan()
    {
        $data['title'] = 'Daftar Pengembangan Diri';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();


        $this->session->set_userdata($data);


        $this->load->model('Pengembangan_model', 'pengembangan');
        $data['pengembangan'] = $this->pengembangan->get_pengembangan();
        $this->load->model('Admin_model', 'guru');
        $data['guru'] = $this->guru->get_guru_mapel();


        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengembangan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pengembangan()
    {
        $this->form_validation->set_rules('nama_pengembangan', 'Nama Pengembangan', 'required');
        $this->form_validation->set_rules('nip_pembimbing', 'NIP Pembimbing', 'required');


        if ($this->form_validation->run() == true) {
            $data['nama_pengembangan'] = $this->input->post('nama_pengembangan');
            $data['nip_pembimbing'] = $this->input->post('nip_pembimbing');

            $this->load->model('Pengembangan_model', 'pengembangan');
            $this->pengembangan->tambah_pengembangan($data);

            $this->session->set_flashdata('pengembangan_message', '<div class="alert alert-success" role="alert">Pengembangan Diri Berhasil ditambahkan!</div>');
            redirect('admin/get_pengembangan', 'refresh');
        } else {
            $this->session->set_flashdata('pengembangan_message', '<div class="alert alert-danger" role="alert">Pengembangan Diri gagal ditambahkan!</div>');
            redirect('admin/get_pengembangan', 'refresh');
        }
    }

    public function edit_pengembangan($id)
    {
        $this->db->update('pengembangan_diri', ['nama_pengembangan' => $this->input->post('nama_pengembangan')], ['id_pengembangan' => $id]);
        $this->db->update('pengembangan_diri', ['nip_pembimbing' => $this->input->post('nip_pembimbing')], ['id_pengembangan' => $id]);

        $this->session->set_flashdata('pengembangan_message', '<div class="alert alert-warning" role="alert">Pengembangan Diri berhasil diubah!</div>');
        redirect('admin/get_pengembangan', 'refresh');
    }

    public function delete_pengembangan($id)
    {
        $this->load->model('Pengembangan_model', 'pengembangan');
        $this->pengembangan->delete_pengembangan($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('pengembangan_message', '<div class="alert alert-danger" role="alert">Pengembangan berhasil dihapus!</div>');
        redirect('admin/get_pengembangan', 'refresh');
    }
    // End bagian Pengembangan Diri
}
    
    /* End of file Guru.php */