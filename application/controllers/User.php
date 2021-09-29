<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ahsp_model');
        if (!$this->session->userdata('nip')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $nip = $this->session->userdata('nip');
        $data['judul'] = 'User Profile';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $nip)->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
