<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daerah extends CI_Controller
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
        $data['judul'] = 'Data Daerah';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $data['daerah'] = $this->Ahsp_model->getTable('daerah', 'daerah')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('daerah/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules('daerah', 'daerah', 'required|trim|is_unique[daerah.daerah]', [
            'is_unique' => '{field} sudah ada',
            'required' => '{field} harus diisi'
        ]);
        $data['judul'] = 'Tambah Data Daerah';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('daerah/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Ahsp_model->tambah('daerah');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('daerah');
        }
    }

    public function hapus($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('daerah', 'id', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('daerah');
        } else {

            $daerah = $this->Ahsp_model->getTablewhere('daerah', 'id', $id)->row_array();
            $harga = $this->Ahsp_model->getTablewhere('harga', 'id_daerah', $daerah['id']);

            if ($harga->num_rows() > 0) {
                $this->session->set_flashdata('row', $harga->num_rows);
                $this->session->set_userdata('daerah', $daerah['id']);
                redirect('harga');
            } else {
                $this->Ahsp_model->hapus('daerah', 'id', $id);
                $this->session->set_flashdata('flash', 'Dihapus');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function edit($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('daerah', 'id', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('daerah');
        } else {
            $data['daerah'] = $this->Ahsp_model->getTablewhere('daerah', 'id', $id)->row_array();
            $this->form_validation->set_rules('daerah', 'daerah', 'required|trim', ['required' => '{field} harus diisi']);
            $data['judul'] = 'Edit Data Daerah';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('daerah/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $this->Ahsp_model->edit('daerah');
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('daerah');
            }
        }
    }
}
