<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    private $table = 'guru';
    private $pengajar = 'pengajar';

    public function getAll()
    {
        $query = "SELECT `guru`.*, `user_role`.*
        FROM `guru`
        JOIN `user_role` ON `user_role`.`id_role` = `guru`.`role_id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function get_guru_mapel()
    {
        $query = "SELECT `guru`.*, `user_role`.*
        FROM `guru`
        JOIN `user_role` ON `user_role`.`id_role` = `guru`.`role_id`
        WHERE `guru`.`role_id` = 5
        ";
        return $this->db->query($query)->result_array();
    }

    public function get_guru_bk()
    {
        $query = "SELECT `guru`.*, `user_role`.*
        FROM `guru`
        JOIN `user_role` ON `user_role`.`id_role` = `guru`.`role_id`
        WHERE `guru`.`role_id` = 7
        ";
        return $this->db->query($query)->result_array();
    }

    public function get_admin()
    {
        $query = "SELECT `guru`.*, `user_role`.*
        FROM `guru`
        JOIN `user_role` ON `user_role`.`id_role` = `guru`.`role_id`
        WHERE `guru`.`role_id` = 4
        ";
        return $this->db->query($query)->result_array();
    }

    public function tambah_guru($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function tambah_pengajar($data)
    {
        return $this->db->insert($this->pengajar, $data);
    }

    public function update($data)
    {
        return $this->db->update($this->table, $data);
    }

    public function delete_guru($id)
    {
        return $this->db->delete('guru', array('nip' => $id));
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["username" => $id])->row();
    }

    public function savepass()
    {
        $pass = $this->input->post('new_password1');
        $data = array(
            'password' => $pass
        );
        $this->db->where('nip', $this->session->userdata('nip'));
        $this->db->update('guru', $data);
    }
    // fungsi untuk mengecek password lama :
    public function cek_old()
    {
        $old = $this->input->post('current_password');
        $this->db->where('password', $old);
        $query = $this->db->get('guru');
        return $query->result();
    }
}

/* End of file Guru_model.php */