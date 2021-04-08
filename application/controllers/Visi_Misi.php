<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visi_Misi extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/visi_misi');
    }
}