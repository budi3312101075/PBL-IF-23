<?php
class M_superadmin extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('kriteria_dap');
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tampilpengguna()
    {
        return $this->db->get('user');
    }
}
