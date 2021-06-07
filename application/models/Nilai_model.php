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
                $query = "SELECT `nilai_siswa`.*, `mata_pelajaran`.*, `semester`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_siswa` JOIN `siswa`
                ON `nilai_siswa`.`nis` = `siswa`.`nis`
                JOIN `mata_pelajaran`
                ON `nilai_siswa`.`id_mapel` = `mata_pelajaran`.`id_mapel`
                JOIN `kelas` 
                ON `kelas`.`id_kelas` = `mata_pelajaran`.`id_kelas`
                JOIN `tahun_akademik`
                ON `kelas`.`id_tahun_akademik` = `tahun_akademik`.`id_tahun_akademik`
                JOIN `semester`
                ON`semester`.`id_semester` = `nilai_siswa`.`id_semester`
                WHERE `siswa`.`nis` = $id
               ";

                return $this->db->query($query)->result_array();
        }

        public function get_semester_1($id)
        {
                $query = "SELECT `nilai_siswa`.*, `mata_pelajaran`.*, `semester`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_siswa` JOIN `siswa`
                ON `nilai_siswa`.`nis` = `siswa`.`nis`
                JOIN `mata_pelajaran`
                ON `nilai_siswa`.`id_mapel` = `mata_pelajaran`.`id_mapel`
                JOIN `kelas` 
                ON `kelas`.`id_kelas` = `mata_pelajaran`.`id_kelas`
                JOIN `tahun_akademik`
                ON `kelas`.`id_tahun_akademik` = `tahun_akademik`.`id_tahun_akademik`
                JOIN `semester`
                ON`semester`.`id_semester` = `nilai_siswa`.`id_semester`
                WHERE `semester`.`semester`= 1 AND `siswa`.`nis` = $id
               ";

                return $this->db->query($query)->result_array();
        }
        public function get_semester_2($id)
        {
                $query = "SELECT `nilai_siswa`.*, `mata_pelajaran`.*, `semester`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_siswa` JOIN `siswa`
                ON `nilai_siswa`.`nis` = `siswa`.`nis`
                JOIN `mata_pelajaran`
                ON `nilai_siswa`.`id_mapel` = `mata_pelajaran`.`id_mapel`
                JOIN `kelas` 
                ON `kelas`.`id_kelas` = `mata_pelajaran`.`id_kelas`
                JOIN `tahun_akademik`
                ON `kelas`.`id_tahun_akademik` = `tahun_akademik`.`id_tahun_akademik`
                JOIN `semester`
                ON`semester`.`id_semester` = `nilai_siswa`.`id_semester`
                WHERE `semester`.`semester`= 2 AND `siswa`.`nis` = $id
               ";

                return $this->db->query($query)->result_array();
        }
        public function get_semester_3($id)
        {
                $query = "SELECT `nilai_siswa`.*, `mata_pelajaran`.*, `semester`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_siswa` JOIN `siswa`
                ON `nilai_siswa`.`nis` = `siswa`.`nis`
                JOIN `mata_pelajaran`
                ON `nilai_siswa`.`id_mapel` = `mata_pelajaran`.`id_mapel`
                JOIN `kelas` 
                ON `kelas`.`id_kelas` = `mata_pelajaran`.`id_kelas`
                JOIN `tahun_akademik`
                ON `kelas`.`id_tahun_akademik` = `tahun_akademik`.`id_tahun_akademik`
                JOIN `semester`
                ON`semester`.`id_semester` = `nilai_siswa`.`id_semester`
                WHERE `semester`.`semester`= 3 AND `siswa`.`nis` = $id
               ";

                return $this->db->query($query)->result();
        }
        public function get_semester_4($id)
        {
                $query = "SELECT `nilai_siswa`.*, `mata_pelajaran`.*, `semester`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_siswa` JOIN `siswa`
                ON `nilai_siswa`.`nis` = `siswa`.`nis`
                JOIN `mata_pelajaran`
                ON `nilai_siswa`.`id_mapel` = `mata_pelajaran`.`id_mapel`
                JOIN `kelas` 
                ON `kelas`.`id_kelas` = `mata_pelajaran`.`id_kelas`
                JOIN `tahun_akademik`
                ON `kelas`.`id_tahun_akademik` = `tahun_akademik`.`id_tahun_akademik`
                JOIN `semester`
                ON`semester`.`id_semester` = `nilai_siswa`.`id_semester`
                WHERE `semester`.`semester`= 4 AND `siswa`.`nis` = $id
               ";

                return $this->db->query($query)->result_array();
        }
        public function get_semester_5($id)
        {
                $query = "SELECT `nilai_siswa`.*, `mata_pelajaran`.*, `semester`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_siswa` JOIN `siswa`
                ON `nilai_siswa`.`nis` = `siswa`.`nis`
                JOIN `mata_pelajaran`
                ON `nilai_siswa`.`id_mapel` = `mata_pelajaran`.`id_mapel`
                JOIN `kelas` 
                ON `kelas`.`id_kelas` = `mata_pelajaran`.`id_kelas`
                JOIN `tahun_akademik`
                ON `kelas`.`id_tahun_akademik` = `tahun_akademik`.`id_tahun_akademik`
                JOIN `semester`
                ON`semester`.`id_semester` = `nilai_siswa`.`id_semester`
                WHERE `semester`.`semester`= 5 AND `siswa`.`nis` = $id
               ";

                return $this->db->query($query)->result_array();
        }
        public function get_semester_6($id)
        {
                $query = "SELECT `nilai_siswa`.*, `mata_pelajaran`.*, `semester`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_siswa` JOIN `siswa`
                ON `nilai_siswa`.`nis` = `siswa`.`nis`
                JOIN `mata_pelajaran`
                ON `nilai_siswa`.`id_mapel` = `mata_pelajaran`.`id_mapel`
                JOIN `kelas` 
                ON `kelas`.`id_kelas` = `mata_pelajaran`.`id_kelas`
                JOIN `tahun_akademik`
                ON `kelas`.`id_tahun_akademik` = `tahun_akademik`.`id_tahun_akademik`
                JOIN `semester`
                ON`semester`.`id_semester` = `nilai_siswa`.`id_semester`
                WHERE `semester`.`semester`= 6 AND `siswa`.`nis` = $id
               ";

                return $this->db->query($query)->result_array();
        }
}
