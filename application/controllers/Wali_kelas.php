<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wali_kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }


    public function index()
    {
        $data['title'] = 'Halaman Wali Kelas';
        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        // $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/walikelas_sidebar', $data);
        $this->load->view('templates/walikelas_topbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function input_nilai_pengembangan()
    {
        $data['title'] = "Nilai Siswa";
        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $user_id  =   $this->session->userdata('nip');

        $this->load->model('Pengembangan_model', 'p_nilai');
        $data['siswaKelas'] = $this->p_nilai->getSiswaKelas($user_id);
        $data['pengembangan'] = $this->p_nilai->get_pengembangan();
        $data['semesterData'] = $this->db->get('semester')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/walikelas_sidebar', $data);
        $this->load->view('templates/walikelas_topbar', $data);
        $this->load->view('wali_kelas/input_nilai_pengembangan', $data);
        $this->load->view('templates/footer');
        $this->load->view('wali_kelas/nilaijs', $data);
    }

    public function submit_nilai()
    {
        $nilaiData = $this->input->post('datanilai');
        $semesterNilai = $this->input->post('semesternilai');
        foreach ($nilaiData as $key => $value) {
            $dataInput = [
                'nis' => $value['nis'],
                'id_pengembangan' => $value['id_pengembangan'],
                'nilai_pengembangan' => $value['nilai_pengembangan'],
                'id_semester' => $semesterNilai
            ];
            $this->db->insert('nilai_pengembangan', $dataInput);
        }
        return true;
    }
    public function checkSemesterNilai()
    {
        $semesterNilai = $this->input->post('semesternilai');
        $status = $this->m_nilai->checkSemesterAvailable($semesterNilai);
        if ($status) {
            echo true;
        } else {
            echo false;
        }
    }

    public function cetak_rapor(){
        $data['title'] = "Nilai Siswa";
        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $user_id  =   $this->session->userdata('nip');

        $this->load->model('Pengembangan_model', 'p_nilai');
        $data['siswaKelas'] = $this->p_nilai->getSiswaKelas($user_id);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/walikelas_sidebar', $data);
        $this->load->view('templates/walikelas_topbar', $data);
        $this->load->view('wali_kelas/cetak_rapor', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Wali_kelas.php */