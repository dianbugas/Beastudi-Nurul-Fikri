<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
	public function getAllMahasiswa()
	{
		return $this->db->get('mahasiswa')->result_array();
	}

	public function deleteDataPicById($id)
	{
		$this->db->delete('mahasiswa', ['id' => $id]);
	}

	public function getPicById($id)
	{
		return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
	}

	public function editDataPic()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"email" => $this->input->post('email', true),
			"nim" => $this->input->post('nim', true),
			"telp" => $this->input->post('telp', true),
			"kontribusi_id" => $this->input->post('kontribusi_id', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('mahasiswa', $data);
	}

	public function upload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data)
	{
		$this->db->insert_batch('mahasiswa', $data);
	}
}
