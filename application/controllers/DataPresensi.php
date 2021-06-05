<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataPresensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Presensi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Presensi Siswa';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $this->load->model('Presensi_model', 'datapresensi');
        $data['datapresensi'] = $this->datapresensi->get_presensi($bulantahun);


        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dataPresensi', $data);
        $this->load->view('templates/footer');
        $this->load->view('guruMapel/presensijs', $data);
    }

    public function get_presensi()
    {
        $data['title'] = 'Daftar Kelas';
        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->session->set_userdata($data);


        $this->load->model('kelas_model', 'kelas');
        $data['kelas'] = $this->kelas->get_kelas();
        $this->load->model('Admin_model', 'guru');
        $data['guru'] = $this->guru->getAll();
        $this->load->model('Tahun_model', 'tahun_akademik');
        $data['tahun_akademik'] = $this->tahun_akademik->getAll();

        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('guruMapel/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function edit_presensi($id)
    {
        $this->db->update('presensi', ['bulan' => $this->input->post('bulan')], ['id_presensi' => $id]);
        $this->db->update('presensi', ['hadir' => $this->input->post('hadir')], ['id_presensi' => $id]);
        $this->db->update('presensi', ['sakit' => $this->input->post('sakit')], ['id_presensi' => $id]);
        $this->db->update('presensi', ['alpha' => $this->input->post('alpha')], ['id_presensi' => $id]);

        $this->session->set_flashdata('kelas_message', '<div class="alert alert-success" role="alert">Kelas berhasil diubah!</div>');
        redirect('DataPresensi/get_presensi', 'refresh');
    }

    public function view_presensi_siswa()
    {
        $data['title'] = 'Data Presensi ';
        $data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
            // var_dump($data);
            // die();
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
            // var_dump($data);
        }

        // $data['datapresensi'] = $this->db->query("SELECT `siswa`.*, `presensi`.*, `kelas`.*
        //     FROM `siswa` JOIN `presensi`
        //      ON `siswa`.`nis` = `presensi`.`nis` 
        //      JOIN `kelas`
        //      ON `presensi`.`id_kelas` = `kelas`.`id_kelas`
        //      WHERE `presensi`.`bulan` = $bulantahun
        //      AND `siswa`.`nis` = '$id'
        //     ORDER BY `siswa`.`nama` ASC")->result();

        $this->load->model('Presensi_model', 'datapresensi');
        $user_id  =   $this->session->userdata('nis');
        $data['datapresensi'] = $this->datapresensi->viewPresensiSiswa($user_id);


        $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/siswa_sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/viewPresensi', $data);
        $this->load->view('templates/footer');
    }
    public function getPresensiSiswa($id)
    {
        $data['siswaPresensi'] = $this->Presensi_model->getPresensiSiswa($id);

        print_r($this->load->view('admin/modal/presensimodal', $data, TRUE));
    }
    public function doEditPresensi($idpresensi)
    {
        $update = array(
            "hadir" => $this->input->post('hadir'),
            "alpha" => $this->input->post('alpha'),
            "izin" => $this->input->post('izin'),
            "sakit" => $this->input->post('sakit'),
        );
        $this->Presensi_model->doUpdatePresensi($idpresensi, $update);
        $this->session->set_flashdata(
            'alert',
            'Berhasil melakukan update presensi siswa dengan nama ' . $this->input->post('namasiswa') . " kelas " . $this->input->post('kelassiswa') . " bulan " . $this->input->post('bulan')
        );

        redirect("DataPresensi");
    }
}