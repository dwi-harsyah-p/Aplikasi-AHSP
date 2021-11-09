<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ahsp extends CI_Controller
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
        $data['judul'] = 'Data AHSP';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();

        $query = "SELECT DISTINCT ahsp.kode_lvl_4, ahsp_level_4.uraian FROM ahsp INNER JOIN ahsp_level_4 ON ahsp.kode_lvl_4 = ahsp_level_4.kode_lvl_4";
        $data['ahsp'] = $this->db->query($query)->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('ahsp/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $data['judul'] = 'Tambah Data AHSP';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $data['ahsp4'] = $this->Ahsp_model->getTable('ahsp_level_4', 'uraian')->result_array();
        $data['alat'] = $this->Ahsp_model->getTable('alat', 'uraian')->result_array();
        $data['bahan'] = $this->Ahsp_model->getTable('bahan', 'uraian')->result_array();
        $data['upah'] = $this->Ahsp_model->getTable('upah', 'uraian')->result_array();
        $this->form_validation->set_rules('uraian', 'Uraian', 'required|trim', [
            'required' => '{field} harus diisi'
        ]);
        $this->form_validation->set_rules('koefesien_alat', 'Koefesien Alat', 'trim');
        $this->form_validation->set_rules('koefesienbahan', 'Koefesien Bahan', 'trim');
        $this->form_validation->set_rules('koefesienupah', 'Koefesien Upah', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('ahsp/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $countalat = count($this->input->post('id_alat'));
            for ($i = 0; $i < $countalat; $i++) {
                $data = [
                    'kode_lvl_4' => $this->input->post('uraian'),
                    'id_alat' => $this->input->post('id_alat')[$i],
                    'koefesien' => $this->input->post('koe_alat')[$i]
                ];
                $this->db->insert('ahsp', $data);
            }

            $countbahan = count($this->input->post('id_bahan'));
            for ($i = 0; $i < $countbahan; $i++) {
                $data = [
                    'kode_lvl_4' => $this->input->post('uraian'),
                    'id_bahan' => $this->input->post('id_bahan')[$i],
                    'koefesien' => $this->input->post('koe_bahan')[$i]
                ];
                $this->db->insert('ahsp', $data);
            }

            $countupah = count($this->input->post('id_upah'));
            for ($i = 0; $i < $countupah; $i++) {
                $data = [
                    'kode_lvl_4' => $this->input->post('uraian'),
                    'id_upah' => $this->input->post('id_upah')[$i],
                    'koefesien' => $this->input->post('koe_upah')[$i]
                ];
                $this->db->insert('ahsp', $data);
            }
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('ahsp');
        }
    }

    public function hapus($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('ahsp', 'kode_lvl_4', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('ahsp');
        } else {
            $this->Ahsp_model->hapus('ahsp', 'kode_lvl_4', $id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
