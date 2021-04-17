<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel_model extends CI_Model
{
    private $table = "mata_pelajaran";

    public function getAll()
    {
        $query = "SELECT `mata_pelajaran`.*, `guru`.*
        FROM `mata_pelajaran` JOIN `guru`
         ON `mata_pelajaran`.`nip_pengajar` = `guru`.`nip` ";

        return $this->db->query($query)->result_array();
    }
}