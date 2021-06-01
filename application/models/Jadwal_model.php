<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    private $table = "jadwal";

    public function get_jadwal()
    {
        $query = "SELECT `jadwal`.*, `mata_pelajaran`.*, `kelas`.*
        FROM `jadwal` JOIN `mata_pelajaran`
         ON `jadwal`.`id_mapel` = `mata_pelajaran`.`id_mapel` 
         JOIN `kelas`
         ON `mata_pelajaran`.`id_kelas` = `kelas`.`id_kelas` ";

        return $this->db->query($query)->result_array();
    }

    public function tampilJadwal($id)
    {
        $query = "SELECT `jadwal`.*, `mata_pelajaran`.*, `kelas`.*, `siswa`.*
        FROM `jadwal` JOIN `mata_pelajaran`
        ON `jadwal`.`id_mapel` = `mata_pelajaran`.`id_mapel` 
        JOIN `kelas`
        ON `mata_pelajaran`.`id_kelas` = `kelas`.`id_kelas`
        join `siswa`
        on `kelas`.`id_kelas` = `siswa`.`id_kelas`
        where `siswa`.`nis`= $id";

        return $this->db->query($query)->result_array();
        
        // $this->db->select('jadwal.*,mata_pelajaran.nama_mapel, siswa.id_kelas');
        // $this->db->from('jadwal');
        // $this->db->join('mata_pelajaran', 'jadwal.id_mapel = mata_pelajaran.id_mapel');
        // $this->db->join('siswa', 'kelas.id_kelas = siswa.id_kelas');
        // $this->db->where('jadwal.id_mapel', $id);
        // $value = $this->db->get();

        // return $value->result();
    }

    public function tambah_jadwal($data)
    {

        return $this->db->insert($this->table, $data);
    }

    public function delete_jadwal($id)
    {
        return $this->db->delete('jadwal', array('id' => $id));
    }
    public function get_hari_senin($id)
    {
        $query = "SELECT `jadwal`.*, `mata_pelajaran`.*, `kelas`.*, `siswa`.*
        FROM `jadwal` JOIN `mata_pelajaran`
        ON `jadwal`.`id_mapel` = `mata_pelajaran`.`id_mapel` 
        JOIN `kelas`
        ON `mata_pelajaran`.`id_kelas` = `kelas`.`id_kelas`
        join `siswa`
        on `kelas`.`id_kelas` = `siswa`.`id_kelas`
        where `jadwal`.`hari` = 'Senin' and `siswa`.`nis`= $id";

        return $this->db->query($query)->result_array();
    }
    public function get_hari_selasa($id)
    {
        $query = "SELECT `jadwal`.*, `mata_pelajaran`.*, `kelas`.*, `siswa`.*
        FROM `jadwal` JOIN `mata_pelajaran`
        ON `jadwal`.`id_mapel` = `mata_pelajaran`.`id_mapel` 
        JOIN `kelas`
        ON `mata_pelajaran`.`id_kelas` = `kelas`.`id_kelas`
        join `siswa`
        on `kelas`.`id_kelas` = `siswa`.`id_kelas`
        where `jadwal`.`hari` = 'Selasa' and `siswa`.`nis`= $id";

        return $this->db->query($query)->result_array();
    }
    public function get_hari_rabu($id)
    {
        $query = "SELECT `jadwal`.*, `mata_pelajaran`.*, `kelas`.*, `siswa`.*
        FROM `jadwal` JOIN `mata_pelajaran`
        ON `jadwal`.`id_mapel` = `mata_pelajaran`.`id_mapel` 
        JOIN `kelas`
        ON `mata_pelajaran`.`id_kelas` = `kelas`.`id_kelas`
        join `siswa`
        on `kelas`.`id_kelas` = `siswa`.`id_kelas`
        where `jadwal`.`hari` = 'Rabu' and `siswa`.`nis`= $id";

        return $this->db->query($query)->result_array();
    }
    public function get_hari_kamis($id)
    {
        $query = "SELECT `jadwal`.*, `mata_pelajaran`.*, `kelas`.*, `siswa`.*
        FROM `jadwal` JOIN `mata_pelajaran`
        ON `jadwal`.`id_mapel` = `mata_pelajaran`.`id_mapel` 
        JOIN `kelas`
        ON `mata_pelajaran`.`id_kelas` = `kelas`.`id_kelas`
        join `siswa`
        on `kelas`.`id_kelas` = `siswa`.`id_kelas`
        where `jadwal`.`hari` = 'Kamis' and `siswa`.`nis`= $id";

        return $this->db->query($query)->result_array();
    }
    public function get_hari_jumat($id)
    {
        $query = "SELECT `jadwal`.*, `mata_pelajaran`.*, `kelas`.*, `siswa`.*
        FROM `jadwal` JOIN `mata_pelajaran`
        ON `jadwal`.`id_mapel` = `mata_pelajaran`.`id_mapel` 
        JOIN `kelas`
        ON `mata_pelajaran`.`id_kelas` = `kelas`.`id_kelas`
        join `siswa`
        on `kelas`.`id_kelas` = `siswa`.`id_kelas`
        where `jadwal`.`hari` = 'Jumat' and `siswa`.`nis`= $id";

        return $this->db->query($query)->result_array();
    }
    public function get_hari_sabtu($id)
    {
        $query = "SELECT `jadwal`.*, `mata_pelajaran`.*, `kelas`.*, `siswa`.*
        FROM `jadwal` JOIN `mata_pelajaran`
        ON `jadwal`.`id_mapel` = `mata_pelajaran`.`id_mapel` 
        JOIN `kelas`
        ON `mata_pelajaran`.`id_kelas` = `kelas`.`id_kelas`
        join `siswa`
        on `kelas`.`id_kelas` = `siswa`.`id_kelas`
        where `jadwal`.`hari` = 'Sabtu' and `siswa`.`nis`= $id";

        return $this->db->query($query)->result_array();
    }
}