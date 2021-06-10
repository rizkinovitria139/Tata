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
        public function getSiswaJadwal($id_mapel)
        {
                $this->db->select('*');
                $this->db->from('mata_pelajaran');
                $this->db->join('kelas', 'kelas.id_kelas = mata_pelajaran.id_kelas');
                $this->db->join('siswa', 'siswa.id_kelas = mata_pelajaran.id_kelas');
                $this->db->where('mata_pelajaran.id_mapel', $id_mapel);
                $query = $this->db->get();
                return $query->result_array();
        }
        public function checkSemesterAvailable($id_semester)
        {
                $this->db->from('nilai_siswa');
                $this->db->where('id_semester', $id_semester);
                $data = $this->db->get()->num_rows();
                return $data;
        }

        public function nilai_pengembangan_1($nis){
                $query = "SELECT `nilai_pengembangan`.*, `pengembangan_diri`.*
                FROM `nilai_pengembangan`
                JOIN `siswa` ON `siswa`.`nis` = `nilai_pengembangan`.`nis`
                JOIN `pengembangan_diri` ON `nilai_pengembangan`.`id_pengembangan` = `pengembangan_diri`.`id_pengembangan`
                JOIN semester ON `semester`.`id_semester` = `nilai_pengembangan`.`id_semester`
                WHERE `semester`.`semester`= 1 AND `siswa`.`nis` = $nis
                ";
                return $this->db->query($query)->result_array();
        }

        public function nilai_kepribadian_1($nis){
                $query = "SELECT `nilai_kepribadian`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_kepribadian`
                JOIN `siswa` ON `siswa`.`nis` = `nilai_kepribadian`.`nis`
                JOIN `kelas` ON `siswa`.`id_kelas` = `kelas`.`id_kelas`
                JOIN `tahun_akademik` ON `tahun_akademik`.`id_tahun_akademik` = `kelas`.`id_tahun_akademik`
                JOIN semester ON `semester`.`id_semester` = `nilai_kepribadian`.`id_semester`
                WHERE `semester`.`semester`= 1 AND `siswa`.`nis` = $nis
                ";
                return $this->db->query($query)->result_array();
        }
        
        public function nilai_pengembangan_2($nis){
                $query = "SELECT `nilai_pengembangan`.*, `pengembangan_diri`.*
                FROM `nilai_pengembangan`
                JOIN `siswa` ON `siswa`.`nis` = `nilai_pengembangan`.`nis`
                JOIN `pengembangan_diri` ON `nilai_pengembangan`.`id_pengembangan` = `pengembangan_diri`.`id_pengembangan`
                JOIN semester ON `semester`.`id_semester` = `nilai_pengembangan`.`id_semester`
                WHERE `semester`.`semester`= 2 AND `siswa`.`nis` = $nis
                ";
                return $this->db->query($query)->result_array();
        }

        public function nilai_kepribadian_2($nis){
                $query = "SELECT `nilai_kepribadian`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_kepribadian`
                JOIN `siswa` ON `siswa`.`nis` = `nilai_kepribadian`.`nis`
                JOIN `kelas` ON `siswa`.`id_kelas` = `kelas`.`id_kelas`
                JOIN `tahun_akademik` ON `tahun_akademik`.`id_tahun_akademik` = `kelas`.`id_tahun_akademik`
                JOIN semester ON `semester`.`id_semester` = `nilai_kepribadian`.`id_semester`
                WHERE `semester`.`semester`= 2 AND `siswa`.`nis` = $nis
                ";
                return $this->db->query($query)->result_array();
        }
        
        public function nilai_pengembangan_3($nis){
                $query = "SELECT `nilai_pengembangan`.*, `pengembangan_diri`.*
                FROM `nilai_pengembangan`
                JOIN `siswa` ON `siswa`.`nis` = `nilai_pengembangan`.`nis`
                JOIN `pengembangan_diri` ON `nilai_pengembangan`.`id_pengembangan` = `pengembangan_diri`.`id_pengembangan`
                JOIN semester ON `semester`.`id_semester` = `nilai_pengembangan`.`id_semester`
                WHERE `semester`.`semester`= 3 AND `siswa`.`nis` = $nis
                ";
                return $this->db->query($query)->result_array();
        }

        public function nilai_kepribadian_3($nis){
                $query = "SELECT `nilai_kepribadian`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_kepribadian`
                JOIN `siswa` ON `siswa`.`nis` = `nilai_kepribadian`.`nis`
                JOIN `kelas` ON `siswa`.`id_kelas` = `kelas`.`id_kelas`
                JOIN `tahun_akademik` ON `tahun_akademik`.`id_tahun_akademik` = `kelas`.`id_tahun_akademik`
                JOIN semester ON `semester`.`id_semester` = `nilai_kepribadian`.`id_semester`
                WHERE `semester`.`semester`= 3 AND `siswa`.`nis` = $nis
                ";
                return $this->db->query($query)->result_array();
        }
        
        public function nilai_pengembangan_4($nis){
                $query = "SELECT `nilai_pengembangan`.*, `pengembangan_diri`.*
                FROM `nilai_pengembangan`
                JOIN `siswa` ON `siswa`.`nis` = `nilai_pengembangan`.`nis`
                JOIN `pengembangan_diri` ON `nilai_pengembangan`.`id_pengembangan` = `pengembangan_diri`.`id_pengembangan`
                JOIN semester ON `semester`.`id_semester` = `nilai_pengembangan`.`id_semester`
                WHERE `semester`.`semester`= 4 AND `siswa`.`nis` = $nis
                ";
                return $this->db->query($query)->result_array();
        }

        public function nilai_kepribadian_4($nis){
                $query = "SELECT `nilai_kepribadian`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_kepribadian`
                JOIN `siswa` ON `siswa`.`nis` = `nilai_kepribadian`.`nis`
                JOIN `kelas` ON `siswa`.`id_kelas` = `kelas`.`id_kelas`
                JOIN `tahun_akademik` ON `tahun_akademik`.`id_tahun_akademik` = `kelas`.`id_tahun_akademik`
                JOIN semester ON `semester`.`id_semester` = `nilai_kepribadian`.`id_semester`
                WHERE `semester`.`semester`= 4 AND `siswa`.`nis` = $nis
                ";
                return $this->db->query($query)->result_array();
        }
        
        public function nilai_pengembangan_5($nis){
                $query = "SELECT `nilai_pengembangan`.*, `pengembangan_diri`.*
                FROM `nilai_pengembangan`
                JOIN `siswa` ON `siswa`.`nis` = `nilai_pengembangan`.`nis`
                JOIN `pengembangan_diri` ON `nilai_pengembangan`.`id_pengembangan` = `pengembangan_diri`.`id_pengembangan`
                JOIN semester ON `semester`.`id_semester` = `nilai_pengembangan`.`id_semester`
                WHERE `semester`.`semester`= 5 AND `siswa`.`nis` = $nis
                ";
                return $this->db->query($query)->result_array();
        }

        public function nilai_kepribadian_5($nis){
                $query = "SELECT `nilai_kepribadian`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_kepribadian`
                JOIN `siswa` ON `siswa`.`nis` = `nilai_kepribadian`.`nis`
                JOIN `kelas` ON `siswa`.`id_kelas` = `kelas`.`id_kelas`
                JOIN `tahun_akademik` ON `tahun_akademik`.`id_tahun_akademik` = `kelas`.`id_tahun_akademik`
                JOIN semester ON `semester`.`id_semester` = `nilai_kepribadian`.`id_semester`
                WHERE `semester`.`semester`= 5 AND `siswa`.`nis` = $nis
                ";
                return $this->db->query($query)->result_array();
        }

        
        public function nilai_pengembangan_6($nis){
                $query = "SELECT `nilai_pengembangan`.*, `pengembangan_diri`.*
                FROM `nilai_pengembangan`
                JOIN `siswa` ON `siswa`.`nis` = `nilai_pengembangan`.`nis`
                JOIN `pengembangan_diri` ON `nilai_pengembangan`.`id_pengembangan` = `pengembangan_diri`.`id_pengembangan`
                JOIN semester ON `semester`.`id_semester` = `nilai_pengembangan`.`id_semester`
                WHERE `semester`.`semester`= 6 AND `siswa`.`nis` = $nis
                ";
                return $this->db->query($query)->result_array();
        }

        public function nilai_kepribadian_6($nis){
                $query = "SELECT `nilai_kepribadian`.*, `siswa`.*, `kelas`.*, `tahun_akademik`.*
                FROM `nilai_kepribadian`
                JOIN `siswa` ON `siswa`.`nis` = `nilai_kepribadian`.`nis`
                JOIN `kelas` ON `siswa`.`id_kelas` = `kelas`.`id_kelas`
                JOIN `tahun_akademik` ON `tahun_akademik`.`id_tahun_akademik` = `kelas`.`id_tahun_akademik`
                JOIN semester ON `semester`.`id_semester` = `nilai_kepribadian`.`id_semester`
                WHERE `semester`.`semester`= 6 AND `siswa`.`nis` = $nis
                ";
                return $this->db->query($query)->result_array();
        }

        

        public function get_wali($nip){
            $query = "SELECT `nip`, `nama` 
                FROM `guru`
                WHERE `guru`.`nip` = $nip";
                
            return $this->db->query($query)->result_array();
        }
        
        // public function get_siswa($nis){
        //     $query = "SELECT `siswa`.*, `kelas`.*
        //         FROM `siswa`
        //         JOIN `kelas` ON `siswa`.`id_kelas` = `siswa`.`id_kelas`
        //         JOIN `tahun_akademik`
        //         ON `kelas`.`id_tahun_akademik` = `tahun_akademik`.`id_tahun_akademik`
        //         WHERE`siswa`.`nis` = $nis";
                
        //     return $this->db->query($query)->result_array();
        // }

        public function get_presensi($nis){
                $query = "SELECT *
                FROM presensi
                WHERE `presensi`.`nis` = $nis";
                
            return $this->db->query($query)->result_array();
                
        }
}