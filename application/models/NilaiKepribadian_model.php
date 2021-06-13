<?php

defined('BASEPATH') or exit('No direct script access allowed');

class NilaiKepribadian_model extends CI_Model
{
    public $table = 'nilai_kepribadian';

    public function get_nilai_kepribadian($user_id)
    {
        $this->db->select('siswa.nama, siswa.nis, kelas.nama_kelas, kelas.id_kelas, kelas.nip_wali_kelas, guru.nip, nilai_kepribadian.*, semester.*');
        $this->db->from('nilai_kepribadian');
        $this->db->join('siswa', 'siswa.nis = nilai_kepribadian.nis');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $this->db->join('semester', 'semester.id_semester = nilai_kepribadian.id_semester');
        $this->db->join('guru', 'guru.nip = kelas.nip_wali_kelas');
        $this->db->where('kelas.nip_wali_kelas', $user_id);
        $query = $this->db->get();
        return $query->result_array();
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

    public function tambah_nilai_kepribadian($data)
    {

        return $this->db->insert($this->table, $data);
    }

    public function delete_nilaiK($id)
    {
        return $this->db->delete('nilai_kepribadian', array('id_nilai_kepribadian' => $id));
    }
}

/* End of file NilaiKepribadian_model.php */
