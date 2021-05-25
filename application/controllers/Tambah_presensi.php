<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_presensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
    }
    
    public function index()
    {
        $data['title'] = 'Data Presensi Siswa';
        $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        if ((isset($_GET['bulan']) && $_GET['bulan'] !='') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan =$_GET['bulan'];
            $tahun =$_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
    
        $data['datapresensi'] = $this->db->query("SELECT `siswa`.*, `presensi`.*, `kelas`.*
            FROM `siswa` JOIN `presensi`
             ON `siswa`.`nis` = `presensi`.`nis`
             JOIN `kelas`
             ON `presensi`.`id_kelas` = `kelas`.`id_kelas`
             WHERE `presensi`.`bulan` = $bulantahun
            ORDER BY `siswa`.`nama` ASC")->result();
        // var_dump($data1);
        // die();
        $this->load->view('templates/header', $data);
        $this->load->view('guruMapel/mp_sidebar', $data);
        $this->load->view('guruMapel/mp_topbar', $data);
        $this->load->view('guruMapel/tambahpresensi', $data);
        $this->load->view('templates/footer');
    }
    public function inputPresensi()
    {
        if ($this->input->post('submit', TRUE) == 'submit') {
            $post = $this->input->post();

            foreach ($post['bulan'] as $key => $value) {
                if ($post['bulan'][$key] != '' || $post['nis'][$key] != '') {
                    $simpan[] = array(
                        'bulan' => $post['bulan'][$key],
                        'nis' => $post['nis'][$key],
                        'nama_siswa' => $post['nama_siswa'][$key],
                        'id_kelas' => $post['nama_kelas'][$key],
                        'hadir' => $post['hadir'][$key],
                        'sakit' => $post['sakit'][$key],
                        'alpha' => $post['alpha'][$key],
                    );
                }
            }
            $this->Guru_model->insert_batch('presensi', $simpan);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            ('Tambah_Presensi');
        }
        // $data['title'] = 'Tambah Kehadiran Siswa';
        // $data['guru'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        if ((isset($_GET['bulan']) && $_GET['bulan'] !='') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan =$_GET['bulan'];
            $tahun =$_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }

        $data['input_presensi'] = $this->db->query("SELECT siswa.*, kelas.nama_kelas FROM siswa
        INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas
        WHERE NOT EXISTS (SELECT * FROM presensi WHERE bulan = '$bulantahun' AND siswa.nis = presensi.nis) 
        ORDER BY `siswa`.`nama` ASC")->result();
        // var_dump($data1);
        // die();
        
        $this->load->view('templates/header', $data);
        $this->load->view('guruMapel/mp_sidebar', $data);
        $this->load->view('guruMapel/mp_topbar', $data);
        $this->load->view('guruMapel/tambahpresensi', $data);
        $this->load->view('templates/footer');
        
    }

}