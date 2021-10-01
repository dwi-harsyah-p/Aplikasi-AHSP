<?php
class User_model extends CI_Model
{
    public function getTable($table, $orderby)
    {
        $this->db->order_by($orderby, 'ASC');
        return $this->db->get($table);
    }

    public function getTablewhere($table, $where, $value)
    {
        // return $this->db->get_where($table, $id)->row_array();
        return $this->db->get_where($table, [$where => $value]);
    }

    public function changepassword($new_pass, $nip)
    {
        return $this->db->update('user', ['password' => $new_pass], ['nip' => $nip]);
    }
}
