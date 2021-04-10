<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model', 'kelas');
        $this->load->model('Guru_model', 'guru');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = 'Dashboard - Guru';

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('guru/index');
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'Profile Guru';

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('guru/profile');
        $this->load->view('templates/footer');
    }

    public function getGuru()
    {
    }

    // public function kelas()
    // {
    //     $data['title'] = 'Kelas';

    //     $this->session->set_userdata($data);
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('templates/topbar');
    //     $this->load->view('guru/kelas');
    //     $this->load->view('templates/footer');
    // }

    public function get_kelas()
    {
        $data['title'] = 'Daftar Kelas';

        $this->session->set_userdata($data);

        $this->db->select('a.id_kelas, a.nama_kelas, b.nama');
        $this->db->from('kelas AS a');
        $this->db->join('guru AS b', 'a.nip_wali_kelas = b.nip');
        $this->db->get();
        $this->load->model('kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();

        $this->db->select('guru.nip');
        $this->db->from('guru');
        $this->db->get();
        $data['guru'] = $this->guru->get_guru();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('guru/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kelas()
    {
        $data = array(
            'id_kelas' => $this->input->post['id_kelas'],
            'nama_kelas' => $this->input->post['nama_kelas'],
            'nip_wali_kelas' => $this->input->post['nip_wali_kelas']
        );
        $this->db->insert('kelas', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu telah ditambahkan!</div');
        redirect('guru/kelas');

        // $this->session->set_userdata($data);
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar');
        // $this->load->view('templates/topbar');
        // $this->load->view('guru/kelas', $data);
        // $this->load->view('templates/footer');
    }
}
    
    /* End of file Guru.php */