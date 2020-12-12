<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	private $filename = "import_data";
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pic_model');
		$this->load->model('Mahasiswa_model');
		$this->load->model('Beastudi_model');
		$this->load->model('Beastudi_model', 'pic');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url', 'download'));
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
		$data['kontribusi'] = $this->pic->getData('kontribusi');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('templates/footer');
	}

	public function insert()
	{
		$this->load->model('Beastudi_model');

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'nim' => $this->input->post('nim'),
			'telp' => $this->input->post('telp'),
			'kontribusi_id' => $this->input->post('kontribusi_id'),
		];
		$this->Beastudi_model->insertData('mahasiswa', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mahasiswa berhasil ditambahkan</div>');
		redirect('mahasiswa');
	}

	public function edit($id)
	{
		$data['title'] = 'Edit';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('id' => $id);
		$data['mahasiswa'] = $this->Beastudi_model->editdata($where, 'mahasiswa')->result();

		$data['kontribusi'] = $this->Beastudi_model->getData('kontribusi');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('mahasiswa/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$data = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'nim' => $this->input->post('nim'),
			'telp' => $this->input->post('telp'),
			'kontribusi_id' => $this->input->post('kontribusi_id'),
		];

		$id = ['id' => $this->input->post('id')];
		$this->Beastudi_model->update_data($id, $data, 'mahasiswa');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa  Berhasil di Edit!</div>');
		redirect('mahasiswa');
	}

	public function delete($id)
	{
		$this->Mahasiswa_model->deleteDataPicById($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mahasiswa di hapus</div>');
		redirect('mahasiswa');
	}

	public function do_upload()
	{
		$this->load->model('Beastudi_model');

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$email = $this->input->post('email');
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image) {
			$config['upload_path'] = './assets/img/upload/';
			$config['allowed_types'] = 'csv|xlsx';
			$config['max_size'] = '2048';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$old_image = $data['user']['gambar'];
				if ($old_image != 'default.jpg') {
					$config['sess_save_path'] =  BASEPATH . 'assets/img/upload/';
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('gambar', $new_image);
			} else {
				// echo $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data yang anda upload tidak di perbolehkan! Silahkan Upload file dengan format CSV atau xlsx</div>');
				redirect('mahasiswa');
			};
		}
		$this->db->where('email', $email);
		$this->db->update('user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di Upload</div>');
		redirect('mahasiswa');
	}

	public function lakukan_download()
	{
		force_download('assets/img/upload/ok.xlsx', NULL);
	}

	public function form()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Beastudi_model');

		$data = array(); // Buat variabel $data sebagai array

		if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di Model.php
			$upload = $this->Mahasiswa_model->upload_file($this->filename);

			if ($upload['result'] == "success") { // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet;
			} else { // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		$this->load->view('form', $data);
		$this->load->view('templates/footer');
	}

	public function import()
	{
		$this->load->model('Beastudi_model');

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();

		$numrow = 1;
		foreach ($sheet as $row) {
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if ($numrow > 1) {
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'nama' => $row['A'], // Insert data nis dari kolom A di excel
					'email' => $row['B'], // Insert data nama dari kolom B di excel
					'nim' => $row['C'], // Insert data jenis kelamin dari kolom C di excel
					'telp' => $row['D'], // Insert data alamat dari kolom D di excel
					'kontribusi_id' => $row['E'], // Insert data alamat dari kolom D di excel
					// Insert data alamat dari kolom D di excel
				));
			}

			$numrow++; // Tambah 1 setiap kali looping
		}
		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->Mahasiswa_model->insert_multiple($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di tambahkan</div>');
		redirect('mahasiswa'); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}
