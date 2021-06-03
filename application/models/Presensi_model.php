<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Presensi_model extends CI_Model
{
    private $table = 'guru';

    public function update($data)
    {
        return $this->db->update($this->table, $data);
    }

    public function get_presensi($bulantahun)
    {
        // $query = "SELECT `siswa`.*, `presensi`.*, `kelas`.*
        // FROM `siswa` JOIN `presensi`
        // ON `siswa`.`nis` = `presensi`.`nis` 
        // JOIN `kelas`
        // ON `presensi`.`id_kelas` = `kelas`.`id_kelas`
        // WHERE `presensi`.`bulan` = $bulantahun
        // ORDER BY `siswa`.`nama` ASC";

        $this->db->select('siswa.*, presensi.*, kelas.*');
        $this->db->from('siswa');
        $this->db->join('presensi', 'presensi.nis = siswa.nis');
        $this->db->join('kelas', 'kelas.id_kelas = presensi.id_kelas');
        $this->db->where('presensi.bulan', $bulantahun);
        $this->db->order_by('siswa.nama', 'asc');
        return $this->db->get()->result_array();
    }
    public function get_jadwal($nip)
    {
        $this->db->select('jadwal.id, kelas.nama_kelas, jadwal.hari, jadwal.waktu_mulai');
        $this->db->from('pengajar');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = pengajar.id_mapel');
        $this->db->join('kelas', 'kelas.id_kelas = mata_pelajaran.id_kelas');
        $this->db->join('jadwal', 'jadwal.id_mapel = mata_pelajaran.id_mapel');
        $this->db->where('id_guru', $nip);
        return $this->db->get()->result_array();
    }
    public function get_siswakelas($idjadwal)
    {
        $this->db->select('siswa.nis, siswa.nama, kelas.nama_kelas');
        $this->db->from('siswa');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_kelas = siswa.id_kelas');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $this->db->join('jadwal', 'jadwal.id_mapel = mata_pelajaran.id_mapel');
        $this->db->where('jadwal.id', $idjadwal);
        return $this->db->get()->result_array();
    }
}
