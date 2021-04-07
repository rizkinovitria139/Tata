<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{

    public function getKelas()
    {
        $query = "SELECT 'kelas'.*, 'guru'.'nama'
            FROM 'kelas' JOIN 'guru'
            ON 'kelas'.'nip_wali_kelas' = 'guru'.'nip'
            ";

        return $this->db->query($query)->result_array();
    }
}
    
    /* End of file Kelas_model.php */
