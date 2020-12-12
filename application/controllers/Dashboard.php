<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Beastudi_model');
		$this->load->model('Kontribusimhs_model');
		$this->load->model('Pic_model');
		$this->load->model('Beastudi_model', 'pic');
		// role access user
		is_logged_in();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Daftar Nama Beastudi';
		$data['pic'] = $this->Pic_model->getAllPic();
		$data['total_pic'] = $this->Pic_model->hitungJumlahPic();
		// $data['total_beastudi'] = $this->Beastudi_model->hitungJumlahBeastudi();
		$data['kelas'] = $this->pic->getData('kelas');
		$data['picc'] = $this->pic->getData('pic');
		$data['programstudi'] = $this->pic->getData('programstudi');
		$data['kontribusi'] = $this->pic->getData('kontribusi');
		$data['mahasiswa'] = $this->pic->getData('mahasiswa');
		$data['pic'] = $this->db->get('pic')->result_array();

		if ($_SESSION['role_id'] == 1) {
			$data['beastudi'] = $this->Beastudi_model->tampil_data_admin();
		} elseif ($_SESSION['role_id'] == 3) {
			$data['beastudi'] = $this->Beastudi_model->tampil_data_pic();
		} elseif ($_SESSION['role_id'] == 2) {
			$data['beastudi'] = $this->Beastudi_model->tampil_data_mhs();
		} else {
			echo "Data Kosong";
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
}
