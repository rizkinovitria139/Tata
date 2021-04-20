<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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
                            'role_id' => $guru['role_id']
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin');
                    }
                    if ($guru['role_id'] == 5) {
                        $data = [
                            'username' => $guru['username'],
                            'role_id' => $guru['role_id']
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin/wali_kelas');
                    } else {
                        echo 'Selamat datang Guru';
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
                            'role_id' => $siswa['role_id']
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
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
}
