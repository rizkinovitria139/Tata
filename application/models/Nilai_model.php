<?php

class Nilai_model extends CI_Model
{
   // private $table = "nilai_siswa";

    public function getAll()
    {
        return $this->db->get('nilai_siswa')->result_array();
    }
}