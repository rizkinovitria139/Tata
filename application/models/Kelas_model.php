<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{

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

    public function tambah_kelas()
    {

        $data = array(
            'id_kelas' => $this->input->post['id_kelas'],
            'nama_kelas' => $this->input->post['nama_kelas'],
            'nip_wali_kelas' => $this->input->post['nip_wali_kelas']
        );
        return $this->db->insert('kelas', $data);
    }
}
    
    /* End of file Kelas_model.php */
