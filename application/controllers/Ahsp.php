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
        $data['user_role'] = $this->Ahsp_model->getTablewhere('user', 'nip', $this->session->userdata('nip'))->row_array();
        $data['role'] = $this->Ahsp_model->getTablewhere('user_role', 'id', $data['user_role']['role_id'])->row_array();
        if ($data['role']['role'] == 'Operator') {
            redirect('ahsp/detail');
        } elseif ($data['role']['role'] == 'User') {
            redirect('ahsp/detail');
        }else{ 
            $data['judul'] = 'Data AHSP';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            $alat = $this->session->userdata('alat');
            $bahan = $this->session->userdata('bahan');
            $upah = $this->session->userdata('upah');
            if ($alat) {
                $query = "SELECT DISTINCT ahsp.kode_lvl_4, ahsp_level_4.uraian FROM ahsp INNER JOIN ahsp_level_4 ON ahsp.kode_lvl_4 = ahsp_level_4.kode_lvl_4 WHERE id_alat = $alat";
                $this->session->unset_userdata('alat');
            } elseif ($bahan) {
                $query = "SELECT DISTINCT ahsp.kode_lvl_4, ahsp_level_4.uraian FROM ahsp INNER JOIN ahsp_level_4 ON ahsp.kode_lvl_4 = ahsp_level_4.kode_lvl_4 WHERE id_bahan = $bahan";
                $this->session->unset_userdata('bahan');;
            } elseif ($upah) {
                $query = "SELECT DISTINCT ahsp.kode_lvl_4, ahsp_level_4.uraian FROM ahsp INNER JOIN ahsp_level_4 ON ahsp.kode_lvl_4 = ahsp_level_4.kode_lvl_4 WHERE id_upah = $upah";
                $this->session->unset_userdata('upah');
            } else {
                $query = "SELECT DISTINCT ahsp.kode_lvl_4, ahsp_level_4.uraian FROM ahsp INNER JOIN ahsp_level_4 ON ahsp.kode_lvl_4 = ahsp_level_4.kode_lvl_4";
            }
            $data['ahsp'] = $this->db->query($query)->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('ahsp/index', $data);
            $this->load->view('templates/footer', $data);
        }        
    }

    public function getUraian()
    {
        $id = $this->input->post('id');        
        if ($id) {
            $data = $this->Ahsp_model->getTablewhere('ahsp_level_4', 'kode_lvl_3', $id)->result_array();
        } else {
            $data = [];
        }
        echo json_encode($data);
    }

    public function tambah()
    {
        $data['user_role'] = $this->Ahsp_model->getTablewhere('user', 'nip', $this->session->userdata('nip'))->row_array();
        $data['role'] = $this->Ahsp_model->getTablewhere('user_role', 'id', $data['user_role']['role_id'])->row_array();
        if ($data['role']['role'] == 'Operator') {
            redirect('ahsp/detail');
        } elseif ($data['role']['role'] == 'User') {
            redirect('ahsp/detail');
        }else{
            $data['judul'] = 'Tambah Data AHSP';
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            $data['ahsp3'] = $this->Ahsp_model->getTable('ahsp_level_3', 'uraian')->result_array();
            $data['alat'] = $this->Ahsp_model->getTable('alat', 'uraian')->result_array();
            $data['bahan'] = $this->Ahsp_model->getTable('bahan', 'uraian')->result_array();
            $data['upah'] = $this->Ahsp_model->getTable('upah', 'uraian')->result_array();
            $this->form_validation->set_rules('level4', 'Uraian', 'required|trim|is_unique[ahsp.kode_lvl_4]', [
                'is_unique' => '{field} sudah ada',
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
                        'kode_lvl_4' => $this->input->post('level4'),
                        'id_alat' => $this->input->post('id_alat')[$i],
                        'koefesien' => $this->input->post('koe_alat')[$i]
                    ];
                    $this->db->insert('ahsp', $data);
                }

                $countbahan = count($this->input->post('id_bahan'));
                for ($i = 0; $i < $countbahan; $i++) {
                    $data = [
                        'kode_lvl_4' => $this->input->post('level4'),
                        'id_bahan' => $this->input->post('id_bahan')[$i],
                        'koefesien' => $this->input->post('koe_bahan')[$i]
                    ];
                    $this->db->insert('ahsp', $data);
                }

                $countupah = count($this->input->post('id_upah'));
                for ($i = 0; $i < $countupah; $i++) {
                    $data = [
                        'kode_lvl_4' => $this->input->post('level4'),
                        'id_upah' => $this->input->post('id_upah')[$i],
                        'koefesien' => $this->input->post('koe_upah')[$i]
                    ];
                    $this->db->insert('ahsp', $data);
                }
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('ahsp');
            }
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

    public function detail()
    {
        $data['judul'] = 'Detail Data AHSP';
        $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
        $data['ahsp3'] = $this->Ahsp_model->getTable('ahsp_level_3', 'uraian')->result_array();
        if ($this->input->post('level4')) {
            $data['kode4'] = $this->input->post('level4');
            $data['ahsp4'] = $this->Ahsp_model->getTablewhere('ahsp_level_4', 'kode_lvl_4', $data['kode4'])->row_array();
            $data['ahsp'] = $this->Ahsp_model->getTablewhere('ahsp', 'kode_lvl_4', $data['kode4'])->result_array();            
            if ($data['ahsp'] == null) {
                $this->load->view('templates/user/header', $data);
                $this->load->view('ahsp/nodata', $data);
                $this->load->view('templates/user/footer');
            } else {
                
            foreach ($data['ahsp'] as $key => $value) {
                if ($value['id_alat'] == 0) {
                    continue;
                }
                $data['alat'][] = $this->db->query("SELECT alat.uraian, alat.kode, alat.satuan, harga.harga, ahsp.koefesien FROM alat INNER JOIN harga ON alat.id = harga.id_alat INNER JOIN ahsp ON alat.id = ahsp.id_alat WHERE alat.id = " . $value['id_alat'] . " AND harga.id_daerah = " . $data['user']['id_daerah'] . " AND kode_lvl_4 = '" . $data['kode4'] . "'")->row_array();
            }
            foreach ($data['ahsp'] as $key => $value) {
                if ($value['id_bahan'] == 0) {
                    continue;
                }
                $data['bahan'][] = $this->db->query("SELECT bahan.uraian, bahan.kode, bahan.satuan, harga.harga, ahsp.koefesien FROM bahan INNER JOIN harga ON bahan.id = harga.id_bahan INNER JOIN ahsp ON bahan.id = ahsp.id_bahan WHERE bahan.id = " . $value['id_bahan'] . " AND harga.id_daerah = " . $data['user']['id_daerah'] . " AND kode_lvl_4 = '" . $data['kode4'] . "'")->row_array();
            }
            foreach ($data['ahsp'] as $key => $value) {
                if ($value['id_upah'] == 0) {
                    continue;
                }
                $data['upah'][] = $this->db->query("SELECT upah.uraian, upah.kode, upah.satuan, harga.harga, ahsp.koefesien FROM upah INNER JOIN harga ON upah.id = harga.id_upah INNER JOIN ahsp ON upah.id = ahsp.id_upah WHERE upah.id = " . $value['id_upah'] . " AND harga.id_daerah = " . $data['user']['id_daerah'] . " AND kode_lvl_4 = '" . $data['kode4'] . "'")->row_array();                
            }            
            $data['total_alat'] = $this->db->query("SELECT sum((harga.harga * ahsp.koefesien) + harga.harga) AS total FROM harga INNER JOIN ahsp ON harga.id_alat = ahsp.id_alat INNER JOIN daerah ON harga.id_daerah = daerah.id WHERE ahsp.kode_lvl_4 = '" . $data['kode4'] . "'" . " AND NOT ahsp.id_alat = 0 AND daerah.id = " . $data['user']['id_daerah'])->row_array();
            $data['total_bahan'] = $this->db->query("SELECT sum((harga.harga * ahsp.koefesien) + harga.harga) AS total FROM harga INNER JOIN ahsp ON harga.id_bahan = ahsp.id_bahan INNER JOIN daerah ON harga.id_daerah = daerah.id WHERE ahsp.kode_lvl_4 = '" . $data['kode4'] . "'" . " AND NOT ahsp.id_bahan = 0 AND daerah.id = " . $data['user']['id_daerah'])->row_array();
            $data['total_upah'] = $this->db->query("SELECT sum((harga.harga * ahsp.koefesien) + harga.harga) AS total FROM harga INNER JOIN ahsp ON harga.id_upah = ahsp.id_upah INNER JOIN daerah ON harga.id_daerah = daerah.id WHERE ahsp.kode_lvl_4 = '" . $data['kode4'] . "'" . " AND NOT ahsp.id_upah = 0 AND daerah.id = " . $data['user']['id_daerah'])->row_array();
            $this->load->view('templates/user/header', $data);                
            $this->load->view('ahsp/ahsp', $data);            
            $this->load->view('templates/user/footer');
        }
    }else {
            $this->load->view('templates/user/header', $data);
            $this->load->view('ahsp/detail', $data);
            $this->load->view('templates/user/footer');
        }       
    }    

    public function edit($id = null)
    {
        $data['user_role'] = $this->Ahsp_model->getTablewhere('user', 'nip', $this->session->userdata('nip'))->row_array();
        $data['role'] = $this->Ahsp_model->getTablewhere('user_role', 'id', $data['user_role']['role_id'])->row_array();
        if ($data['role']['role'] == 'Operator') {
            redirect('ahsp/detail');
        } elseif ($data['role']['role'] == 'User') {
            redirect('ahsp/detail');
        }else{
            $data['judul'] = "Edit Data AHSP";
            $data['user'] = $this->Ahsp_model->getTablewhere('biodata', 'nip', $this->session->userdata('nip'))->row_array();
            $data['ahsp4'] = $this->Ahsp_model->getTablewhere('ahsp_level_4', 'kode_lvl_4', $id)->row_array();
            $data['ahsp3'] = $this->Ahsp_model->getTablewhere('ahsp_level_3', 'kode_lvl_3', $data['ahsp4']['kode_lvl_3'])->row_array();
            $data['ahsp'] = $this->Ahsp_model->getTablewhere('ahsp', 'kode_lvl_4', $id)->result_array();
            $data['alat'] = $this->Ahsp_model->getTable('alat', 'id')->result_array();
            $data['bahan'] = $this->Ahsp_model->getTable('bahan', 'id')->result_array();
            $data['upah'] = $this->Ahsp_model->getTable('upah', 'id')->result_array();
            

            $data['alatahsp'] = $this->db->query("SELECT ahsp.id, ahsp.kode_lvl_4, ahsp.id_alat, alat.uraian, ahsp.koefesien FROM `ahsp` INNER JOIN alat ON ahsp.id_alat = alat.id WHERE ahsp.kode_lvl_4 = '$id' and not ahsp.id_alat = 0")->result_array();
            $data['bahanahsp'] = $this->db->query("SELECT ahsp.id, ahsp.kode_lvl_4, ahsp.id_bahan, bahan.uraian, ahsp.koefesien FROM `ahsp` INNER JOIN bahan ON ahsp.id_bahan = bahan.id WHERE ahsp.kode_lvl_4 = '$id' and not ahsp.id_bahan = 0")->result_array();
            $data['upahahsp'] = $this->db->query("SELECT ahsp.id, ahsp.kode_lvl_4, ahsp.id_upah, upah.uraian, ahsp.koefesien FROM `ahsp` INNER JOIN upah ON ahsp.id_upah = upah.id WHERE ahsp.kode_lvl_4 = '$id' and not ahsp.id_upah = 0")->result_array();                         
 
            $this->load->view('templates/header', $data);
            $this->load->view('ahsp/edit', $data);
            $this->load->view('templates/footer');
        }
    }
}
