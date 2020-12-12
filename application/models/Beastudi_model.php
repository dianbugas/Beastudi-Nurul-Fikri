<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beastudi_model extends CI_Model
{

	public function getData($table)
	{
		return $this->db->get($table)->result();
	}

	public function getAllBeastudi()
	{
		return $this->db->get('beastudi')->result_array();
	}

	public function insertData($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($id, $data, $table)
	{
		$this->db->where($id);
		$this->db->update($table, $data);
	}

	public function getBeastudiById($id)
	{
		return $this->db->get_where('beastudi', ['beastudi_id' => $id])->row_array();
	}

	//join table kontribusi_mhs
	public function getKontribusimhs()
	{
		$query = "SELECT `beastudi`.*, `kontribusimhs`.`date`
                  FROM `beastudi` JOIN `kontribusimhs`
                  ON `beastudi`.`mhs_id` = `kontribusimhs`.`id`
                ";
		return $this->db->query($query)->result_array(); //RESULT ARRAY untuk menampilkan semua data
	}

	//ADMIN. PIC. USER
	function tampil_data_admin()
	{
		$query = "SELECT `beastudi`.*, `pic`.`nama`
		          FROM `beastudi` JOIN `pic`
		          ON `beastudi`.`pic_id` = `pic`.`id`
				";
		return $this->db->query($query)->result_array();
	}

	function get_beastudisl()
	{
		$this->db->select('beastudi.*,COUNT(id) AS item_kontribusi');
		$this->db->from('beastudi');
		$this->db->join('detail', 'beastudi_id=detail_beastudi_id');
		$this->db->join('kontribusi', 'detail_kontribusi_id=id');
		$this->db->group_by('beastudi_id');
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_pic()
	{
		$query = "SELECT * FROM `beastudi`
		INNER JOIN pic ON beastudi.pic_id=pic.id
		JOIN user ON pic.email=user.email
		WHERE pic.email=user.email
		AND pic.email='$_SESSION[email]'";

		return $this->db->query($query)->result_array();
	}

	function tampil_data_mhs()
	{
		$query = "SELECT * FROM `beastudi`
		JOIN pic ON beastudi.pic_id=pic.id
		JOIN mahasiswa ON beastudi.nama_id=mahasiswa.id
		JOIN user ON mahasiswa.email=user.email
		WHERE mahasiswa.email=user.email
		AND mahasiswa.email='$_SESSION[email]'";

		return $this->db->query($query)->result_array();
	}

	public function input_data($menu_id, $nama, $jk, $semester, $angkatan, $programstudi, $kontribusi)
	{
		$query = "INSERT INTO beastudi (nama_mh,jk,semester,angkatan,programstudi,kontribusi,pic_id) VALUES ('$nama','$jk','$semester','$angkatan','$programstudi','$kontribusi','$menu_id')";
		$this->db->query($query);
	}

	public function editDataBeastudi()
	{
		$data = [
			"nama_mh" => $this->input->post('nama_mh', true),
			"jk" => $this->input->post('jk', true),
			"semester" => $this->input->post('semester', true),
			"angkatan" => $this->input->post('angkatan', true),
			"programstudi" => $this->input->post('programstudi', true),
			"kontribusi" => $this->input->post('kontribusi', true),
			"menu_id" => $this->input->post('menu_id', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('beastudi', $data);
	}

	public function deleteDataBeastudiById($id)
	{
		$this->db->delete('beastudi', ['beastudi_id' => $id]);
	}

	public function hitungJumlahBeastudiAdmin()
	{
		$query = $this->db->get('beastudi');

		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function hitungJumlahBeastudiPic()
	{
		$query = $this->db->get('beastudi');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function hitungJumlahBeastudiMhs()
	{
		$query = $this->db->get("SELECT * FROM `beastudi`
		INNER JOIN pic ON beastudi.pic_id=pic.id
		JOIN user ON pic.email=user.email
		WHERE pic.email=user.email
		AND pic.email='$_SESSION[email]'");
		// untuk tampilan mahasiswa

		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function editdata($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function download()
	{
		$query = $this->db->get('user');
		return $query->result();
	}

	//
	function get_kontribusis()
	{
		$query = $this->db->get('kontribusi');
		return $query;
	}
}
