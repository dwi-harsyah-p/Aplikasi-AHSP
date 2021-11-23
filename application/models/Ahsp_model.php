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
                'satuan' => htmlspecialchars($this->input->post('satuan', true))
            ];

            return $this->db->insert($table, $data);
        } elseif ($table == 'alat') {
            $data = [
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'kode' => htmlspecialchars($this->input->post('kode', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true))
            ];

            return $this->db->insert($table, $data);
        } elseif ($table == 'upah') {
            $data = [
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'kode' => htmlspecialchars($this->input->post('kode', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true))
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
        } elseif ($table == 'harga') {
            $kategori = $this->input->post('kategori');
            if ($kategori == 'Alat') {
                $data = [
                    'id_alat' => htmlspecialchars($this->input->post('uraian', true)),
                    'id_daerah' => htmlspecialchars($this->input->post('daerah', true)),
                    'harga' => htmlspecialchars($this->input->post('harga'))
                ];
            } elseif ($kategori == 'Bahan') {
                $data = [
                    'id_bahan' => htmlspecialchars($this->input->post('uraian', true)),
                    'id_daerah' => htmlspecialchars($this->input->post('daerah', true)),
                    'harga' => htmlspecialchars($this->input->post('harga'))
                ];
            } elseif ($kategori == 'Upah') {
                $data = [
                    'id_upah' => htmlspecialchars($this->input->post('uraian', true)),
                    'id_daerah' => htmlspecialchars($this->input->post('daerah', true)),
                    'harga' => htmlspecialchars($this->input->post('harga'))
                ];
            }
            $this->db->set('kategori', $kategori);
            return $this->db->insert($table, $data);
        } elseif ($table == 'operator_alat') {
            $data = [
                'id_alat' => htmlspecialchars($this->input->post('alat', true)),
                'kategori' => 'Alat',
                'id_daerah' => htmlspecialchars($this->input->post('daerah', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true))
            ];

            return $this->db->insert('harga', $data);
        } elseif ($table == 'operator_bahan') {
            $data = [
                'id_bahan' => htmlspecialchars($this->input->post('bahan', true)),
                'kategori' => 'Bahan',
                'id_daerah' => htmlspecialchars($this->input->post('daerah', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true))
            ];

            return $this->db->insert('harga', $data);
        } elseif ($table == 'operator_upah') {
            $data = [
                'id_upah' => htmlspecialchars($this->input->post('upah', true)),
                'kategori' => 'Upah',
                'id_daerah' => htmlspecialchars($this->input->post('daerah', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true))
            ];

            return $this->db->insert('harga', $data);
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
                'satuan' => htmlspecialchars($this->input->post('satuan', true))
            ];
            return $this->db->update($table, $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'alat') {
            $data = [
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'kode' => htmlspecialchars($this->input->post('kode', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true))
            ];
            return $this->db->update($table, $data, ['id' => $this->input->post('id', true)]);
        } elseif ($table == 'upah') {
            $data = [
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'kode' => htmlspecialchars($this->input->post('kode', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true))
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
        } elseif ($table == 'harga') {
            return $this->db->update('harga', ['harga' => htmlspecialchars($this->input->post('harga', true))], ['id' => htmlspecialchars($this->input->post('id'))]);
        } elseif ($table == 'operator_alat') {
            return $this->db->update('harga', ['harga' => htmlspecialchars($this->input->post('harga', true))], ['id' => htmlspecialchars($this->input->post('id'))]);
        } elseif ($table == 'operator_bahan') {
            return $this->db->update('harga', ['harga' => htmlspecialchars($this->input->post('harga', true))], ['id' => htmlspecialchars($this->input->post('id'))]);
        } elseif ($table == 'operator_upah') {
            return $this->db->update('harga', ['harga' => htmlspecialchars($this->input->post('harga', true))], ['id' => htmlspecialchars($this->input->post('id'))]);
        }
    }

    public function changepassword($new_pass, $nip)
    {
        return $this->db->update('user', ['password' => $new_pass], ['nip' => $nip]);
    }

    public function joinuser()
    {
        $query = "SELECT user.nip, nama, password, daerah, role, is_active, date_created FROM user LEFT JOIN user_role ON user_role.id = user.role_id LEFT JOIN biodata on biodata.nip = user.nip LEFT JOIN daerah ON daerah.id=biodata.id_daerah";
        return $this->db->query($query)->result_array();
    }

    public function joinuserwhere($nip)
    {
        $query = "SELECT user.nip, nama, password, role, is_active, date_created FROM user INNER JOIN user_role ON user_role.id = user.role_id INNER JOIN biodata on biodata.nip = user.nip WHERE user.nip = $nip";
        return $this->db->query($query)->row_array();
    }

    public function joinuserdaerah($id)
    {
        $query = "SELECT user.nip, nama, password, daerah, role, is_active, date_created FROM user INNER JOIN user_role ON user_role.id = user.role_id INNER JOIN biodata on biodata.nip = user.nip LEFT JOIN daerah ON daerah.id=biodata.id_daerah WHERE biodata.id_daerah = $id";
        return $this->db->query($query)->result_array();
    }

    public function joinhargaalat($idalat = null, $daerah = null, $id = null)
    {
        if ($idalat && $daerah) {
            $query = "SELECT harga.id, alat.uraian, alat.kode, alat.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN alat ON alat.id = harga.id_alat INNER JOIN daerah ON daerah.id = harga.id_daerah WHERE harga.id_alat = $idalat && daerah.id = $daerah";
        } elseif ($idalat) {
            $query = "SELECT harga.id, alat.uraian, alat.kode, alat.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN alat ON alat.id = harga.id_alat INNER JOIN daerah ON daerah.id = harga.id_daerah WHERE harga.id_alat = $idalat";
        } elseif ($daerah) {
            $query = "SELECT harga.id, alat.uraian, alat.kode, alat.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN alat ON alat.id = harga.id_alat INNER JOIN daerah ON daerah.id = harga.id_daerah WHERE daerah.id = $daerah";
        } elseif ($id) {
            $query = "SELECT harga.id, alat.uraian, alat.kode, alat.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN alat ON alat.id = harga.id_alat INNER JOIN daerah ON daerah.id = harga.id_daerah WHERE harga.id = $id";
        } else {
            $query = "SELECT harga.id, alat.uraian, alat.kode, alat.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN alat ON alat.id = harga.id_alat INNER JOIN daerah ON daerah.id = harga.id_daerah ORDER BY daerah.daerah";
        }
        return $this->db->query($query);
    }

    public function joinhargabahan($idbahan = null, $daerah = null, $id = null)
    {
        if ($idbahan && $daerah) {
            $query = "SELECT harga.id, bahan.uraian, bahan.kode, bahan.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN bahan ON bahan.id = harga.id_bahan INNER JOIN daerah ON daerah.id = harga.id_daerah WHERE harga.id_bahan = $idbahan && daerah.id = $daerah";
        } elseif ($idbahan) {
            $query = "SELECT harga.id, bahan.uraian, bahan.kode, bahan.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN bahan ON bahan.id = harga.id_bahan INNER JOIN daerah ON daerah.id = harga.id_daerah WHERE harga.id_bahan = $idbahan";
        } elseif ($daerah) {
            $query = "SELECT harga.id, bahan.uraian, bahan.kode, bahan.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN bahan ON bahan.id = harga.id_bahan INNER JOIN daerah ON daerah.id = harga.id_daerah WHERE daerah.id = $daerah";
        } elseif ($id) {
            $query = "SELECT harga.id, bahan.uraian, bahan.kode, bahan.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN bahan ON bahan.id = harga.id_bahan INNER JOIN daerah ON daerah.id = harga.id_daerah WHERE harga.id = $id";
        } else {
            $query = "SELECT harga.id, bahan.uraian, bahan.kode, bahan.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN bahan ON bahan.id = harga.id_bahan INNER JOIN daerah ON daerah.id = harga.id_daerah ORDER BY daerah.daerah";
        }
        return $this->db->query($query);
    }

    public function joinhargaupah($idupah = null, $daerah = null, $id = null)
    {
        if ($idupah && $daerah) {
            $query = "SELECT harga.id, upah.uraian, upah.kode, upah.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN upah ON upah.id = harga.id_upah INNER JOIN daerah ON daerah.id = harga.id_daerah WHERE harga.id_upah = $idupah && daerah.id = $daerah";
        } elseif ($idupah) {
            $query = "SELECT harga.id, upah.uraian, upah.kode, upah.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN upah ON upah.id = harga.id_upah INNER JOIN daerah ON daerah.id = harga.id_daerah WHERE harga.id_upah = $idupah";
        } elseif ($daerah) {
            $query = "SELECT harga.id, upah.uraian, upah.kode, upah.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN upah ON upah.id = harga.id_upah INNER JOIN daerah ON daerah.id = harga.id_daerah WHERE daerah.id = $daerah";
        } elseif ($id) {
            $query = "SELECT harga.id, upah.uraian, upah.kode, upah.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN upah ON upah.id = harga.id_upah INNER JOIN daerah ON daerah.id = harga.id_daerah WHERE harga.id = $id";
        } else {
            $query = "SELECT harga.id, upah.uraian, upah.kode, upah.satuan, daerah.daerah, harga.kategori, harga.harga FROM harga INNER JOIN upah ON upah.id = harga.id_upah INNER JOIN daerah ON daerah.id = harga.id_daerah ORDER BY daerah.daerah";
        }
        return $this->db->query($query);
    }
}
