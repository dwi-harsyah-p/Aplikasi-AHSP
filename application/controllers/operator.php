<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
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
        $data['judul'] = 'Operator AHSP - Balai Besar Wilayah Sungai Sumatera VIII';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $this->load->view('templates/user/header', $data);
        $this->load->view('operator/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function bahan()
    {
        $data['judul'] = 'Data Bahan';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $data['data'] = $this->db->query("SELECT harga.id, bahan.uraian, bahan.kode, bahan.satuan, harga.harga FROM bahan INNER JOIN harga ON bahan.id = harga.id_bahan WHERE harga.id_daerah =" . $data['user']['id_daerah'])->result_array();
        $this->load->view('templates/user/header', $data);
        $this->load->view('operator/bahan/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function upah()
    {
        $data['judul'] = 'Data Upah';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $data['data'] = $this->db->query("SELECT harga.id, upah.uraian, upah.kode, upah.satuan, harga.harga FROM upah INNER JOIN harga ON upah.id = harga.id_upah WHERE harga.id_daerah = " . $data['user']['id_daerah'])->result_array();
        $this->load->view('templates/user/header', $data);
        $this->load->view('operator/upah/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function alat()
    {
        $data['judul'] = 'Data Alat';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $data['data'] = $this->db->query("SELECT harga.id, alat.uraian, alat.kode, alat.satuan, harga.harga FROM alat INNER JOIN harga ON alat.id = harga.id_alat WHERE harga.id_daerah = " . $data['user']['id_daerah'])->result_array();
        $this->load->view('templates/user/header', $data);
        $this->load->view('operator/alat/index', $data);
        $this->load->view('templates/user/footer');
    }

    public function hapus($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('harga', 'id', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('blocked');
        } else {
            $this->Ahsp_model->hapus('harga', 'id', $id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function tambah_alat()
    {
        if ($this->Ahsp_model->getTable('alat', 'id')->num_rows() < 1) {
            $this->session->set_flashdata('msg', 'Data Alat Tidak Tersedia! Silakan Hubungi Administrator!');
            redirect('operator/alat');
        } else {
            $data['judul'] = 'Data Alat';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
                'numeric' => '{field} Harus Nomor',
                'required' => '{field} harus diisi'
            ]);
            $data['alat'] = $this->Ahsp_model->getTable('alat', 'id')->result_array();

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/user/header', $data);
                $this->load->view('operator/alat/tambah', $data);
                $this->load->view('templates/user/footer');
            } else {
                if ($this->Ahsp_model->joinhargaalat($this->input->post('alat'), $this->input->post('daerah'))->row_array()) {
                    $this->session->set_userdata('err', '<small class="form-text text-danger">Data Sudah Ada!</small>');
                    $this->load->view('templates/user/header', $data);
                    $this->load->view('operator/alat/tambah', $data);
                    $this->load->view('templates/user/footer');
                } else {
                    $this->Ahsp_model->tambah('operator_alat');
                    $this->session->set_flashdata('flash', 'Ditambahkan');
                    redirect('operator/alat');
                }
            }
        }
    }
    public function tambah_bahan()
    {
        if ($this->Ahsp_model->getTable('bahan', 'id')->num_rows() < 1) {
            $this->session->set_flashdata('msg', 'Data bahan Tidak Tersedia! Silakan Hubungi Administrator!');
            redirect('operator/bahan');
        } else {
            $data['judul'] = 'Data bahan';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
                'numeric' => '{field} Harus Nomor',
                'required' => '{field} harus diisi'
            ]);
            $data['bahan'] = $this->Ahsp_model->getTable('bahan', 'id')->result_array();

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/user/header', $data);
                $this->load->view('operator/bahan/tambah', $data);
                $this->load->view('templates/user/footer');
            } else {
                if ($this->Ahsp_model->joinhargabahan($this->input->post('bahan'), $this->input->post('daerah'))->row_array()) {
                    $this->session->set_userdata('err', '<small class="form-text text-danger">Data Sudah Ada!</small>');
                    $this->load->view('templates/user/header', $data);
                    $this->load->view('operator/bahan/tambah', $data);
                    $this->load->view('templates/user/footer');
                } else {
                    $this->Ahsp_model->tambah('operator_bahan');
                    $this->session->set_flashdata('flash', 'Ditambahkan');
                    redirect('operator/bahan');
                }
            }
        }
    }

    public function tambah_upah()
    {
        if ($this->Ahsp_model->getTable('upah', 'id')->num_rows() < 1) {
            $this->session->set_flashdata('msg', 'Data upah Tidak Tersedia! Silakan Hubungi Administrator!');
            redirect('operator/upah');
        } else {
            $data['judul'] = 'Data upah';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
                'numeric' => '{field} Harus Nomor',
                'required' => '{field} harus diisi'
            ]);
            $data['upah'] = $this->Ahsp_model->getTable('upah', 'id')->result_array();

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/user/header', $data);
                $this->load->view('operator/upah/tambah', $data);
                $this->load->view('templates/user/footer');
            } else {
                if ($this->Ahsp_model->joinhargaupah($this->input->post('upah'), $this->input->post('daerah'))->row_array()) {
                    $this->session->set_userdata('err', '<small class="form-text text-danger">Data Sudah Ada!</small>');
                    $this->load->view('templates/user/header', $data);
                    $this->load->view('operator/upah/tambah', $data);
                    $this->load->view('templates/user/footer');
                } else {
                    $this->Ahsp_model->tambah('operator_upah');
                    $this->session->set_flashdata('flash', 'Ditambahkan');
                    redirect('operator/upah');
                }
            }
        }
    }

    public function edit_alat($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('harga', 'id', $id)->row_array();
        if ($id == null || $data['cekid'] < 1) {
            redirect('operator/alat');
        } else {
            $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
                'numeric' => '{field} Harus Nomor',
                'required' => '{field} harus diisi'
            ]);
            $data['judul'] = 'Edit Data Harga';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            $data['harga'] = $this->Ahsp_model->joinhargaalat(null, null, $id)->row_array();
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/user/header', $data);
                $this->load->view('operator/alat/edit', $data);
                $this->load->view('templates/user/footer');
            } else {
                $this->Ahsp_model->edit('operator_alat');
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('operator/alat');
            }
        }
    }
    public function edit_bahan($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('harga', 'id', $id)->row_array();
        if ($id == null || $data['cekid'] < 1) {
            redirect('operator/bahan');
        } else {
            $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
                'numeric' => '{field} Harus Nomor',
                'required' => '{field} harus diisi'
            ]);
            $data['judul'] = 'Edit Data Harga';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            $data['harga'] = $this->Ahsp_model->joinhargabahan(null, null, $id)->row_array();
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/user/header', $data);
                $this->load->view('operator/bahan/edit', $data);
                $this->load->view('templates/user/footer');
            } else {
                $this->Ahsp_model->edit('operator_bahan');
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('operator/bahan');
            }
        }
    }
    public function edit_upah($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('harga', 'id', $id)->row_array();
        if ($id == null || $data['cekid'] < 1) {
            redirect('operator/upah');
        } else {
            $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
                'numeric' => '{field} Harus Nomor',
                'required' => '{field} harus diisi'
            ]);
            $data['judul'] = 'Edit Data Harga';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            $data['harga'] = $this->Ahsp_model->joinhargaupah(null, null, $id)->row_array();
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/user/header', $data);
                $this->load->view('operator/upah/edit', $data);
                $this->load->view('templates/user/footer');
            } else {
                $this->Ahsp_model->edit('operator_upah');
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('operator/upah');
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
            $this->load->view('templates/user/header', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/user/footer', $data);
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
            redirect('operator/profile');
        }
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
            $this->load->view('templates/user/header', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/user/footer', $data);
        } else {
            $cur_pass = $this->input->post('password', true);
            $new_pass = $this->input->post('newpassword', true);
            if (!password_verify($cur_pass, $data['datauser']['password'])) {
                $this->session->set_flashdata('msg', 'Password Salah');
                redirect('operator/changepassword');
            } else {
                if ($cur_pass == $new_pass) {
                    $this->session->set_flashdata('msg', 'Password Tidak Boleh Sama dengan Yang Lama');
                    redirect('operator/changepassword');
                } else {
                    $pass = password_hash($new_pass, PASSWORD_DEFAULT);
                    $this->Ahsp_model->changepassword($pass, $this->session->userdata('nip'));

                    $this->session->set_flashdata('pass', 'Ubah Password');
                    redirect('operator/changepassword');
                }
            }
        }
    }
}
