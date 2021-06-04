<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Chat_model', 'm_chat');
    }

    public function index()
    {
        $nis = $this->session->userdata('nis');

        $data['title'] = 'Konsultasi Siswa';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['guru_bk'] = $this->m_chat->getReciverGuru();
        if ($this->m_chat->isChated($nis)) {
            redirect('Konsultasi/pesan');
        } else {
            $data['chat_page'] = $this->load->view('chats/chat_page.php', $data, true);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/konsultasi', $data);
        $this->load->view('templates/footer');
    }
    public function pesan($nip = null)
    {
        $nis = $this->session->userdata('nis');


        $data['title'] = 'Konsultasi Siswa';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();
        $data['message'] = $this->m_chat->getSiswaMessage();

        if ($this->m_chat->isChated($nis) && $nip == null) {
            $data['bkdata'] = $this->m_chat->getReciverGuru(['nip' => $data['message'][0]['nip_guru']]);
            $data['chat_page'] = null;
        } else if ($this->m_chat->isChated($nis) == false && $nip == null) {
            return $this->index();
        } else {
            $data['bkdata'] = $this->m_chat->getReciverGuru(['nip' => $nip]);
            $data['chat_page'] = $this->load->view('chats/chat_conversation', $data, TRUE);;
        }

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

        $data = ['nip_guru' => $nip, 'nis_siswa' => $nis, "isSender" => $isSender, "message" => $message];
        print_r($this->m_chat->sendMessage($data));
    }
    public function getMessage($nip = null)
    {
        $checkMessage = count($this->m_chat->getSiswaMessage());
        if ($checkMessage != 0) {
            $data['message'] = $this->m_chat->getSiswaMessage();
            $data['bkdata'] = $this->m_chat->getReciverGuru(['nip' => $data['message'][0]['nip_guru']]);
        } else {
            $data['message'] = $this->m_chat->getSiswaMessage();
            $data['bkdata'] = $this->m_chat->getReciverGuru(['nip' => $nip]);
        }
        print_r(
            $this->load->view('chats/chat_conversation', $data, true)
        );
    }
    public function getMessageBK($nis)
    {
        $data['message'] = $this->m_chat->getBKMessage($nis);;
        $data['siswaData'] = $this->m_chat->getReciverSiswa($data['message'][0]['nis_siswa']);

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
