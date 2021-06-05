<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Semester_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    private $table = 'semester';

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }


}

/* End of file Semester_model.php */
