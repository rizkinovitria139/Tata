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
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //jika usernya ada
        if ($user) {
            $data = [
                'id_user' => $user['id_user'],
                'username' => $user['username'],
                'password' => $user['password']
            ];
            // menyimpan data ke session
            $this->session->set_userdata($data);
            if ($user['is_active'] == 1) {
                if ($user['id_role'] == 1) {
                    redirect('guru');
                } else {
                    echo "Selamat datang wali kelas";
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">username tidak terdaftar!</div>');
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
