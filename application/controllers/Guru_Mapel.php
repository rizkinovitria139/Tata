<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Guru_Mapel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mapel_model', 'mapel');
        $this->load->model('Nilai_model', 'm_nilai');
        $this->load->model('User_model', 'm_user');
        $this->m_user->checkAccount();
    }


    public function index()
    {
        $data['title'] = 'Halaman Guru Mata Pelajaran';

        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('guruMapel/mp_sidebar', $data);
        $this->load->view('guruMapel/mp_topbar', $data);
        $this->load->view('guruMapel/index', $data);
        $this->load->view('templates/footer');
    }

    public function nilai()
    {
        $data['title'] = "Nilai Siswa";
        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $id = $this->session->userdata('nip');

        $data['mapel'] = $this->mapel->get_mapel_guru($id);
        // print_r($id);

        $this->load->view('templates/header', $data);
        $this->load->view('guruMapel/mp_sidebar', $data);
        $this->load->view('guruMapel/mp_topbar', $data);
        $this->load->view('guruMapel/nilai', $data);
        $this->load->view('templates/footer');
        $this->load->view('guruMapel/nilaijs', $data);
    }

    public function nilai_rev()
    {
        $data['title'] = "Nilai Siswa";
        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $id = $this->session->userdata('nip');

        $data['mapel'] = $this->mapel->get_mapel_guru($id);
        // print_r($id);

        $this->load->view('templates/header', $data);
        $this->load->view('guruMapel/mp_sidebar', $data);
        $this->load->view('guruMapel/mp_topbar', $data);
        $this->load->view('guruMapel/nilai_rev', $data);
        $this->load->view('templates/footer');
        $this->load->view('guruMapel/nilaijs', $data);
    }

    public function tambah_nilai_rev($id_mapel)
    {
        $data['title'] = "Nilai Siswa";
        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswaKelas'] = $this->m_nilai->getSiswaJadwal($id_mapel);
        $data['semesterData'] = $this->db->get('semester')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('guruMapel/mp_sidebar', $data);
        $this->load->view('guruMapel/mp_topbar', $data);
        $this->load->view('guruMapel/inputNilai_rev', $data);
        $this->load->view('templates/footer');
        $this->load->view('guruMapel/nilaijs_rev', $data);
    }

    public function tambah_nilai($id_mapel)
    {
        $data['title'] = "Nilai Siswa";
        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswaKelas'] = $this->m_nilai->getSiswaJadwal($id_mapel);
        $data['semesterData'] = $this->db->get('semester')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('guruMapel/mp_sidebar', $data);
        $this->load->view('guruMapel/mp_topbar', $data);
        $this->load->view('guruMapel/inputNilai', $data);
        $this->load->view('templates/footer');
        $this->load->view('guruMapel/nilaijs', $data);
    }
    public function edit_nilai($id_mapel)
    {
        $data['title'] = "Nilai Siswa";
        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswaKelas'] = $this->m_nilai->getSiswaJadwal($id_mapel);
        $data['semesterData'] = $this->db->get('semester')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('guruMapel/mp_sidebar', $data);
        $this->load->view('guruMapel/mp_topbar', $data);
        $this->load->view('guruMapel/editNilai', $data);
        $this->load->view('templates/footer');
        $this->load->view('guruMapel/nilaijs_rev', $data);
    }

    public function submit_nilai()
    {
        // $nilaiData = $this->input->post('datanilai');
        // $semesterNilai = $this->input->post('semesternilai');
        $nilaiData = $_POST['datanilai'];
        $semesterNilai = $_POST['semesternilai'];
        foreach ($nilaiData as $key => $value) {
            $dataInput = [
                'nis' => $value['nis'],
                'id_mapel' => $value['id_mapel'],
                'nilai_tugas' => $value['nilai_tugas'],
                'nilai_uts' => $value['nilai_uts'],
                'nilai_uas' => $value['nilai_uas'],
                'deskripsi' => $value['keterangan'],
                'id_semester' => $semesterNilai
            ];
            $this->db->insert('nilai_siswa', $dataInput);
        }
        return true;
    }

    public function submit_nilai_rev()
    {
        // $nilaiData = $this->input->post('datanilai');
        // $semesterNilai = $this->input->post('semesternilai');
        $nilaiData = $_POST['datanilai'];
        // $semesterNilai = $_POST['semesternilai'];
        foreach ($nilaiData as $key => $value) {
            $dataInput = [
                'nis' => $value['nis'],
                'id_mapel' => $value['id_mapel'],
                'tugas1' => $value['tugas_1'],
                'tugas2' => $value['tugas_2'],
                'tugas3' => $value['tugas_3'],
                'tugas4' => $value['tugas_4'],
                'uts' => $value['uts'],
                'uas' => $value['uas'],
                'deskripsi' => $value['keterangan']
            ];
            $this->db->insert('nilai_siswa_r', $dataInput);
        }
        return true;
    }

    public function submit_edit_nilai()
    {
        $nilaiData = $_POST['datanilai'];
        foreach ($nilaiData as $key => $value) {
            $dataInput = [
                'nis' => $value['nis'],
                'id_mapel' => $value['id_mapel'],
                'tugas1' => $value['tugas_1'],
                'tugas2' => $value['tugas_2'],
                'tugas3' => $value['tugas_3'],
                'tugas4' => $value['tugas_4'],
                'uts' => $value['uts'],
                'uas' => $value['uas'],
                'deskripsi' => $value['keterangan']
            ];
            $this->db->update('nilai_siswa_r', $dataInput, ['id_nilai' => $value['id_nilai']]);
        }
        return true;
    }
    public function checkSemesterNilai()
    {
        $semesterNilai = $this->input->post('semesternilai');
        $dataNilai = $this->input->post('datanilai');
        $idMapel = $dataNilai[0]["id_mapel"];
        $status = $this->m_nilai->checkSemesterAndClassAvailable($semesterNilai, $idMapel);
        if ($status) {
            echo true;
        } else {
            echo false;
        }
    }

    public function checkSemesterNilai_rev()
    {
        $semesterNilai = $this->input->post('semesternilai');
        $dataNilai = $this->input->post('datanilai');
        $idMapel = $dataNilai[0]["id_mapel"];
        $status = $this->m_nilai->checkSemesterAndClassAvailable($semesterNilai, $idMapel);
        if ($status) {
            echo true;
        } else {
            echo false;
        }
    }
    public function checkNilaiKelas()
    {
        $mapelid = $this->input->post('mapelid');
        $check = $this->m_nilai->checkMapelNilai($mapelid);
        if ($check == 0) {
            echo 1; // jika kosong berarti true
        } else {
            echo 0; // jika ada berarti false
        }
    }
}
