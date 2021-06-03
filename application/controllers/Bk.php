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
        $data['chats_siswa'] = $this->m_chat->getChatsBK();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/bk_sidebar', $data);
        $this->load->view('templates/bk_topbar', $data);
        $this->load->view('Bim_Kon/konsultasi', $data);
        $this->load->view('templates/footer');
    }
    public function pesan($nis)
    {
        $data['title'] = 'Bimbingan Konseling';

        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['message'] = $this->m_chat->getBKMessage($nis);

        $data['siswaData'] = $this->m_chat->getReciverSiswa($nis);
        if (count($data['message']) === 0) {
            redirect('Bk/konsultasi');
        }
        $data['chat_page'] = $this->load->view('Bim_Kon/chat_conversation', $data, TRUE);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/bk_sidebar', $data);
        $this->load->view('templates/bk_topbar', $data);
        $this->load->view('Bim_Kon/pesan', $data);
        $this->load->view('templates/footer');
        $this->load->view('chats/chatjs', $data);
    }
}

/* End of file BK_kelas.php */