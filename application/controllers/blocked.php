<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blocked extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            $this->session->unset_userdata('re');
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Harus Login Terlebih Dahulu!</div>');
            if ($this->uri->segment(2)) {
                $this->session->set_userdata('re', $this->uri->segment(1) . '/' . $this->uri->segment(2));
            } else {
                $this->session->set_userdata('re', $this->uri->segment(1));
            }
            redirect('auth');
        }
        $this->session->unset_userdata('re');
    }

    public function index()
    {
        $data['judul'] = 'Access Blocked!';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $this->load->view('templates/user/header', $data);
        $this->load->view('block/index');
        $this->load->view('templates/user/footer');
    }
}
