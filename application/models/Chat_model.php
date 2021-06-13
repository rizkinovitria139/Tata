<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Chat_model extends CI_Model
{
    public function isChated($nis)
    {

        $this->db->where('nis_siswa', $nis);
        $this->db->from('chats_detail');
        if ($this->db->get()->num_rows() >= 1) {
            return true;
        } else {
            return false;
        }
    }
    public function getReciverGuru($filter = null)
    {
        $this->db->select('nip, nama, email');
        $this->db->where('role_id', 7);
        if ($filter != null) {
            $this->db->where($filter);
        }
        $this->db->from('guru');
        return $this->db->get()->result_array();
    }
    public function getReciverSiswa($nis)
    {
        $this->db->select('nis, nama');
        $this->db->where('nis', $nis);
        $this->db->from('siswa');
        return $this->db->get()->row();
    }
    public function getForumData($nis, $id_forum = null)
    {
        $this->db->select('forum_chat.*');
        $this->db->join('siswa', 'siswa.nis = forum_chat.nis_siswa');
        $this->db->join('guru', 'guru.nip = forum_chat.nip_bk');
        $this->db->from('forum_chat');
        $this->db->where('nis', $nis);
        if ($id_forum != null) {
            $this->db->where('id_forum', $id_forum);
            return $this->db->get()->row();
        }
        return $this->db->get()->result_array();
    }

    public function getSiswaMessage($id_forum)
    {

        $this->db->select('chats_detail.*, siswa.nama as namasiswa, guru.nama as namaguru');
        $this->db->where('id_forum', $id_forum);
        $this->db->join('siswa', 'siswa.nis = chats_detail.nis_siswa');
        $this->db->join('guru', 'guru.nip = chats_detail.nip_guru');
        $this->db->from('chats_detail');

        return $this->db->get()->result_array();
    }

    public function getBKMessage($id_forum)
    {

        $this->db->select('chats_detail.*, siswa.nama as namasiswa, guru.nama as namaguru');
        $this->db->where('id_forum', $id_forum);
        $this->db->join('siswa', 'siswa.nis = chats_detail.nis_siswa');
        $this->db->join('guru', 'guru.nip = chats_detail.nip_guru');

        $this->db->from('chats_detail');

        return $this->db->get()->result_array();
    }
    public function sendMessage($data)
    {
        if ($this->db->insert('chats_detail', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function clearChat($filter)
    {
        $this->db->where($filter);
        return $this->db->delete('chats_detail');
    }

    public function getChatsBK()
    {
        $this->db->select('id_detail, nis_siswa,siswa.nama as namasiswa, nip_guru, guru.nama as namaguru');
        $this->db->where('nip_guru', $this->session->userdata('nip'));
        $this->db->join('siswa', 'siswa.nis = chats_detail.nis_siswa');
        $this->db->join('guru', 'guru.nip = chats_detail.nip_guru');
        $this->db->group_by('nis_siswa');
        $this->db->from('chats_detail');
        return $this->db->get()->result_array();
    }
    public function getAllForum()
    {
        $this->db->select('forum_chat.*, siswa.nama');
        $this->db->join('siswa', 'siswa.nis = forum_chat.nis_siswa');
        $this->db->join('guru', 'guru.nip = forum_chat.nip_bk');
        $this->db->from('forum_chat');
        return $this->db->get()->result_array();
    }
    public function getForumById($id)
    {
        $this->db->select('forum_chat.*, siswa.nama');
        $this->db->join('siswa', 'siswa.nis = forum_chat.nis_siswa');
        $this->db->join('guru', 'guru.nip = forum_chat.nip_bk');
        $this->db->where('id_forum', $id);
        $this->db->from('forum_chat');
        return $this->db->get()->row();
    }
    public function update($table, $filter, $update)
    {
        $this->db->where($filter);
        $this->db->update($table, $update);
        return true;
    }
    public function deleteForumAndChats($id_forum)
    {
        $this->db->where('id_forum', $id_forum);
        $this->db->delete('chats_detail');
        $this->db->where('id_forum', $id_forum);
        return $this->db->delete('forum_chat');
    }
}

/* End of file Chat_model.php */
