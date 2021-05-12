<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataPresensi extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Data Presensi Siswa';
        $data['admin'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        if ((isset($_GET['bulan']) && $_GET['bulan'] !='') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                $bulan =$_GET['bulan'];
                $tahun =$_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else {
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
            }
    
            $data['datapresensi'] = $this->db->query("SELECT `siswa`.*, `presensi`.*, `guru`.*, `kelas`.*
            FROM `siswa` JOIN `presensi`
             ON `siswa`.`nis` = `presensi`.`nis` 
             JOIN `guru`
             ON `presensi`.`nip` = `guru`.`nip`
             JOIN `kelas`
             ON `presensi`.`id_kelas` = `kelas`.`id_kelas`
             WHERE `presensi`.`bulan` = $bulantahun
            ORDER BY `siswa`.`nama` ASC")->result();
            // var_dump($data1);
            // die();

        // $this->session->set_userdata($data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dataPresensi', $data);
        $this->load->view('templates/footer');
    }
    
}