<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{

    public function getRole()
    {
        return $this->db->get('user_role')->result_array();
    }
}

/* End of file Role_model.php */
