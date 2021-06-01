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

    public function get_mapel_by($id_kelas)
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('mata_pelajaran', 'kelas.id_kelas = mata_pelajaran.id_kelas');
        $this->db->where('mata_pelajaran.id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_mapel_guru($id)
    {
        $this->db->select('*');
        $this->db->from('pengajar');
        $this->db->join('guru', 'guru.nip = pengajar.id_guru');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = pengajar.id_mapel');
        $this->db->join('kelas', ' kelas.id_kelas = mata_pelajaran.id_kelas');
        $this->db->where('pengajar.id_guru', $id);
        $query = $this->db->get();
        // print_r($query);

        return $query->result();
        // return $this->db->query($query)->result_array();
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
