<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    private $table = "jadwal";

    public function getAll()
    {
        $query = "SELECT `jadwal`.*, `mata_pelajaran`.*
        FROM `jadwal` JOIN `mata_pelajaran`
         ON `jadwal`.`id_mapel` = `mata_pelajaran`.`id_mapel` ";

        return $this->db->query($query)->result_array();
    }
}