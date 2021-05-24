<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Presensi_model extends CI_Model
{
    private $table = 'guru';

    public function update($data)
    {
        return $this->db->update($this->table, $data);
    }

    public function get_presensi(){
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan.$tahun;

        $query = "SELECT `siswa`.*, `presensi`.*, `kelas`.*
        FROM `siswa` JOIN `presensi`
        ON `siswa`.`nis` = `presensi`.`nis` 
        JOIN `kelas`
        ON `presensi`.`id_kelas` = `kelas`.`id_kelas`
        WHERE `presensi`.`bulan` = $bulantahun
        ORDER BY `siswa`.`nama` ASC";

        return $this->db->query($query)->result_array();
    }
}