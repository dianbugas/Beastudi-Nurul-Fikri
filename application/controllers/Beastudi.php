<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beastudi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Beastudi_model', 'beastudi_model');
		$this->load->model('Pic_model');
		$this->load->model('Beastudi_model', 'pic');
		$this->load->library('form_validation');
		// di tendang supaya user tdk masuk sembarangan lewat url
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Beastudi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['kontribusi'] = $this->pic->getData('kontribusi');
		$data['kelas'] = $this->pic->getData('kelas');
		$data['programstudi'] = $this->pic->getData('programstudi');
		$data['mahasiswa'] = $this->pic->getData('mahasiswa');
		if ($_SESSION['role_id'] == 1) {
			$data['beastudi'] = $this->pic->tampil_data_admin();
		} elseif ($_SESSION['role_id'] == 3) {
			$data['beastudi'] = $this->pic->tampil_data_pic();
		} else {
			$data['beastudi'] = $this->pic->tampil_data_mhs();
		}
		$data['pic'] = $this->db->get('pic')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('beastudi/index', $data);
		$this->load->view('templates/footer');
	}

	public function insert()
	{
		$this->load->model('Beastudi_model');

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data = [
			'nama_id' => $this->input->post('nama_id'),
			'pic_id' => $this->input->post('pic_id'),
			'jk' => $this->input->post('jk'),
			'semester_id' => $this->input->post('semester'),
			'angkatan' => $this->input->post('angkatan'),
			'programstudi_id' => $this->input->post('programstudi'),
			// 'kontribusi_id' => $this->input->post('kontribusi'),
			'keterangan' => $this->input->post('keterangan'),
			'status' => $this->input->post('status'),
			'kelas_id' => $this->input->post('kelas_id'),
			'tgl' => $this->input->post('tgl'),
		];
		$this->beastudi_model->insertData('beastudi', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Beastudi baru ditambahkan!</div>');
		redirect('beastudi');
	}


	public function detail($id)
	{
		$data['title'] = 'Detail Beastudi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['beastudi'] = $this->beastudi_model->getBeastudiById($id);
		$where = array('beastudi_id' => $id);
		$data['beastudi1'] = $this->beastudi_model->editdata($where, 'beastudi')->result();

		$data['kontribusi'] = $this->pic->getData('kontribusi');
		$data['kelas'] = $this->pic->getData('kelas');
		$data['programstudi'] = $this->pic->getData('programstudi');
		$data['mahasiswa'] = $this->pic->getData('mahasiswa');
		$data['pic'] = $this->db->get('pic')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('beastudi/detail', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Beastudi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('beastudi_id' => $id);
		$data['beastudi'] = $this->beastudi_model->editdata($where, 'beastudi')->result();

		$data['jurusan'] = ['Teknik Informatika', 'Sistem Informasi'];
		$data['kontribusi'] = $this->beastudi_model->getData('kontribusi');
		$data['kelas'] = $this->pic->getData('kelas');
		$data['programstudi'] = $this->pic->getData('programstudi');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('beastudi/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$data = [
			'nama_id' => $this->input->post('nama_id'),
			'pic_id' => $this->input->post('pic_id'),
			'jk' => $this->input->post('jk'),
			'semester_id' => $this->input->post('semester'),
			'angkatan' => $this->input->post('angkatan'),
			'programstudi_id' => $this->input->post('programstudi'),
			// 'kontribusi_id' => $this->input->post('kontribusi'),
			'keterangan' => $this->input->post('keterangan'),
			'status' => $this->input->post('status'),
			'kelas_id' => $this->input->post('kelas_id'),
			'tgl' => $this->input->post('tgl'),
		];

		$id = ['beastudi_id' => $this->input->post('beastudi_id')];
		$this->beastudi_model->update_data($id, $data, 'beastudi');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mahasiswa Beastudi Berhasil di Edit!</div>');
		redirect('beastudi');
	}

	public function delete($id)
	{
		$this->beastudi_model->deleteDataBeastudiById($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Beastudi di hapus!</div>');
		redirect('beastudi');
	}
}
