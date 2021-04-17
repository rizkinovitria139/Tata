<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    private $table = 'siswa';


    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["username" => $id])->row();
    }
}

/* End of file Siswa_model.php */