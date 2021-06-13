<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function checkAccount()
    {
        $loginAs = $this->session->userdata('loginAs');
        if ($loginAs == null) {
            redirect('auth');
        }
    }
    public function checkAuth()
    {
        $loginAs = $this->session->userdata('loginAs');
        if ($loginAs == 'siswa') {
            redirect('siswa');
        } else if ($loginAs == 'admin') {
            redirect('admin');
        } else if ($loginAs == 'guru') {
            redirect('Guru_Mapel');
        } else if ($loginAs == 'gurubk') {
            redirect('Guru_Mapel');
        } else if ($loginAs == 'walikelas') {
            redirect('wali_kelas');
        } else {
            redirect('auth');
        }
    }
}

/* End of file User_model.php */
