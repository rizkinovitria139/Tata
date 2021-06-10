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

    public function getSiswaKelas($user_id)
    {
        $this->db->select('siswa.nama, siswa.nis, kelas.nama_kelas, kelas.id_kelas, kelas.nip_wali_kelas, guru.nip');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $this->db->join('guru', 'guru.nip = kelas.nip_wali_kelas');
        $this->db->where('kelas.nip_wali_kelas', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function checkSemesterAvailable($id_semester)
    {
        $this->db->from('nilai_pengembangan');
        $this->db->where('id_semester', $id_semester);
        $data = $this->db->get()->num_rows();
        return $data;
    }
}
 
 /* End of file Pengembangan_model.php */
