<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ahsp2 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Harus Login Terlebih Dahulu!</div>');
            $this->session->set_userdata('re', 'ahsp2');
            redirect('auth');
        }
        $this->session->unset_userdata('re');
    }

    public function index()
    {
        $kode = $this->session->userdata('kode1');
        if ($kode) {
            $data['ahsp'] = $this->Ahsp_model->getTablewhere('ahsp_level_2', 'kode_lvl_1', $kode)->result_array();
            $this->session->unset_userdata('kode1');
        } else {
            $data['ahsp'] = $this->Ahsp_model->getTable('ahsp_level_2', 'kode_lvl_2')->result_array();
        }
        $data['judul'] = 'Ahsp2';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('ahsp_lv2/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        if ($this->Ahsp_model->getTable('ahsp_level_1', 'kode_lvl_1')->num_rows() < 1) {
            $this->session->set_flashdata('msg', 'Harus isi Level 1 Terlebih Dahulu!');
            redirect('ahsp1/tambah');
        } else {
            $data['ahsp'] = $this->Ahsp_model->getTable('ahsp_level_1', 'kode_lvl_1')->result_array();
            $this->form_validation->set_rules('kode1', 'Kode', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('kode2', 'Kode', 'required|trim|is_unique[ahsp_level_2.kode_lvl_2]', [
                'is_unique' => '{field} sudah ada',
                'required' => '{field} harus diisi'
            ]);
            $this->form_validation->set_rules('uraian', 'Uraian', 'required|trim|is_unique[ahsp_level_2.uraian]', [
                'is_unique' => '{field} sudah ada',
                'required' => '{field} harus diisi'
            ]);
            $data['judul'] = 'Insert AHSP Level 2';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            if ($this->form_validation->run() == false) {
                if ($this->form_validation->run() == false && $this->input->post('kode1') . '.' == $this->input->post('kode2')) {
                    $this->session->set_userdata('err', '<small class="form-text text-danger">Silakan tambahkan kode belakang</small>');
                    $this->load->view('templates/header', $data);
                    $this->load->view('ahsp_lv2/tambah', $data);
                    $this->load->view('templates/footer', $data);
                } else {
                    $this->load->view('templates/header', $data);
                    $this->load->view('ahsp_lv2/tambah', $data);
                    $this->load->view('templates/footer', $data);
                }
            } elseif ($this->input->post('kode1') . '.' == $this->input->post('kode2')) {
                $this->session->set_userdata('err', '<small class="form-text text-danger">Silakan tambahkan kode belakang</small>');
                $this->load->view('templates/header', $data);
                $this->load->view('ahsp_lv2/tambah', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->Ahsp_model->tambah('ahsp_level_2');
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('ahsp2');
            }
        }
    }

    public function hapus($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('ahsp_level_2', 'id', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('ahsp2');
        } else {
            $lv2 = $this->Ahsp_model->getTablewhere('ahsp_level_2', 'id', $id)->row_array();
            $lv3 = $this->Ahsp_model->getTablewhere('ahsp_level_3', 'kode_lvl_2', $lv2['kode_lvl_2']);

            if ($lv3->num_rows() > 0) {
                $this->session->set_flashdata('row', $lv3->num_rows);
                $this->session->set_userdata('kode2', $lv2['kode_lvl_2']);
                redirect('ahsp3');
            } else {
                $this->Ahsp_model->hapus('ahsp_level_2', 'id', $id);
                $this->session->set_flashdata('flash', 'Dihapus');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function edit($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('ahsp_level_2', 'id', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('ahsp2');
        } else {
            $data['ahsp'] = $this->Ahsp_model->getTablewhere('ahsp_level_2', 'id', $id)->row_array();
            $data['lvl1'] = $this->Ahsp_model->getTable('ahsp_level_1', 'kode_lvl_1')->result_array();

            $this->form_validation->set_rules('kode1', 'Kode', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('kode2', 'Kode', 'required|trim', [
                'required' => '{field} harus diisi'
            ]);
            $this->form_validation->set_rules('uraian', 'Uraian', 'required|trim', [
                'required' => '{field} harus diisi'
            ]);
            $data['judul'] = 'Edit Data Ahsp2';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            if ($this->form_validation->run() == false) {
                if ($this->form_validation->run() == false && $this->input->post('kode1') . '.' == $this->input->post('kode2')) {
                    $this->session->set_userdata('err', '<small class="form-text text-danger">Silakan tambahkan kode belakang</small>');
                    $this->load->view('templates/header', $data);
                    $this->load->view('ahsp_lv2/edit', $data);
                    $this->load->view('templates/footer', $data);
                } else {
                    $this->load->view('templates/header', $data);
                    $this->load->view('ahsp_lv2/edit', $data);
                    $this->load->view('templates/footer', $data);
                }
            } elseif ($this->input->post('kode1') . '.' == $this->input->post('kode2')) {
                $this->session->set_userdata('err', '<small class="form-text text-danger">Silakan tambahkan kode belakang</small>');
                $this->load->view('templates/header', $data);
                $this->load->view('ahsp_lv2/edit', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->Ahsp_model->edit('ahsp_level_2');
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('ahsp2');
            }
        }
    }
}
