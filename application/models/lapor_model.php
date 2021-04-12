<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lapor_model extends CI_Model
{
    private $table = "lapor_bk";
 
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
	public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }
	public function getById($id)
    {
        return $this->db->get_where($this->table, ["nis" => $id])->row();
    }
}