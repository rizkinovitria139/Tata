<?php

class Nilai_model extends CI_Model
{
   private $_table = "nilai_siswa";

    public function getAll()
 {
    //     $query = "SELECT `nilai_siswa`.*, `mata_pelajaran`.'nama_mapel', 'mata_pelajaran'. 'nilai_siswa'
    //     FROM `nilai_siswa` JOIN `mata_pelajaran`
    //     ON `nilai_siswa`.`id_mapel` = `mata_pelajaran`.`id_mapel`
    //     ";

         $query = "SELECT `nilai_siswa`.*, `mata_pelajaran`.*
         FROM `nilai_siswa` JOIN `mata_pelajaran`
         ON `nilai_siswa`.`id_mapel` = `mata_pelajaran`.`id_mapel` ";

        return $this->db->query($query)->result_array();
         //return $this->db->get('nilai_siswa')->result_array();
    }
} 