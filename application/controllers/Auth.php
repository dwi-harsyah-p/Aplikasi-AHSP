<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('nip')) {
            redirect('home');
        }
        $this->form_validation->set_rules('nip', 'NIP/NRP', 'required|trim', ['required' => '{field} harus diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => '{field} harus diisi']);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login Page';
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');

        $user = $this->Ahsp_model->getTablewhere('user', 'nip', $nip)->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'nip' => $user['nip'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($this->session->userdata('re')) {
                        redirect($this->session->userdata('re'));
                    } else {
                        if ($user['role_id'] == 1) {
                            redirect('home');
                        } else {
                            redirect('operator');
                        }
                    }
                } else {
                    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">This Account has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Account is not registered!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
}
