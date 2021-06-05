<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_model extends CI_Model
{

    private $table = 'tahun_akademik';

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function tambah_tahun($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function edit_tahun($data)
    {
        return $this->db->update($this->table, $data);
    }

    public function delete_tahun($id)
    {
        return $this->db->delete('tahun_akademik', array('id_tahun_akademik' => $id));
    }
}

/* End of file Tahun_model.php */
