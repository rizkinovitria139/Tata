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
            $data['title'] = 'Login Page - Guru';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/loginguru');
            $this->load->view('templates/auth_footer');
        } else {
            //jika validasi berhasil
            $this->loginguru();
        }
    }

    private function loginguru()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $guru = $this->db->get_where('guru', ['username' => $username])->row_array();

        //jika gurunya ada
        if ($guru) {
            if ($guru['is_active'] == 1) {
                if ($guru['role_id'] == 1) {
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

    public function loginsiswa()
    {
        $nis = $this->input->post('nis');
        $password = $this->input->post('password');
        $siswa = $this->db->get_where('siswa', ['nis' => $nis])->row_array();

        $data['title'] = 'Login Page - Siswa';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/loginsiswa');
        $this->load->view('templates/auth_footer');
        if ($siswa) {
            // usernya ada
            if ($siswa['is_active'] == 1) {
                echo "Selamat datang ";
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">username tidak terdaftar!</div>');
                redirect('auth/login');
            }
        }

        // if ($this->form_validation->run() == false) {
        // } else {
        //     //jika validasi berhasil

        // }
    }
}

// if (password_verify($password, $siswa['password'])) {
//     $data = [
//         'nis'               => $siswa['nis'],
//         'nisn'              => $siswa['nisn'],
//         'nama'              => $siswa['nama'],
//         'tempat_lahir'      => $siswa['tempat lahir'],
//         'tanggal_lahir'     => $siswa['tanggal_lahir'],
//         'jenis_kelamin'     => $siswa['jenis_kelamin'],
//         'agama'             => $siswa['agama'],
//         'password'          => $siswa['password']
//     ];
//     $this->session->set_userdata($data);
// } else {
//     $this->session->set_flashdata('message', '<div class="alert 
// alert-danger" role="alert">Wrong password!</div>');
//     redirect('auth/loginsiswa');
// }