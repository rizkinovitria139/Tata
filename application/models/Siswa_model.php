<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    private $table = 'siswa';


    public function getAll()
    {
        $query = "SELECT `siswa`.*, `kelas`.*, `user_role`.*
        FROM `siswa`
        JOIN `kelas` ON `kelas`.`id_kelas` = `siswa`.`id_kelas`
        JOIN `user_role` ON `user_role`.`id_role` = `siswa`.`role_id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["username" => $id])->row();
    }

    public function getSiswaDetails($id)
    {
        $id = $_GET['nis'];
    }


    public function siswa_tambah($data)
    {


        $this->db->insert('siswa', $data);
    }

    public function delete_user($id)
    {
        return $this->db->delete('siswa', array('nis' => $id));
    }

    public function save()
    {
        $pass = $this->input->post('new_password1');
        $data = array(
            'password' => $pass
        );
        $this->db->where('nis', $this->session->userdata('nis'));
        $this->db->update('siswa', $data);
    }
    // fungsi untuk mengecek password lama :
    public function cek_old()
    {
        $old = $this->input->post('current_password');
        $this->db->where('password', $old);
        $query = $this->db->get('siswa');
        return $query->result();
    }

    public function filter_siswa()
    {
        $kelas = 'id_kelas';


        $query = "SELECT `siswa`.*, `kelas`.*
        FROM `siswa` 
        JOIN `kelas`
        ON `siswa`.`id_kelas` = `kelas`.`id_kelas`
        WHERE `siswa`.`bulan` = $kelas
        ORDER BY `siswa`.`nama` ASC";

        return $this->db->query($query)->result_array();
    }
}

/* End of file Siswa_model.php */