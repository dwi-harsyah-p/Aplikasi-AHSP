<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ahsp1 extends CI_Controller
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
                redirect('blocked');
            } elseif ($data['role']['role'] == 'User') {
                redirect('blocked');
            }
        }
    }

    public function index()
    {
        $data['judul'] = 'Ahsp1/index';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $data['ahsp_lvl1'] = $this->Ahsp_model->getTable('ahsp_level_1', 'kode_lvl_1')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('ahsp_lv1/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kode1', 'Kode', 'required|trim|is_unique[ahsp_level_1.kode_lvl_1]', [
            'is_unique' => '{field} sudah ada',
            'required' => '{field} harus diisi'
        ]);
        $this->form_validation->set_rules('divisi', 'Divisi', 'required|trim|is_unique[ahsp_level_1.divisi]', [
            'is_unique' => '{field} sudah ada',
            'required' => '{field} harus diisi'
        ]);
        $this->form_validation->set_rules('uraian', 'Uraian', 'required|trim|is_unique[ahsp_level_1.uraian]', [
            'is_unique' => '{field} sudah ada',
            'required' => '{field} harus diisi'
        ]);
        $data['judul'] = 'Tambah Data Ahsp1';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('ahsp_lv1/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Ahsp_model->tambah('ahsp_level_1');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('ahsp1');
        }
    }

    public function hapus($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('ahsp_level_1', 'id', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('ahsp1');
        } else {
            $lv1 = $this->Ahsp_model->getTablewhere('ahsp_level_1', 'id', $id)->row_array();
            $lv2 = $this->Ahsp_model->getTablewhere('ahsp_level_2', 'kode_lvl_1', $lv1['kode_lvl_1']);

            if ($lv2->num_rows() > 0) {
                $this->session->set_flashdata('row', $lv2->num_rows);
                $this->session->set_userdata('kode1', $lv1['kode_lvl_1']);
                redirect('ahsp2');
            } else {
                $this->Ahsp_model->hapus('ahsp_level_1', 'id', $id);
                $this->session->set_flashdata('flash', 'Dihapus');
                redirect('ahsp1');
            }
        }
    }

    public function edit($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('ahsp_level_1', 'id', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('ahsp1');
        } else {
            $data['ahsp'] = $this->Ahsp_model->getTablewhere('ahsp_level_1', 'id', $id)->row_array();
            $this->form_validation->set_rules('kode1', 'Kode', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('divisi', 'Divisi', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('uraian', 'Uraian', 'required|trim', ['required' => '{field} harus diisi']);
            $data['judul'] = 'Edit Data Ahsp1';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('ahsp_lv1/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $this->Ahsp_model->edit('ahsp_level_1');
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('ahsp1');
            }
        }
    }
}
