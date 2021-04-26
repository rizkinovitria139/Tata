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

    public function tampilJadwal()
    {
        $this->db->select('jadwal.*,mata_pelajaran.nama_mapel, siswa.id_kelas');
        $this->db->from('jadwal');
        $this->db->join('mata_pelajaran', 'jadwal.id_mapel = mata_pelajaran.id_mapel');
        $this->db->join('siswa', 'kelas.id_kelas = siswa.id_kelas');
      //  $this->db->where('jadwal.id_mapel', $id);
        $value = $this->db->get();
        
        return $value->result();
    }
}