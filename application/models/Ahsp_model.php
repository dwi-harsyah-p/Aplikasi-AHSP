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
        } elseif ($table == 'bahan') {
            $data = [
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'kode' => htmlspecialchars($this->input->post('kode', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true))
            ];

            return $this->db->insert($table, $data);
        } elseif ($table == 'alat') {
            $data = [
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true))
            ];

            return $this->db->insert($table, $data);
        } elseif ($table == 'upah') {
            $data = [
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true))
            ];

            return $this->db->insert($table, $data);
        } elseif ($table == 'user') {
            $pass = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
            $datauser = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'password' => htmlspecialchars($pass),
                'role_id' => htmlspecialchars($this->input->post('role', true)),
                'is_active' => htmlspecialchars($this->input->post('active', true)),
                'date_created' => time()
            ];
            $biouser = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tgl_lahir' => '01-01-0001',
                'jenis_kelamin' => '',
                'image' => 'default.jpg',
                'alamat' => '',
                'id_daerah' => htmlspecialchars($this->input->post('daerah', true)),
                'no_telp' => ''
            ];

            $this->db->insert($table, $datauser);
            return $this->db->insert('biodata', $biouser);
        } elseif ($table == 'daerah') {
            $data = [
                'daerah' => htmlspecialchars($this->input->post('daerah', true)),
            ];

            return $this->db->insert($table, $data);
        }
    }

    public function getTable($table, $orderby)
    {
        $this->db->order_by($orderby, 'ASC');
        return $this->db->get($table);
    }

    public function hapus($table, $where, $value)
    {
        return $this->db->delete($table, [$where => $value]);
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
            return $this->db->update($table, $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'ahsp_level_2') {
            $data = [
                'kode_lvl_1' => htmlspecialchars($this->input->post('kode1', true)),
                'kode_lvl_2' => htmlspecialchars($this->input->post('kode2', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true))
            ];
            return $this->db->update($table, $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'ahsp_level_3') {
            $data = [
                'kode_lvl_2' => htmlspecialchars($this->input->post('kode2', true)),
                'kode_lvl_3' => htmlspecialchars($this->input->post('kode3', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true))
            ];
            return $this->db->update($table, $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'ahsp_level_4') {
            $data = [
                'kode_lvl_3' => htmlspecialchars($this->input->post('kode3', true)),
                'kode_lvl_4' => htmlspecialchars($this->input->post('kode4', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true))
            ];
            return $this->db->update($table, $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'biodata') {
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('ttl', true)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('gender', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'id_daerah' => htmlspecialchars($this->input->post('daerah', true)),
                'no_telp' => htmlspecialchars($this->input->post('phone', true))
            ];
            $this->db->update($table, $data, ['nip' => $this->input->post('nipcek', true)]);
            $this->db->update('user', ['nip' => htmlspecialchars($this->input->post('nip', true))], ['nip' => $this->input->post('nipcek', true)]);
        } elseif ($table == 'bahan') {
            $data = [
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'kode' => htmlspecialchars($this->input->post('kode', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true)),
            ];
            return $this->db->update($table, $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'alat') {
            $data = [
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true)),
            ];
            return $this->db->update($table, $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'upah') {
            $data = [
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true)),
            ];
            return $this->db->update($table, $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'user') {
            $data = [
                'role_id' => htmlspecialchars($this->input->post('role', true)),
                'is_active' => htmlspecialchars($this->input->post('active', true))
            ];
            return $this->db->update($table, $data, ['nip' => $this->input->post('nip', true)]);
        } elseif ($table == 'userpass') {
            return $this->db->update('user', ['password' => password_hash($this->input->post('newpassword', true), PASSWORD_DEFAULT)], ['nip' => $this->input->post('nip', true)]);
        } elseif ($table == 'daerah') {
            $data = [
                'daerah' => htmlspecialchars($this->input->post('daerah', true))
            ];
            return $this->db->update($table, $data, ['id' => $this->input->post('id', true)]);
        }
    }

    public function changepassword($new_pass, $nip)
    {
        return $this->db->update('user', ['password' => $new_pass], ['nip' => $nip]);
    }

    public function joinuser()
    {
        $query = "SELECT user.nip, nama, password, daerah, role, is_active, date_created FROM user INNER JOIN user_role ON user_role.id = user.role_id INNER JOIN biodata on biodata.nip = user.nip INNER JOIN daerah ON daerah.id=biodata.id_daerah";
        return $this->db->query($query)->result_array();
    }
    public function joinuserwhere($nip)
    {
        $query = "SELECT user.nip, nama, password, role, is_active, date_created FROM user INNER JOIN user_role ON user_role.id = user.role_id INNER JOIN biodata on biodata.nip = user.nip WHERE user.nip = $nip";
        return $this->db->query($query)->row_array();
    }
    public function joinhargawhere($daerah)
    {
        $query = "SELECT uraian, kode, satuan, harga FROM bahan LEFT JOIN harga ON harga.id_bahan = bahan.id WHERE harga.id_daerah = $daerah";
        return $this->db->query($query)->result_array();
    }
}
