<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ahsp4 extends CI_Controller
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
        $kode = $this->session->userdata('kode3');
        if ($kode) {
            $data['ahsp'] = $this->Ahsp_model->getTablewhere('ahsp_level_4', 'kode_lvl_3', $kode)->result_array();
            $this->session->unset_userdata('kode3');
        } else {
            $data['ahsp'] = $this->Ahsp_model->getTable('ahsp_level_4', 'kode_lvl_4')->result_array();
        }
        $data['judul'] = 'Ahsp4';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('ahsp_lv4/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        if ($this->Ahsp_model->getTable('ahsp_level_3', 'kode_lvl_3')->num_rows() < 1) {
            $this->session->set_flashdata('msg', 'Harus isi Level 3 Terlebih Dahulu!');
            redirect('ahsp3/tambah');
        } else {
            $data['ahsp'] = $this->Ahsp_model->getTable('ahsp_level_3', 'kode_lvl_3')->result_array();
            $this->form_validation->set_rules('kode3', 'Kode', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('kode4', 'Kode', 'required|trim|is_unique[ahsp_level_4.kode_lvl_4]', [
                'is_unique' => '{field} sudah ada',
                'required' => '{field} harus diisi'
            ]);
            $this->form_validation->set_rules('uraian', 'Uraian', 'required|trim|is_unique[ahsp_level_4.uraian]', [
                'is_unique' => '{field} sudah ada',
                'required' => '{field} harus diisi'
            ]);
            $data['judul'] = 'Insert AHSP Level 4';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            if ($this->form_validation->run() == false) {
                if ($this->form_validation->run() == false && $this->input->post('kode3') . '.' == $this->input->post('kode4')) {
                    $this->session->set_userdata('err', '<small class="form-text text-danger">Silakan tambahkan kode belakang</small>');
                    $this->load->view('templates/header', $data);
                    $this->load->view('ahsp_lv4/tambah', $data);
                    $this->load->view('templates/footer', $data);
                } else {
                    $this->load->view('templates/header', $data);
                    $this->load->view('ahsp_lv4/tambah', $data);
                    $this->load->view('templates/footer', $data);
                }
            } elseif ($this->input->post('kode3') . '.' == $this->input->post('kode4')) {
                $this->session->set_userdata('err', '<small class="form-text text-danger">Silakan tambahkan kode belakang</small>');
                $this->load->view('templates/header', $data);
                $this->load->view('ahsp_lv4/tambah', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->Ahsp_model->tambah('ahsp_level_4');
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('ahsp4');
            }
        }
    }

    public function hapus($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('ahsp_level_4', 'id', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('ahsp4');
        } else {
            $this->Ahsp_model->hapus('ahsp_level_4', $id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function edit($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('ahsp_level_4', 'id', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('ahsp4');
        } else {
            $data['ahsp'] = $this->Ahsp_model->getTablewhere('ahsp_level_4', 'id', $id)->row_array();
            $data['lvl3'] = $this->Ahsp_model->getTable('ahsp_level_3', 'kode_lvl_3')->result_array();

            $this->form_validation->set_rules('kode3', 'Kode', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('kode4', 'Kode', 'required|trim', [
                'required' => '{field} harus diisi'
            ]);
            $this->form_validation->set_rules('uraian', 'Uraian', 'required|trim', [
                'required' => '{field} harus diisi'
            ]);
            $data['judul'] = 'Edit Data Ahsp4';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            if ($this->form_validation->run() == false) {
                if ($this->form_validation->run() == false && $this->input->post('kode3') . '.' == $this->input->post('kode4')) {
                    $this->session->set_userdata('err', '<small class="form-text text-danger">Silakan tambahkan kode belakang</small>');
                    $this->load->view('templates/header', $data);
                    $this->load->view('ahsp_lv4/edit', $data);
                    $this->load->view('templates/footer', $data);
                } else {
                    $this->load->view('templates/header', $data);
                    $this->load->view('ahsp_lv4/edit', $data);
                    $this->load->view('templates/footer', $data);
                }
            } elseif ($this->input->post('kode3') . '.' == $this->input->post('kode4')) {
                $this->session->set_userdata('err', '<small class="form-text text-danger">Silakan tambahkan kode belakang</small>');
                $this->load->view('templates/header', $data);
                $this->load->view('ahsp_lv4/edit', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->Ahsp_model->edit('ahsp_level_4');
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('ahsp4');
            }
        }
    }
}
