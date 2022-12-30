<?php
class M_karyawan extends CI_Model
{
    function getdata()
    {
        $query = $this->db->query("SELECT * FROM kriteria_dap ORDER BY jenis_bantuan ASC");

        return $query->result();
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tampil_data()
    {
        return $this->db->get('pengajuan');
    }

    public function tampil_data1()
    {
        $this->db->where('pengajuan.id_users', $this->session->userdata('id_users'));
        return $this->db->get('pengajuan')->result();
    }
}
