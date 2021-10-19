<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('nip')) {
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
        $data['judul'] = 'Data User';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $data['datauser'] = $this->Ahsp_model->joinuser();
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function changepassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $data['datauser'] = $this->Ahsp_model->getTablewhere('user', 'nip', $this->session->userdata('nip'))->row_array();

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
            if (!password_verify($cur_pass, $data['datauser']['password'])) {
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

    public function profile()
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
            $this->load->view('user/profile', $data);
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
            redirect('user/profile');
        }
    }
    public function edituser($nip = null)
    {
        $data['ceknip'] = $this->Ahsp_model->getTablewhere('user', 'nip', $nip)->num_rows();
        if ($nip == null || $data['ceknip'] < 1) {
            redirect('user');
        } else {
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            $data['datauser'] = $this->Ahsp_model->joinuserwhere($nip);
            $data['role'] = $this->Ahsp_model->getTable('user_role', 'role')->result_array();
            $data['judul'] = 'Edit Data User';
            $this->form_validation->set_rules('role', 'Role', 'required|trim', ['required' => '{field} harus diisi']);
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('user/edituser', $data);
                $this->load->view('templates/footer');
            } else {
                $this->Ahsp_model->edit('user');
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('user');
            }
        }
    }

    public function editpass($nip = null)
    {
        $data['ceknip'] = $this->Ahsp_model->getTablewhere('user', 'nip', $nip)->num_rows();
        if ($nip == null || $data['ceknip'] < 1) {
            redirect('user');
        } else {
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $nip)->row_array();
            $this->form_validation->set_rules('newpassword', 'New password', 'required|trim|min_length[3]', [
                'required' => '{field} harus diisi',
                'min_length' => '{field} minimal {param} karakter'
            ]);
            $this->form_validation->set_rules('confpass', 'Confirm new password', 'required|trim|matches[newpassword]', [
                'required' => '{field} harus diisi',
                'matches' => 'Konfirmasi password tidak sama'
            ]);
            $data['judul'] = 'Edit Password User';
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('user/editpass', $data);
                $this->load->view('templates/footer');
            } else {
                $this->Ahsp_model->edit('userpass');
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('user');
            }
        }
    }


    public function editbio($nip = null)
    {
        $data['ceknip'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $nip)->num_rows();
        if ($nip == null || $data['ceknip'] < 1) {
            redirect('user');
        } else {
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            $data['datauser'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $nip)->row_array();
            $data['daerah'] = $this->Ahsp_model->getTable('daerah', 'daerah')->result_array();
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('nip', 'NIP/NRP', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('daerah', 'Daerah', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|trim|numeric', [
                'required' => '{field} harus diisi',
                'numeric' => '{field} harus angka'
            ]);
            $data['judul'] = 'Edit Bio User';
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('user/editbio', $data);
                $this->load->view('templates/footer');
            } else {
                //cek jikka ada gambar yang akan di upload
                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    // $config['max_size']      = '2048';
                    $config['upload_path'] = './assets/img/profile/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $old_image = $data['datauser']['image'];
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
    }

    public function tambah()
    {

        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $data['judul'] = 'Tambah Data User';
        $data['role'] = $this->Ahsp_model->getTable('user_role', 'role')->result_array();
        $data['daerah'] = $this->Ahsp_model->getTable('daerah', 'daerah')->result_array();
        $this->form_validation->set_rules('nip', 'NIP/NRP', 'required|trim|is_unique[user.nip]|is_unique[biodata.nip]', [
            'is_unique' => '{field} sudah ada',
            'required' => '{field} harus diisi'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => '{field} harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'required' => '{field} harus diisi',
            'min_length' => '{field} minimal {param} karakter'
        ]);
        $this->form_validation->set_rules('daerah', 'Daerah', 'required|trim', [
            'required' => '{field} harus diisi'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required|trim', [
            'required' => '{field} harus diisi'
        ]);
        $this->form_validation->set_rules('active', 'active', 'required|trim', [
            'required' => '{field} harus diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Ahsp_model->tambah('user');
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('user');
        }
    }
    public function hapus($nip = null)
    {
        $data['ceknip'] = $this->Ahsp_model->getTablewhere('user', 'nip', $nip)->num_rows();
        if ($nip == null || $data['ceknip'] < 1) {
            redirect('user');
        } else {
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $nip)->row_array();
            $old_image = $data['user']['image'];
            if ($old_image != 'default.jpg') {
                unlink(FCPATH . 'assets/img/profile/' . $old_image);
            }
            $this->Ahsp_model->hapus('user', 'nip', $nip);
            $this->Ahsp_model->hapus('biodata', 'nip', $nip);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
