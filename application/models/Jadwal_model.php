<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    private $table = "jadwal";

    public function get_jadwal()
    {
        $query = "SELECT `jadwal`.*, `mata_pelajaran`.*, `guru`.*, `kelas`.*
        FROM `jadwal` JOIN `mata_pelajaran`
         ON `jadwal`.`id_mapel` = `mata_pelajaran`.`id_mapel` 
         JOIN `guru`
         ON `mata_pelajaran`.`nip_pengajar` = `guru`.`nip`
         JOIN `kelas`
         ON `mata_pelajaran`.`id_kelas` = `kelas`.`id_kelas` ";

        return $this->db->query($query)->result_array();
    }
}
