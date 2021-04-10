<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_guru()
    {
        $query = "SELECT `guru`.* FROM `guru`";
        return $this->db->query($query)->result_array();
    }
}

/* End of file Guru_model.php */
