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
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //jika validasi berhasil
            $this->login();
        }
    }

    private function login()
    {
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');

        $guru = $this->db->get_where('guru', ['nip' => $nip])->row_array();

        //jika gurunya ada
        if ($guru) {
            if ($guru['is_active'] == 1) {
                echo "selamat datang";
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nip tidak terdaftar!</div>');
            redirect('auth');
        }
    }
}
