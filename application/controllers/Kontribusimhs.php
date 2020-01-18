<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontribusimhs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beastudi_model');
        $this->load->model('Pic_model');
        $this->load->model('Beastudi_model', 'pic');
        $this->load->helper('tgl_indo');
        $this->load->library('form_validation');
        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Kontribusi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kontribusi'] = $this->pic->getData('kontribusi');

        $data['beastudi'] = $this->pic->getBeastudi();
        $data['kontribusimhs'] = $this->db->get('kontribusimhs')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kontribusi/index', $data);
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $this->load->model('Beastudi_model');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'nama' => $this->input->post('nama'),
            'kontribusi_id' => $this->input->post('kontribusi'),
            'date' => $this->input->post('date'),
        ];
        $this->Beastudi_model->insertData('kontribusimhs', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kontribusi Mahasiswa baru ditambahkan!</div>');
        redirect('kontribusimhs');
    }
}
