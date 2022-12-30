<?php
class M_admin extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('pengajuan');
    }

    public function tampil_data1()
    {
        return $this->db->get('keuangan');
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
