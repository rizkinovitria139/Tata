<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
    private $_table = 'kelas';

    public function __construct()
    {
        parent::__construct();
    }


    public function get_kelas()
    {
        $query = "SELECT `kelas`.*, `guru`.*, `tahun_akademik`.*
        FROM `kelas` JOIN `guru`
        ON `kelas`.`nip_wali_kelas` = `guru`.`nip`
        JOIN `tahun_akademik`
        ON `tahun_akademik`.id_tahun_akademik = `kelas`.`id_tahun_akademik`
        ";

        return $this->db->query($query)->result_array();
    }

    public function tambah_kelas($data)
    {

        return $this->db->insert($this->_table, $data);
    }

    public function delete_kelas($id)
    {
        return $this->db->delete('kelas', array('id_kelas' => $id));
    }
}

    
    /* End of file Kelas_model.php */
