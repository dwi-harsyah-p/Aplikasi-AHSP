<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('nip')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $nip = $this->session->userdata('nip');
        $data['judul'] = 'User Profile';
        $data['user'] = $this->User_model->getTablewhere('biodata', 'nip', $nip)->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function changepassword()
    {
        $nip = $this->session->userdata('nip');
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->User_model->getTablewhere('user', 'nip', $nip)->row_array();

        $this->form_validation->set_rules('password', 'Current password', 'required|trim', ['required' => '{field} harus diisi']);
        $this->form_validation->set_rules('newpassword', 'New password', 'required|trim|min_length[3]', [
            'required' => '{field} harus diisi',
            'min_length' => '{field} minimal {param} karakter'
        ]);
        $this->form_validation->set_rules('confpass', 'Confirm new password', 'required|trim|matches[newpassword]', [
            'required' => '{field} harus diisi',
            'matches' => 'Konfirmasi password tidak sama'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $cur_pass = $this->input->post('password', true);
            $new_pass = $this->input->post('newpassword', true);
            if (!password_verify($cur_pass, $data['user']['password'])) {
                $this->session->set_flashdata('msg', 'Password Salah');
                redirect('user/changepassword');
            } else {
                if ($cur_pass == $new_pass) {
                    $this->session->set_flashdata('msg', 'Password Tidak Boleh Sama dengan Yang Lama');
                    redirect('user/changepassword');
                } else {
                    $pass = password_hash($new_pass, PASSWORD_DEFAULT);
                    $this->User_model->changepassword($pass, $nip);

                    $this->session->set_flashdata('pass', 'Ubah Password');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
