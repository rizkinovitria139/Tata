<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/galeri');
        $this->load->view('templates/dash_footer');
        
    }
}