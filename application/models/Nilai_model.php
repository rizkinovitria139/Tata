<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
        private $_table = "nilai_siswa";

        public function getAll()
        {
                $query = "SELECT `nilai_siswa`.*, `mata_pelajaran`.*, `semester`.*, `siswa`.*
                FROM `nilai_siswa` JOIN `siswa`
                ON `nilai_siswa`.`nis` = `siswa`.`nis`
                JOIN `mata_pelajaran`
                ON `nilai_siswa`.`id_mapel` = `mata_pelajaran`.`id_mapel`
                JOIN `semester`
                ON`semester`.`id_semester` = `nilai_siswa`.`id_semester`
                ";

                return $this->db->query($query)->result_array();
        }
        public function getNilai($id)
        {
                $this->db->select('siswa.nama, nilai_siswa.nilai_tugas, nilai_siswa.nilai_uts, nilai_siswa.nilai_uas, mata_pelajaran.nama_mapel');
                $this->db->from('siswa');
                $this->db->join('nilai_siswa',  'siswa.nis = nilai_siswa.nis');
                $this->db->join('mata_pelajaran', 'nilai_siswa.id_mapel = mata_pelajaran.id_mapel');
                $this->db->where('siswa.nis', $id);
                $value = $this->db->get();

                return $value->result();
        }
}
