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

    public function getSiswaMessage()
    {
        $nis = $this->session->userdata('nis');
        $this->db->select('chats_detail.*, siswa.nama as namasiswa, guru.nama as namaguru');
        $this->db->where('nis_siswa', $nis);
        $this->db->join('siswa', 'siswa.nis = chats_detail.nis_siswa');
        $this->db->join('guru', 'guru.nip = chats_detail.nip_guru');

        $this->db->from('chats_detail');

        return $this->db->get()->result_array();
    }

    public function getBKMessage($nis)
    {
        $nip = $this->session->userdata('nip');
        $this->db->select('chats_detail.*, siswa.nama as namasiswa, guru.nama as namaguru');
        $this->db->where(array('nis_siswa' => $nis, 'nip_guru' => $nip));
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
}

/* End of file Chat_model.php */
