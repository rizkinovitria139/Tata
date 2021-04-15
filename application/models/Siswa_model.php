<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    private $table = 'siswa';

   
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["username" => $id])->row();
    }
}

/* End of file Siswa_model.php */