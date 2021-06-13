<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wali_kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here

        $this->load->model('Nilai_model', 'm_nilai');
        $this->load->model('User_model', 'm_user');
        $this->m_user->checkAccount();
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


    public function cetak_rapor()
    {
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

    public function cetak_rapor_1($nis)
    {
        $data['title'] = 'Cetak Nilai Siswa';
        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['semester'] = '1';
        // $siswa_id  =   $this->session->userdata('nis');
        $guru_id = $this->session->userdata('nip');

        $this->load->model('Nilai_model');
        $data['data_nilai'] = $this->Nilai_model->get_semester_1($nis);
        $data['data_pengembangan'] = $this->Nilai_model->nilai_pengembangan_1($nis);
        $data['data_kepribadian'] = $this->Nilai_model->nilai_kepribadian_1($nis);
        $data['guru'] = $this->Nilai_model->get_wali($guru_id);
        $data['presensi'] = $this->Nilai_model->get_presensi($nis);

        $this->load->view('wali_kelas/cetak_nilai', $data);
    }

    public function cetak_rapor_2($nis)
    {
        $data['title'] = 'Cetak Nilai Siswa';
        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['semester'] = '2';
        // $siswa_id  =   $this->session->userdata('nis');
        $guru_id = $this->session->userdata('nip');

        $this->load->model('Nilai_model');

        $data['data_nilai'] = $this->Nilai_model->get_semester_2($nis);
        $data['data_pengembangan'] = $this->Nilai_model->nilai_pengembangan_2($nis);
        $data['data_kepribadian'] = $this->Nilai_model->nilai_kepribadian_2($nis);
        $data['guru'] = $this->Nilai_model->get_wali($guru_id);
        $data['presensi'] = $this->Nilai_model->get_presensi($nis);

        $this->load->view('wali_kelas/cetak_nilai', $data);
    }


    public function cetak_rapor_3($nis)
    {
        $data['title'] = 'Cetak Nilai Siswa';
        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['semester'] = '1';
        // $siswa_id  =   $this->session->userdata('nis');
        $guru_id = $this->session->userdata('nip');

        $this->load->model('Nilai_model');

        $data['data_nilai'] = $this->Nilai_model->get_semester_3($nis);
        $data['data_pengembangan'] = $this->Nilai_model->nilai_pengembangan_3($nis);
        $data['data_kepribadian'] = $this->Nilai_model->nilai_kepribadian_3($nis);
        $data['guru'] = $this->Nilai_model->get_wali($guru_id);
        $data['presensi'] = $this->Nilai_model->get_presensi($nis);

        $this->load->view('wali_kelas/cetak_nilai', $data);
    }


    public function cetak_rapor_4($nis)
    {
        $data['title'] = 'Cetak Nilai Siswa';
        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['semester'] = '2';
        // $siswa_id  =   $this->session->userdata('nis');
        $guru_id = $this->session->userdata('nip');

        $this->load->model('Nilai_model');

        $data['data_nilai'] = $this->Nilai_model->get_semester_4($nis);
        $data['data_pengembangan'] = $this->Nilai_model->nilai_pengembangan_4($nis);
        $data['data_kepribadian'] = $this->Nilai_model->nilai_kepribadian_4($nis);
        $data['guru'] = $this->Nilai_model->get_wali($guru_id);
        $data['presensi'] = $this->Nilai_model->get_presensi($nis);

        $this->load->view('wali_kelas/cetak_nilai', $data);
    }


    public function cetak_rapor_5($nis)
    {
        $data['title'] = 'Cetak Nilai Siswa';
        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['semester'] = '1';
        // $siswa_id  =   $this->session->userdata('nis');
        $guru_id = $this->session->userdata('nip');

        $this->load->model('Nilai_model');

        $data['data_nilai'] = $this->Nilai_model->get_semester_5($nis);
        $data['data_pengembangan'] = $this->Nilai_model->nilai_pengembangan_5($nis);
        $data['data_kepribadian'] = $this->Nilai_model->nilai_kepribadian_5($nis);
        $data['guru'] = $this->Nilai_model->get_wali($guru_id);
        $data['presensi'] = $this->Nilai_model->get_presensi($nis);

        $this->load->view('wali_kelas/cetak_nilai', $data);
    }


    public function cetak_rapor_6($nis)
    {
        $data['title'] = 'Cetak Nilai Siswa';
        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
        $data['semester'] = '2';
        // $siswa_id  =   $this->session->userdata('nis');
        $guru_id = $this->session->userdata('nip');

        $this->load->model('Nilai_model');
        $data['data_nilai'] = $this->Nilai_model->get_semester_6($nis);
        $data['data_pengembangan'] = $this->Nilai_model->nilai_pengembangan_6($nis);
        $data['data_kepribadian'] = $this->Nilai_model->nilai_kepribadian_6($nis);
        $data['guru'] = $this->Nilai_model->get_wali($guru_id);
        $data['presensi'] = $this->Nilai_model->get_presensi($nis);

        $this->load->view('wali_kelas/cetak_nilai', $data);
    }

    public function tambah_nilai()
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
        $this->load->view('wali_kelas/pengembangan_inputNilai', $data);
        $this->load->view('templates/footer');
        $this->load->view('wali_kelas/pengembangan_nilaijs', $data);
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
                'keterangan' => $value['keterangan'],
                'id_semester' => $semesterNilai
            ];
            $this->db->insert('nilai_pengembangan', $dataInput);
        }
        return true;
    }
    public function checkSemesterNilai()
    {
        $semesterNilai = $this->input->post('semesternilai');
        $status = $this->m_nilai->checkSemesterAvailable_p($semesterNilai);
        if ($status) {
            echo true;
        } else {
            echo false;
        }
    }

    public function tambah_nilai_k()
    {
        $data['title'] = "Nilai Siswa";
        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $user_id  =   $this->session->userdata('nip');

        $this->load->model('Pengembangan_model', 'p_nilai');
        $data['siswaKelas'] = $this->p_nilai->getSiswaKelas($user_id);
        $data['semesterData'] = $this->db->get('semester')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/walikelas_sidebar', $data);
        $this->load->view('templates/walikelas_topbar', $data);
        $this->load->view('wali_kelas/kepribadian_inputNilai', $data);
        $this->load->view('templates/footer');
        $this->load->view('wali_kelas/kepribadian_nilaijs', $data);
    }
    public function submit_nilai_k()
    {
        $nilaiData = $this->input->post('datanilai');
        $semesterNilai = $this->input->post('semesternilai');
        foreach ($nilaiData as $key => $value) {
            $dataInput = [
                'nis' => $value['nis'],
                'kelakuan' => $value['kelakuan'],
                'kerajinan' => $value['kerajinan'],
                'kerapian' => $value['kerapi'],
                'kebersihan' => $value['kebersihan'],
                'id_semester' => $semesterNilai
            ];
            $this->db->insert('nilai_kepribadian', $dataInput);
        }
        return true;
    }

    public function checkSemesterNilai_k()
    {
        $semesterNilai = $this->input->post('semesternilai');
        $status = $this->m_nilai->checkSemesterAvailable_k($semesterNilai);
        if ($status) {
            echo true;
        } else {
            echo false;
        }
    }

    public function get_nilaiP()
    {
        $data['title'] = 'Nilai Pengembangan Siswa';
        $data['wali_kelas'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $user_id  =   $this->session->userdata('nip');

        $this->load->model('Pengembangan_model', 'pengembangan');
        $data['nilai_p'] = $this->pengembangan->get_nilai_pengembangan($user_id);
        $data['pengembangan'] = $this->pengembangan->get_pengembangan($user_id);
        $data['siswa'] = $this->pengembangan->getSiswaKelas($user_id);
        $this->load->model('Kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();
        $data['semesterData'] = $this->db->get('semester')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/walikelas_sidebar', $data);
        $this->load->view('templates/walikelas_topbar', $data);
        $this->load->view('wali_kelas/nilai_pengembangan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_nilai_pengembangan()
    {
        $this->form_validation->set_rules('nis', 'Nis', 'required');
        $this->form_validation->set_rules('id_pengembangan', 'ID Pengembangan', 'required');
        $this->form_validation->set_rules('nilai_pengembangan', 'Nilai Pengembangan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('id_semester', 'ID Semester', 'required');

        if ($this->form_validation->run() == true) {
            // $data['id_kelas'] = $this->input->post('id_kelas');
            $data['nis'] = $this->input->post('nis');
            $data['id_pengembangan'] = $this->input->post('id_pengembangan');
            $data['nilai_pengembangan'] = $this->input->post('nilai_pengembangan');
            $data['keterangan'] = $this->input->post('keterangan');
            $data['id_semester'] = $this->input->post('id_semester');

            $user_id  =   $this->session->userdata('nip');

            $this->load->model('Pengembangan_model', 'pengembangan');
            $this->pengembangan->tambah_nilai_pengembangan($data);
            $data['siswa'] = $this->pengembangan->getSiswaKelas($user_id);
            $this->load->model('Kelas_model', 'kelas');
            $data['kelas'] = $this->kelas->get_kelas();
            $data['semesterData'] = $this->db->get('semester')->result_array();


            $this->session->set_flashdata('nilaipengembangan_message', '<div class="alert alert-success" role="alert">Nilai Pengembangan Berhasil ditambahkan!</div>');
            redirect('wali_kelas/get_nilaiP', 'refresh');
        } else {
            $this->session->set_flashdata('nilaipengembangan_message', '<div class="alert alert-danger" role="alert">Nilai Pengembangan gagal ditambahkan!</div>');
            redirect('wali_kelas/get_nilaiP', 'refresh');
        }
    }

    public function edit_nilaiP($id)
    {
        $this->db->update('nilai_pengembangan', ['nis' => $this->input->post('nis')], ['id_nilai_pengembangan' => $id]);
        $this->db->update('nilai_pengembangan', ['id_pengembangan' => $this->input->post('id_pengembangan')], ['id_nilai_pengembangan' => $id]);
        $this->db->update('nilai_pengembangan', ['nilai_pengembangan' => $this->input->post('nilai_pengembangan')], ['id_nilai_pengembangan' => $id]);
        $this->db->update('nilai_pengembangan', ['keterangan' => $this->input->post('keterangan')], ['id_nilai_pengembangan' => $id]);
        $this->db->update('nilai_pengembangan', ['id_semester' => $this->input->post('id_semester')], ['id_nilai_pengembangan' => $id]);

        $this->session->set_flashdata('nilaipengembangan_message', '<div class="alert alert-success" role="alert">Nilai Pengembangan Diri berhasil diubah!</div>');
        redirect('wali_kelas/get_nilaiP', 'refresh');
    }

    public function delete_nilaiP($id)
    {
        $this->load->model('Pengembangan_model', 'pengembangan');
        $this->pengembangan->delete_nilaiP($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('nilaipengembangan_message', '<div class="alert alert-danger" role="alert">Nilai Pengembangan Diri berhasil dihapus!</div>');
        redirect('wali_kelas/get_nilaiP', 'refresh');
    }
}

/* End of file Wali_kelas.php */