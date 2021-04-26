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
		$data['title'] = 'Halaman Siswa';
		$data['siswa'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();

		$data['lapor'] = $this->lapor_model->getAll();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/siswa_sidebar', $data);
		$this->load->view('templates/siswa_topbar', $data);
		$this->load->view('templates/lapor', $data);
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
		$this->load->view('templates/header');
		$this->load->view('templates/siswa_sidebar');
		$this->load->view('templates/siswa_topbar');

		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('file', 'File', 'required');

		if ($this->form_validation->run() == true) {
			$data['isi'] = $this->input->post('isi');
			$data['tanggal'] = $this->input->post('tanggal');
			$data['file'] = $this->input->post('file');

			$this->lapor_model->save($data);
			redirect('lapor');
		} else {
			$this->load->view('templates/header');
			$this->load->view('templates/lapor');
		}
	}
	function edit($id_pelapor)
	{
		$data['siswa'] = $this->lapor_model->getById($id_pelapor);
		$this->load->view('templates/header');
		$this->load->view('siswa/edit', $data);
		$this->load->view('templates/footer');
	}
	public function update()
	{
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		//$this->form_validation->set_rules('tanggal','Tanggal','required');
		$this->form_validation->set_rules('file', 'File', 'required');
		if ($this->form_validation->run() == true) {
			$id_pelapor = $this->input->post('d_pelapor');
			$data['isi'] = $this->input->post('isi');
			$data['tanggal'] = $this->input->post('tanggal');
			$data['file'] = $this->input->post('file');
			$this->lapor_model->update($data, $id_pelapor);
			redirect('lapor');
		} else {
			$id_pelapor = $this->input->post('id_pelapor');
			$data['lapor_bk'] = $this->lapor_model->getById($id_pelapor);
			$this->load->view('templates/header');
			$this->load->view('siswa/edit', $data);
			$this->load->view('templates/footer');
		}
	}
}