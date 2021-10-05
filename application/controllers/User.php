<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('nip')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'User Profile';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $data['datauser'] = $this->Ahsp_model->getTablewhere('user', 'nip', $this->session->userdata('nip'))->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => '{field} harus diisi']);
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|trim', ['required' => '{field} harus diisi']);
        $this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required|trim', ['required' => '{field} harus diisi']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => '{field} harus diisi']);
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|trim|numeric', [
            'required' => '{field} harus diisi',
            'numeric' => '{field} harus angka'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer', $data);
        } else {

            //cek jikka ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                // $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->Ahsp_model->edit('biodata');
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('user');
        }
    }

    public function changepassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();

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
                    $this->Ahsp_model->changepassword($pass, $this->session->userdata('nip'));

                    $this->session->set_flashdata('pass', 'Ubah Password');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
