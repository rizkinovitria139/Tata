<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_model extends CI_Model
{

    private $table = 'tahun_akademik';

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }
}

/* End of file Tahun_model.php */
