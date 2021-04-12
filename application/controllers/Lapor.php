<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lapor extends CI_Controller
{
    public function __construct()
	{
			parent::__construct();
			$this->load->model("lapor_model");
			$this->load->library('form_validation');
	}
	 
	public function index()
	{
			$data['lapor'] = $this->lapor_model->getAll();
			$this->load->view('templates/header');
			$this->load->view('templates/siswa_sidebar');
			$this->load->view('templates/lapor',$data);
			$this->load->view('templates/footer');
	}
	public function create()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/siswa_sidebar');
		$this->load->view('templates/siswa_topbar');
		$this->load->view('templates/lapor');
		$this->load->view('templates/footer');
	}
	public function save()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('no_telp','Nomor Telepon','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		if ($this->form_validation->run()==true)
        {
			$data['nama'] = $this->input->post('nama');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['no_telp'] = $this->input->post('no_telp');
			$data['alamat'] = $this->input->post('alamat');
			$this->lapor_model->save($data);
			redirect('lapor');
		}
		else
		{
			$this->load->view('templates/header');
			$this->load->view('templates/lapor');
			$this->load->view('templates/footer');
		}
	}
	function edit($nis)
	{
		$data['siswa'] = $this->lapor_model->getById($nis);
		$this->load->view('templates/header');
		$this->load->view('siswa/edit',$data);
		$this->load->view('templates/footer');
	}
	public function update()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('no_telp','Nomor Telepon','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		if ($this->form_validation->run()==true)
        {
		 	$nis = $this->input->post('nis');
			$data['nama'] = $this->input->post('nama');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['no_telp'] = $this->input->post('no_telp');
			$data['alamat'] = $this->input->post('alamat');
			$this->lapor_model->update($data,$nis);
			redirect('lapor');
		}
		else
		{
			$nis = $this->input->post('nis');
			$data['lapor_bk'] = $this->lapor_model->getById($nis);
			$this->load->view('templates/header');
			$this->load->view('siswa/edit',$data);
			$this->load->view('templates/footer');
		}
	}
}