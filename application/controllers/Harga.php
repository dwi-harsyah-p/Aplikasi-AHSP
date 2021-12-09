<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Harga extends CI_Controller
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
        $alat = $this->session->userdata('alat');
        $bahan = $this->session->userdata('bahan');
        $upah = $this->session->userdata('upah');
        $daerah = $this->session->userdata('daerah');
        if ($alat) {
            $data['alat'] = $this->Ahsp_model->joinhargaalat($alat)->result_array();
            $this->session->unset_userdata('alat');
            $data['bahan'] = null;
            $data['upah'] = null;
        } elseif ($bahan) {
            $data['bahan'] = $this->Ahsp_model->joinhargabahan($bahan)->result_array();
            $this->session->unset_userdata('bahan');
            $data['alat'] = null;
            $data['upah'] = null;
        } elseif ($upah) {
            $data['upah'] = $this->Ahsp_model->joinhargaupah($upah)->result_array();
            $this->session->unset_userdata('upah');
            $data['alat'] = null;
            $data['bahan'] = null;
        } elseif ($daerah) {
            $data['alat'] = $this->Ahsp_model->joinhargaalat(null, $daerah)->result_array();
            $data['bahan'] = $this->Ahsp_model->joinhargabahan(null, $daerah)->result_array();
            $data['upah'] = $this->Ahsp_model->joinhargaupah(null, $daerah)->result_array();
            $this->session->unset_userdata('daerah');
        } else {
            $data['alat'] = $this->Ahsp_model->joinhargaalat()->result_array();
            $data['bahan'] = $this->Ahsp_model->joinhargabahan()->result_array();
            $data['upah'] = $this->Ahsp_model->joinhargaupah()->result_array();
        }
        $data['judul'] = 'Harga';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('harga/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getUraian()
    {
        $id = $this->input->post('id');
        if ($id == 'Alat') {
            $data = $this->Ahsp_model->getTable('alat', 'uraian')->result_array();
        } elseif ($id == 'Bahan') {
            $data = $this->Ahsp_model->getTable('bahan', 'uraian')->result_array();
        } elseif ($id == 'Upah') {
            $data = $this->Ahsp_model->getTable('upah', 'uraian')->result_array();
        } else {
            $data = [];
        }
        echo json_encode($data);
    }

    public function tambah()
    {
        if ($this->Ahsp_model->getTable('alat', 'id')->num_rows() < 1) {
            $this->session->set_flashdata('msg', 'Harus isi Data Alat Terlebih Dahulu!');
            redirect('alat/tambah');
        } elseif ($this->Ahsp_model->getTable('bahan', 'id')->num_rows() < 1) {
            $this->session->set_flashdata('msg', 'Harus isi Data Bahan Terlebih Dahulu!');
            redirect('bahan/tambah');
        } elseif ($this->Ahsp_model->getTable('upah', 'id')->num_rows() < 1) {
            $this->session->set_flashdata('msg', 'Harus isi Data Upah Terlebih Dahulu!');
            redirect('upah/tambah');
        } else {
            $data['daerah'] = $this->Ahsp_model->getTable('daerah', 'id')->result_array();
            $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('uraian', 'Uraian', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('daerah', 'Daerah', 'required|trim', ['required' => '{field} harus diisi']);
            $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
                'numeric' => '{field} Harus Nomor',
                'required' => '{field} harus diisi'
            ]);
            $data['judul'] = 'Insert Data Harga';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('harga/tambah', $data);
                $this->load->view('templates/footer', $data);
            } else {
                if ($this->input->post('kategori') == 'Alat' && $this->Ahsp_model->joinhargaalat($this->input->post('uraian'), $this->input->post('daerah'))->result_array()) {
                    $this->session->set_userdata('err', '<small class="form-text text-danger">Data Sudah Ada!</small>');
                    $this->load->view('templates/header', $data);
                    $this->load->view('harga/tambah', $data);
                    $this->load->view('templates/footer', $data);
                } else if ($this->input->post('kategori') == 'Bahan' && $this->Ahsp_model->joinhargabahan($this->input->post('uraian'), $this->input->post('daerah'))->result_array()) {
                    $this->session->set_userdata('err', '<small class="form-text text-danger">Data Sudah Ada!</small>');
                    $this->load->view('templates/header', $data);
                    $this->load->view('harga/tambah', $data);
                    $this->load->view('templates/footer', $data);
                } elseif ($this->input->post('kategori') == 'Upah' && $this->Ahsp_model->joinhargaupah($this->input->post('uraian'), $this->input->post('daerah'))->result_array()) {
                    $this->session->set_userdata('err', '<small class="form-text text-danger">Data Sudah Ada!</small>');
                    $this->load->view('templates/header', $data);
                    $this->load->view('harga/tambah', $data);
                    $this->load->view('templates/footer', $data);
                } else {
                    $this->Ahsp_model->tambah('harga');
                    $this->session->set_flashdata('flash', 'Ditambahkan');
                    redirect('harga');
                }
            }
        }
    }

    public function hapus($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('harga', 'id', $id)->num_rows();
        if ($id == null || $data['cekid'] < 1) {
            redirect('harga');
        } else {
            $this->Ahsp_model->hapus('harga', 'id', $id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function edit($id = null)
    {
        $data['cekid'] = $this->Ahsp_model->getTablewhere('harga', 'id', $id)->row_array();
        if ($id == null || $data['cekid'] < 1) {
            redirect('harga');
        } else {
            if ($data['cekid']['kategori'] == 'Alat') {
                $data['harga'] = $this->Ahsp_model->joinhargaalat(null, null, $id)->row_array();
            } elseif ($data['cekid']['kategori'] == 'Bahan') {
                $data['harga'] = $this->Ahsp_model->joinhargabahan(null, null, $id)->row_array();
            } elseif ($data['cekid']['kategori'] == 'Upah') {
                $data['harga'] = $this->Ahsp_model->joinhargaupah(null, null, $id)->row_array();
            }
            $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
                'numeric' => '{field} Harus Nomor',
                'required' => '{field} harus diisi'
            ]);
            $data['judul'] = 'Edit Data Harga';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('harga/edit', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->Ahsp_model->edit('harga');
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('harga');
            }
        }
    }
}
