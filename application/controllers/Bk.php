<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Bk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chat_model', 'm_chat');
    }


    public function index()
    {
        $data['title'] = 'Bimbingan Konseling';

        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/bk_sidebar', $data);
        $this->load->view('templates/bk_topbar', $data);
        $this->load->view('Bim_Kon/index', $data);
        $this->load->view('templates/footer');
    }

    public function konsultasi()
    {
        $data['title'] = 'Bimbingan Konseling';

        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['forum'] = $this->m_chat->getAllForum();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/bk_sidebar', $data);
        $this->load->view('templates/bk_topbar', $data);
        $this->load->view('Bim_Kon/konsultasi', $data);
        $this->load->view('templates/footer');
    }
    public function pesan($id_forum)
    {
        $data['title'] = 'Bimbingan Konseling';
        $data['forum'] = $this->m_chat->getForumById($id_forum);

        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['message'] = $this->m_chat->getBKMessage($data['forum']->id_forum);

        $data['siswaData'] = $this->m_chat->getReciverSiswa($data['forum']->nis_siswa);
        if (count($data['message']) === 0) {
            redirect('Bk/konsultasi');
        }
        $data['chat_page'] = $this->load->view('Bim_Kon/chat_conversation', $data, TRUE);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/bk_sidebar', $data);
        $this->load->view('templates/bk_topbar', $data);
        $this->load->view('Bim_Kon/pesan', $data);
        $this->load->view('templates/footer');
        $this->load->view('Bim_Kon/bkjs', $data);
        $this->load->view('chats/chatjs', $data);
    }
    public function changeStatus($id_forum)
    {
        $dataForum = $this->m_chat->getForumById($id_forum);
        $filter = [
            'id_forum' => $id_forum
        ];
        $update = [
            'status' => $dataForum->status ? false : true
        ];
        $tableName = 'forum_chat';
        $this->m_chat->update($tableName, $filter, $update);
        echo true;
    }
    public function hapusForum($id_forum)
    {
        $this->m_chat->deleteForumAndChats($id_forum);
        $this->session->set_flashdata('alert', 'Berhasil menghapus forum');
        redirect('bk/konsultasi');
    }
}

/* End of file BK_kelas.php */