<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Presensi_model extends CI_Model
{
    private $table = 'guru';

    public function update($data)
    {
        return $this->db->update($this->table, $data);
    }
}