<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Harus Login Terlebih Dahulu!</div>');
            if ($this->uri->segment(2)) {
                $this->session->set_userdata('re', $this->uri->segment(1) . '/' . $this->uri->segment(2));
            } else {
                $this->session->set_userdata('re', $this->uri->segment(1));
            }
            redirect('auth');
        } else {
            $this->session->unset_userdata('re');
            $data['user_role'] = $this->Ahsp_model->getTablewhere('user', 'nip', $this->session->userdata('nip'))->row_array();
            $data['role'] = $this->Ahsp_model->getTablewhere('user_role', 'id', $data['user_role']['role_id'])->row_array();
            if ($data['role']['role'] == 'Operator') {
                redirect('operator');
            } elseif ($data['role']['role'] == 'User') {
                redirect('operator');
            }
        }
    }

    public function index()
    {
        $data['judul'] = 'Home';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('Home');
        $this->load->view('templates/footer');
    }
}
