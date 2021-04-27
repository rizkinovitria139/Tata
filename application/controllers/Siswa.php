<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = 'Halaman Siswa';

        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')]) ->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profil Siswa';

        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')]) ->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/siswa_sidebar', $data);
            $this->load->view('templates/siswa_topbar', $data);
            $this->load->view('siswa/edit', $data);
            $this->load->view('templates/footer');
    
        } else{
            $nama= $this->input->post('nama');
            $nis = $this->input->post('nis');

            $this->db->set('nama', $nama);
            $this->db->where('nis', $nis);
            $this->db->update('siswa');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('siswa/');
        }
    }
    public function editData()
    {
  
        $nis = $this->input->post('nis');
        $data = array(
          'nama' => $this->input->post('nama',true),
          'email_siswa' => $this->input->post('email',true),
          'alamat_siswa' => $this->input->post('address',true),  
        );
        $this->db->where('nis', $nis);
        $this->db->update('siswa', $data);    
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('siswa/');
      }
}

/* End of file Siswa.php */