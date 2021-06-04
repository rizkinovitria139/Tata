<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Presensi_model extends CI_Model
{
    private $table = 'guru';

    public function update($data)
    {
        return $this->db->update($this->table, $data);
    }

    public function get_presensi($bulantahun, $nis = null)
    {
        // $query = "SELECT `siswa`.*, `presensi`.*, `kelas`.*
        // FROM `siswa` JOIN `presensi`
        // ON `siswa`.`nis` = `presensi`.`nis` 
        // JOIN `kelas`
        // ON `presensi`.`id_kelas` = `kelas`.`id_kelas`
        // WHERE `presensi`.`bulan` = $bulantahun
        // ORDER BY `siswa`.`nama` ASC";

        $this->db->select('siswa.*, presensi.*, kelas.*');
        $this->db->from('siswa');
        $this->db->join('presensi', 'presensi.nis = siswa.nis');
        $this->db->join('kelas', 'kelas.id_kelas = presensi.id_kelas');
        $this->db->order_by('siswa.id_kelas', 'asc');
        $this->db->where('presensi.bulan', $bulantahun);
        return $this->db->get()->result_array();
    }
    public function getPresensiSiswa($id)
    {
        $this->db->select('presensi.*, siswa.nama, kelas.nama_kelas');
        $this->db->from('presensi');
        $this->db->join('siswa', 'siswa.nis = presensi.nis');
        $this->db->join('kelas', 'kelas.id_kelas = presensi.id_kelas');
        $this->db->where('presensi.nis', $id);
        return $this->db->get()->row();
    }
    public function get_jadwal($nip)
    {
        $this->db->select('jadwal.id, kelas.nama_kelas, jadwal.hari, jadwal.waktu_mulai');
        $this->db->from('pengajar');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = pengajar.id_mapel');
        $this->db->join('kelas', 'kelas.id_kelas = mata_pelajaran.id_kelas');
        $this->db->join('jadwal', 'jadwal.id_mapel = mata_pelajaran.id_mapel');
        $this->db->where('id_guru', $nip);
        return $this->db->get()->result_array();
    }
    public function get_siswakelas($idjadwal)
    {
        $this->db->select('siswa.nis, siswa.nama, kelas.nama_kelas, mata_pelajaran.nama_mapel, kelas.id_kelas');
        $this->db->from('siswa');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_kelas = siswa.id_kelas');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $this->db->join('jadwal', 'jadwal.id_mapel = mata_pelajaran.id_mapel');
        $this->db->where('jadwal.id', $idjadwal);
        return $this->db->get()->result_array();
    }
    public function doPresensi($data)
    {
        $absensi = $this->checkNisAbsen($data['nis']);
        if ($absensi['status']) {
            $this->updateAbsensi($absensi['data'], $data['kehadiran']);
        } else {
            $this->addAbsensi($data);
        }
    }
    private function addAbsensi($data)
    {
        if (strtolower($data['kehadiran']) === 'hadir') {
            $data = [
                "nis" => $data['nis'],
                "id_kelas" => $data['id_kelas'],
                "bulan" => date('m') . date('Y'),
                "hadir" => 1,
            ];
        } else if (strtolower($data['kehadiran']) === 'sakit') {
            $data = [
                "nis" => $data['nis'],
                "id_kelas" => $data['id_kelas'],
                "bulan" => date('m') . date('Y'),
                "sakit" => 1,

            ];
        } else if (strtolower($data['kehadiran']) === 'izin') {
            $data = [
                "nis" => $data['nis'],
                "id_kelas" => $data['id_kelas'],
                "bulan" => date('m') . date('Y'),
                "izin" => 1,
            ];
        } else if (strtolower($data['kehadiran']) === 'alpha') {
            $data = [
                "nis" => $data['nis'],
                "id_kelas" => $data['id_kelas'],
                "bulan" => date('m') . date('Y'),
                "alpha" => 1,
            ];
        }

        $this->db->insert('presensi', $data);
    }
    private function updateAbsensi($data, $kehadiran)
    {

        if (strtolower($kehadiran) === 'hadir') {
            $update = [
                "hadir" => $data->hadir + 1,
            ];
        } else if (strtolower($kehadiran) === 'sakit') {
            $update = [
                "sakit" => $data->sakit + 1,
            ];
        } else if (strtolower($kehadiran) === 'izin') {
            $update = [
                "izin" => $data->izin + 1,
            ];
        } else if (strtolower($kehadiran) === 'alpha') {
            $update = [
                "alpha" => $data->alpha + 1,
            ];
        }
        $filter = ['nis' => $data->nis, "bulan" => date('m') . date('Y')];
        $this->db->update('presensi', $update, $filter);
    }
    private function checkNisAbsen($nis)
    {
        $this->db->from('presensi');
        $this->db->where(['nis' => $nis, 'bulan' => date('m') . date('Y')]);
        $datas = $this->db->get()->row();
        if ($datas) {
            return array('status' => true, 'data' => $datas);
        } else {
            return array('status' => false, 'data' => null);;
        }
    }
    public function doUpdatePresensi($idpresensi, $update)
    {
        $this->db->update('presensi', $update, ['id_presensi' => $idpresensi]);
    }
}
