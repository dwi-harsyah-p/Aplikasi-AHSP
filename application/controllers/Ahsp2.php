<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ahsp2 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ahsp_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kode = $this->session->userdata('kode');

        // if ($kode) {


        if ($kode && $this->Ahsp_model->getTablewhere('ahsp_level_2', 'kode_lvl_1', $kode)->num_rows() > 0) {
            $data['ahsp'] = $this->Ahsp_model->getTablewhere('ahsp_level_2', 'kode_lvl_1', $kode)->result_array();
            $this->session->unset_userdata('kode');
        } else {
            $data['ahsp'] = $this->Ahsp_model->getTable('ahsp_level_2', 'kode_lvl_2')->result_array();
        }
        $data['judul'] = 'Ahsp2';
        $this->load->view('templates/header', $data);
        $this->load->view('ahsp_lv2/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
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

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('ahsp_lv2/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Ahsp_model->tambah('ahsp_level_2');
            redirect('ahsp2');
        }
    }

    public function hapus($id)
    {
        $this->Ahsp_model->hapus('ahsp_level_2', $id);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function edit($id = null)
    {
        if ($id == null) {
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
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('ahsp_lv2/edit', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->Ahsp_model->edit('ahsp_level_2');
                redirect('ahsp2');
            }
        }
    }
}
