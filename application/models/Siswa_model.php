<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    private $table = 'siswa';


    public function getAll()
    {
        $query = "SELECT `siswa`.*
        FROM `siswa`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["username" => $id])->row();
    }


    public function siswa_tambah($data)
    {


        $this->db->insert('siswa', $data);
    }

    public function delete_siswa($id)
    {
        $this->db->where('nis', $id);
        $this->db->delete('siswa');
    }

    public function save()
    {
        $pass = md5($this->input->post('new'));
        $data = array(
            'new_password1' => $pass
        );
        $this->db->where('nis', $this->session->userdata('nis'));
        $this->db->update('siswa', $data);
    }
    // fungsi untuk mengecek password lama :
    public function cek_old()
    {
        $old = md5($this->input->post('current_password'));
        $this->db->where('password', $old);
        $query = $this->db->get('siswa');
        return $query->result();
    }
}

/* End of file Siswa_model.php */