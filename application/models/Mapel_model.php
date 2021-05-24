<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel_model extends CI_Model
{
    private $table = "mata_pelajaran";

    public function get_mapel()
    {
        $query = "SELECT `mata_pelajaran`.*, `kelas`.*
        FROM `mata_pelajaran`  
         JOIN `kelas`
         ON `mata_pelajaran`.`id_kelas` = `kelas`.`id_kelas`";

        return $this->db->query($query)->result_array();
    }

    public function getMapel($id)
    {
        //mapel, kelas, guru, siswa
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('siswa', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->join('mata_pelajaran', 'kelas.id_kelas = mata_pelajaran.id_kelas');
        $this->db->join('guru', 'mata_pelajaran.nip_pengajar = guru.nip');
        $this->db->where('siswa.nis', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_mapel_guru()
    {
    }

    public function tambah_mapel($data)
    {

        return $this->db->insert($this->table, $data);
    }

    public function delete_mapel($id)
    {
        return $this->db->delete('mata_pelajaran', array('id_mapel' => $id));
    }
}
