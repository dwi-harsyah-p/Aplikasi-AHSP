<?php
class Ahsp_model extends CI_Model
{
    public function tambah($table)
    {
        if ($table == 'ahsp_level_1') {
            $data = [
                'kode_lvl_1' => htmlspecialchars($this->input->post('kode1', true)),
                'divisi' => htmlspecialchars($this->input->post('divisi', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true))
            ];

            return $this->db->insert($table, $data);
        } elseif ($table == 'ahsp_level_2') {
            $data = [
                'kode_lvl_1' => htmlspecialchars($this->input->post('kode1', true)),
                'kode_lvl_2' => htmlspecialchars($this->input->post('kode2', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true))
            ];

            return $this->db->insert($table, $data);
        } elseif ($table == 'ahsp_level_3') {
            $data = [
                'kode_lvl_2' => htmlspecialchars($this->input->post('kode2', true)),
                'kode_lvl_3' => htmlspecialchars($this->input->post('kode3', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true))
            ];

            return $this->db->insert($table, $data);
        } elseif ($table == 'ahsp_level_4') {
            $data = [
                'kode_lvl_3' => htmlspecialchars($this->input->post('kode3', true)),
                'kode_lvl_4' => htmlspecialchars($this->input->post('kode4', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true))
            ];

            return $this->db->insert($table, $data);
        }
    }

    public function getTable($table, $orderby)
    {
        $this->db->order_by($orderby, 'ASC');
        return $this->db->get($table);
    }

    public function hapus($table, $id)
    {
        return $this->db->delete($table, ['id' => $id]);
    }

    public function getTablewhere($table, $where, $value)
    {
        // return $this->db->get_where($table, $id)->row_array();
        return $this->db->get_where($table, [$where => $value]);
    }

    public function edit($table)
    {
        if ($table == 'ahsp_level_1') {
            $data = [
                'kode_lvl_1' => htmlspecialchars($this->input->post('kode1', true)),
                'divisi' => htmlspecialchars($this->input->post('divisi', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true))
            ];
            $this->db->update('ahsp_level_1', $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'ahsp_level_2') {
            $data = [
                'kode_lvl_1' => htmlspecialchars($this->input->post('kode1', true)),
                'kode_lvl_2' => htmlspecialchars($this->input->post('kode2', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true))
            ];
            $this->db->update('ahsp_level_2', $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'ahsp_level_3') {
            $data = [
                'kode_lvl_2' => htmlspecialchars($this->input->post('kode2', true)),
                'kode_lvl_3' => htmlspecialchars($this->input->post('kode3', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true))
            ];
            $this->db->update('ahsp_level_3', $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'ahsp_level_4') {
            $data = [
                'kode_lvl_3' => htmlspecialchars($this->input->post('kode3', true)),
                'kode_lvl_4' => htmlspecialchars($this->input->post('kode4', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true))
            ];
            $this->db->update('ahsp_level_4', $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'biodata') {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama')),
                'tgl_lahir' => htmlspecialchars($this->input->post('ttl')),
                'jenis_kelamin' => htmlspecialchars($this->input->post('gender')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'no_telp' => htmlspecialchars($this->input->post('phone'))
            ];
            $this->db->update('biodata', $data, ['nip' => $this->session->userdata('nip')]);
        }
    }

    public function changepassword($new_pass, $nip)
    {
        return $this->db->update('user', ['password' => $new_pass], ['nip' => $nip]);
    }

    public function Joinahsp12()
    {
        $query = "SELECT * FROM ahsp_level_2 LEFT JOIN ahsp_level_1 on ahsp_level_1.kode_lvl_1 = ahsp_level_2.kode_lvl_1";
        return $this->db->query($query)->row_array();
    }
}
