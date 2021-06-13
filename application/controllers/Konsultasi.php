<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Chat_model', 'm_chat');
        $this->load->model('User_model', 'm_user');
        $this->m_user->checkAccount();
    }

    public function index()
    {
        $nis = $this->session->userdata('nis');

        $data['title'] = 'Konsultasi Siswa';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['guru_bk'] = $this->m_chat->getReciverGuru();
        $data['forum'] = $this->m_chat->getForumData($this->session->userdata('nis'));
        $data['showDataForum'] = false;
        $data['chat_page'] = $this->load->view('chats/chat_page.php', $data, true);
        // if ($this->m_chat->isChated($nis)) {
        //     redirect('Konsultasi/pesan');
        // } else {
        // }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/konsultasi', $data);
        $this->load->view('templates/footer');
        $this->load->view('siswa/siswajs', $data);
    }
    public function showForumForm()
    {
        $data['bkdata'] = $this->m_chat->getReciverGuru();
        print_r($this->load->view('siswa/modal/startforum', $data, TRUE));
    }
    public function submitForum()
    {
        $data = [
            'nis_siswa' => $this->session->userdata('nis'),
            'nip_bk' => $this->input->post('nip'),
            'judul_forum' => $this->input->post('namaforum'),
            'keterangan' => $this->input->post('keteranganforum')
        ];
        $this->db->insert('forum_chat', $data);
        redirect('konsultasi');
    }
    public function pesan($id_forum)
    {
        $nis = $this->session->userdata('nis');
        $data['forum'] = $this->m_chat->getForumData($nis, $id_forum);


        $data['title'] = 'Konsultasi Siswa';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['message'] = $this->m_chat->getSiswaMessage($data['forum']->id_forum);
        $data['showDataForum'] = true;
        $data['bkdata'] = $this->m_chat->getReciverGuru(['nip' => $data['forum']->nip_bk]);
        $data['chat_page'] = $this->load->view('chats/chat_conversation', $data, TRUE);;

        // if ($this->m_chat->isChated($nis) && $nip == null) {
        //     $data['bkdata'] = $this->m_chat->getReciverGuru(['nip' => $data['message'][0]['nip_guru']]);
        //     $data['chat_page'] = null;
        // } else if ($this->m_chat->isChated($nis) == false && $nip == null) {
        //     return $this->index();
        // } else {
        //     $data['bkdata'] = $this->m_chat->getReciverGuru(['nip' => $nip]);
        //     $data['chat_page'] = $this->load->view('chats/chat_conversation', $data, TRUE);;
        // }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/konsultasi', $data);
        $this->load->view('templates/footer');
        $this->load->view('chats/chatjs', $data);
    }
    public function sendMessage()
    {
        $nip = $this->input->post('nip');
        $nis = $this->input->post('nis');
        $isSender = $this->input->post('sender');
        $message = $this->input->post('message');
        $id_forum = $this->input->post('idforum');

        $data = ['nip_guru' => $nip, 'nis_siswa' => $nis, "isSender" => $isSender, "id_forum" => $id_forum, "message" => $message];
        print_r($this->m_chat->sendMessage($data));
    }
    public function getMessage($idforum = null)
    {
        $forum = $this->m_chat->getForumById($idforum);

        $data['message'] = $this->m_chat->getSiswaMessage($idforum);
        $data['bkdata'] = $this->m_chat->getReciverGuru(['nip' => $forum->nip_bk]);
        $data['forum'] = $this->m_chat->getForumData($forum->nis_siswa, $forum->id_forum);

        print_r(
            $this->load->view('chats/chat_conversation', $data, true)
        );
    }
    public function getMessageBK($id_forum)
    {
        $forum = $this->m_chat->getForumById($id_forum);
        $data['message'] = $this->m_chat->getBKMessage($id_forum);
        $data['siswaData'] = $this->m_chat->getReciverSiswa($forum->nis_siswa);
        $data['forum'] = $this->m_chat->getForumData($forum->nis_siswa, $forum->id_forum);

        print_r(
            $this->load->view('Bim_Kon/chat_conversation', $data, true)
        );
    }
    public function clearChats()
    {
        $nis = $this->input->post('nis');
        $nip = $this->input->post('nip');
        $filter = ['nis_siswa' => $nis, 'nip_guru' => $nip];
        $this->m_chat->clearChat($filter);
        return true;
    }
}

/* End of file Konsultasi.php */
