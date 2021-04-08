<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sejarah extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/sejarah');
    }
}