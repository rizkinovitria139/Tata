<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    private $table = 'siswa';


    public function getAll()
    {
        $query = "SELECT `siswa`.*, `kelas`.*, `tahun_akademik`.*
        FROM `siswa`
        JOIN `kelas` ON `siswa`.`id_kelas` = `kelas`.`id_kelas`
        JOIN `tahun_akademik` ON `kelas`.`id_tahun_akademik` = `tahun_akademik`.`id_tahun_akademik`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["username" => $id])->row();
    }


    public function siswa_tambah($data)
    {

        return $this->db->insert($this->_table, $data);
    }

    public function delete_siswa($id)
    {
        $this->db->where('nis', $id);
        $this->db->delete('siswa');
    }
}

/* End of file Siswa_model.php */