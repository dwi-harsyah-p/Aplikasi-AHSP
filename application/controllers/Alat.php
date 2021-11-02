<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alat extends CI_Controller
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
        $data['judul'] = 'Data Alat';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $data['alat'] = $this->Ahsp_model->getTable('alat', 'uraian')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('alat/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules('uraian', 'Uraian', 'required|trim|is_unique[alat.uraian]', [
            'is_unique' => '{field} sudah ada',
            'required' => '{field} harus diisi'
        ]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim', [
            'required' => '{field} harus diisi'
        ]);
        $data['judul'] = 'Tambah Data Alat';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('alat/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Ahsp_model->tambah('alat');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('alat');
        }
    }

    public function hapus($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('alat', 'id', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('alat');
        } else {
            $alat = $this->Ahsp_model->getTablewhere('alat', 'id', $id)->row_array();
            $harga = $this->Ahsp_model->getTablewhere('harga', 'id_alat', $alat['id']);

            if ($harga->num_rows() > 0) {
                $this->session->set_flashdata('row', $harga->num_rows);
                $this->session->set_userdata('alat', $alat['id']);
                redirect('harga');
            } else {
                $this->Ahsp_model->hapus('alat', 'id', $id);
                $this->session->set_flashdata('flash', 'Dihapus');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function edit($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('alat', 'id', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('alat');
        } else {
            $data['alat'] = $this->Ahsp_model->getTablewhere('alat', 'id', $id)->row_array();
            $this->form_validation->set_rules('uraian', 'Uraian', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim', ['required' => '{field} harus diisi']);
            $data['judul'] = 'Edit Data Alat';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('alat/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $this->Ahsp_model->edit('alat');
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('alat');
            }
        }
    }
}
