<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{

    public function insert_batch($table = null, $data = array())
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->insert_batch($table, $data);
        }
    }

    public function get_pengajar()
    {
        $query = "SELECT `pengajar`.*, `guru`.*, `mata_pelajaran`.*, `kelas`.*
        FROM `pengajar`
        JOIN `guru` ON `guru`.`nip` = `pengajar`.`id_guru`
        JOIN `mata_pelajaran` ON `mata_pelajaran`.`id_mapel` = `pengajar`.`id_mapel`
        JOIN kelas ON `kelas`.`id_kelas` = `mata_pelajaran`.`id_kelas`";

        return $this->db->query($query)->result_array();
    }

    public function delete_pengajar($id)
    {
        return $this->db->delete('pengajar', array('id' => $id));
    }
}
