<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengembangan_model extends CI_Model
{


    public $table = 'pengembangan_diri';
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function get_pengembangan()
    {
        $query = "SELECT pengembangan_diri.*, guru.*
         FROM pengembangan_diri
         JOIN guru
         ON pengembangan_diri.nip_pembimbing = guru.nip";

        return $this->db->query($query)->result_array();
    }

    public function tambah_pengembangan($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function edit_pengembangan($data)
    {
        return $this->db->update($this->table, $data);
    }

    public function delete_pengembangan($id)
    {
        return $this->db->delete('pengembangan_diri', array('id_pengembangan' => $id));
    }
}
 
 /* End of file Pengembangan_model.php */
