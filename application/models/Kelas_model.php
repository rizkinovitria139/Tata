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
        $query = "SELECT `kelas`.*, `guru`.*
        FROM `kelas` JOIN `guru`
        ON `kelas`.`nip_wali_kelas` = `guru`.`nip`
        ";

        return $this->db->query($query)->result_array();
    }

    public function tambah_kelas($data)
    {

        return $this->db->insert($this->_table, $data);
    }
}
    
    /* End of file Kelas_model.php */
