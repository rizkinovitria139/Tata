<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
    
    public function insert_batch($table = null, $data = array())
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->insert_batch($table, $data);
        }
    }
}