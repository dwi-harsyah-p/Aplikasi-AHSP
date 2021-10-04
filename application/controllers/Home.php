<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', '123')->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('Home');
        $this->load->view('templates/footer');
    }
}
