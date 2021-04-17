<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{

    private $table = "guru";

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }
    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function update($data)
    {
        return $this->db->update($this->table, $data);
    }
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["username" => $id])->row();
    }
}

/* End of file Guru_model.php */
