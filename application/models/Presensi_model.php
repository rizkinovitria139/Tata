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
        $this->db->select_sum("presensi.hadir='hadir'", 'hadir');
        $this->db->select_sum("presensi.hadir='sakit'", 'sakit');
        $this->db->select_sum("presensi.hadir='alpha'", 'alpha');
        $this->db->select_sum("presensi.hadir='izin'", 'izin');
        $this->db->from('siswa');
        $this->db->join('presensi', 'presensi.nis = siswa.nis');
        $this->db->join('kelas', 'kelas.id_kelas = presensi.id_kelas');
        $this->db->order_by('siswa.id_kelas', 'asc');
        $this->db->group_by('presensi.nis');
        // $this->db->where('presensi.bulan', $bulantahun);
        $this->db->where('MONTH(presensi.bulan)', date('m', strtotime($bulantahun)));
        $this->db->where('YEAR(presensi.bulan)', date('Y', strtotime($bulantahun)));
        return $this->db->get()->result_array();
    }
    public function getPresensiHarianSiswa($nis)
    {
        $this->db->select('siswa.*, presensi.*, kelas.*');
        $this->db->from('siswa');
        $this->db->join('presensi', 'presensi.nis = siswa.nis');
        $this->db->join('kelas', 'kelas.id_kelas = presensi.id_kelas');
        $this->db->where('presensi.nis', $nis);
        $this->db->order_by('presensi.bulan', 'asc');

        return $this->db->get()->result_array();
    }
    public function getPresensiByID($id)
    {
        $this->db->select('presensi.*, siswa.nama, kelas.nama_kelas');
        $this->db->from('presensi');
        $this->db->join('siswa', 'siswa.nis = presensi.nis');
        $this->db->join('kelas', 'kelas.id_kelas = presensi.id_kelas');
        $this->db->where('presensi.id_presensi', $id);
        return $this->db->get()->row();
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
    public function viewPresensiSiswa($id)
    {
        $this->db->select('presensi.*, siswa.nama, kelas.nama_kelas');
        $this->db->select_sum("presensi.hadir='hadir'", 'hadir');
        $this->db->select_sum("presensi.hadir='sakit'", 'sakit');
        $this->db->select_sum("presensi.hadir='alpha'", 'alpha');
        $this->db->select_sum("presensi.hadir='izin'", 'izin');
        $this->db->from('presensi');
        $this->db->join('siswa', 'siswa.nis = presensi.nis');
        $this->db->join('kelas', 'kelas.id_kelas = presensi.id_kelas');
        $this->db->where('siswa.nis', $id);
        return $this->db->get()->result();
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
    public function doPresensi($data, $tanggal)
    {
        $siswaData = [
            'nis' => $data["nis"],
            'id_kelas' => $data['id_kelas'],
            'hadir' => $data['kehadiran'],
            'keterangan' => $data['keterangan'],
            'bulan' => $tanggal
        ];
        $this->db->insert('presensi', $siswaData);
    }

    public function doUpdatePresensi($idpresensi, $update)
    {
        $this->db->update('presensi', $update, ['id_presensi' => $idpresensi]);
    }
}
