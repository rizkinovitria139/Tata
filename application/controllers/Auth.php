<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model', 'm_user');
        // $this->m_user->checkAuth();
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/loginuser');
            $this->load->view('templates/auth_footer');
        } else {
            //jika validasi berhasil
            $this->loginuser();
        }
    }

    private function loginuser()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $guru = $this->db->get_where('guru', ['username' => $username])->row_array();
        $siswa = $this->db->get_where('siswa', ['username' => $username])->row_array();

        //jika usernya ada
        if ($guru) {

            if ($guru['is_active'] == 1) {
                // cek password
                if ($password == $guru['password']) {

                    if ($guru['role_id'] == 4) {
                        $data = [
                            'username' => $guru['username'],
                            'role_id' => $guru['role_id'],
                            'nip' => $guru['nip'],
                            'tempat_lahir' => $guru['tempat_lahir'],
                            'tanggal_lahir' => $guru['tanggal_lahir'],
                            'jenis_kelamin' => $guru['jenis_kelamin'],
                            'agama' => $guru['agama'],
                            'alamat' => $guru['alamat'],
                            'no_telp' => $guru['no_telp'],
                            'tanggal_masuk' => $guru['tanggal_masuk'],
                            'email' => $guru['email'],
                            'status' => $guru['status'],
                            'password' => $guru['password'],
                            'username' => $guru['username'],
                            'loginAs' => 'admin'
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin');
                    }
                    if ($guru['role_id'] == 5) {
                        $data = [
                            'username' => $guru['username'],
                            'role_id' => $guru['role_id'],
                            'nama' => $guru['nama'],
                            'nip' => $guru['nip'],
                            'loginAs' => 'guru'
                        ];
                        $this->session->set_userdata($data);
                        redirect('Guru_Mapel');
                    } elseif ($guru['role_id'] == 7) {
                        $data = [
                            'username' => $guru['username'],
                            'role_id' => $guru['role_id'],
                            'nip' => $guru['nip'],
                            'loginAs' => 'gurubk'
                        ];
                        $this->session->set_userdata($data);
                        redirect('Bk');
                        // echo 'Selamat datang Guru';
                    } elseif ($guru['role_id'] == 8) {
                        $data = [
                            'username' => $guru['username'],
                            'role_id' => $guru['role_id'],
                            'nip' => $guru['nip'],
                            'tempat_lahir' => $guru['tempat_lahir'],
                            'tanggal_lahir' => $guru['tanggal_lahir'],
                            'jenis_kelamin' => $guru['jenis_kelamin'],
                            'agama' => $guru['agama'],
                            'alamat' => $guru['alamat'],
                            'no_telp' => $guru['no_telp'],
                            'tanggal_masuk' => $guru['tanggal_masuk'],
                            'email' => $guru['email'],
                            'status' => $guru['status'],
                            'password' => $guru['password'],
                            'username' => $guru['username'],
                            'loginAs' => 'walikelas'
                        ];
                        $this->session->set_userdata($data);
                        redirect('wali_kelas');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert 
                    alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert 
				alert-danger" role="alert">User belum diaktivasi!</div>');
                redirect('auth');
            }
        } elseif ($siswa) {
            if ($siswa['is_active'] == 1) {
                // cek password
                if ($password == $siswa['password']) {

                    if ($siswa['role_id'] == 6) {
                        $data = [
                            'username' => $siswa['username'],
                            'role_id' => $siswa['role_id'],
                            'nis' => $siswa['nis'],
                            'nama' => $siswa['nama'],
                            'email' => $siswa['email_siswa'],
                            'alamat' => $siswa['alamat_siswa'],
                            'id_kelas' => $siswa['id_kelas'],
                            'loginAs' => 'siswa'
                            //$items = (string)$var;
                        ];
                        $this->session->set_userdata($data);
                        redirect('siswa');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert 
                    alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert 
				alert-danger" role="alert">User belum diaktivasi!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
}
