<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Beastudi_model', 'beastudi_model');
		$this->load->model('Pic_model');
		$this->load->model('Beastudi_model', 'pic');
		$this->load->library('form_validation');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Report';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['semester'] = $this->pic->getData('semester');
		$data['kelas'] = $this->pic->getData('kelas');
		$data['programstudi'] = $this->pic->getData('programstudi');
		$data['mahasiswa'] = $this->pic->getData('mahasiswa');
		$data['pic'] = $this->pic->getData('pic');
		$data['kontribusi'] = $this->beastudi_model->getData('kontribusi');

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
		$this->load->view('report/index', $data);
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
		redirect('report');
	}

	public function laporan_pdf()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->library('pdfgenerator');
		$data['semester'] = $this->pic->getData('semester');
		$data['mahasiswa'] = $this->pic->getData('mahasiswa');
		$data['kontribusi'] = $this->pic->getData('kontribusi');
		if ($_SESSION['role_id'] == 1) {
			$data['beastudi'] = $this->pic->tampil_data_admin();
		} elseif ($_SESSION['role_id'] == 3) {
			$data['beastudi'] = $this->pic->tampil_data_pic();
		} else {
			$data['beastudi'] = $this->pic->tampil_data_mhs();
		}
		$data['pic'] = $this->db->get('pic')->result_array();

		//menampilkan data dalam bentuk pdf yang akan dicetak
		$html = $this->load->view('cetak_pdf', $data, true);
		$this->pdfgenerator->generate($html);
	}

	public function delete($id)
	{
		$this->beastudi_model->deleteDataBeastudiById($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil di hapus</div>');
		redirect('report');
	}
}
