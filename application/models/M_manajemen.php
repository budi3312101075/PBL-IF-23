<?php
class M_manajemen extends CI_Model
{
    public function gettahun()
    {
        $query = $this->db->query("SELECT YEAR(tanggal) AS tahun FROM pengajuan GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal) ASC");

        return $query->result();
    }

    public function filterbytanggal($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * FROM pengajuan where tanggal BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal ASC ");

        return $query->result();
    }

    public function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT * FROM pengajuan where YEAR(tanggal) = '$tahun1' and MONTH(tanggal) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tanggal ASC ");

        return $query->result();
    }

    public function filterbytahun($tahun2)
    {
        $query = $this->db->query("SELECT * FROM pengajuan where YEAR(tanggal) = '$tahun2'  ORDER BY tanggal ASC ");

        return $query->result();
    }

    public function getdatabarang()
    {
        $query = $this->db->query("SELECT * FROM pengajuan ORDER BY jenis_bantuan ASC ");

        return $query->result();
    }

    public function getdatauser()
    {
        $query = $this->db->query("SELECT * FROM pengajuan ORDER BY username ASC ");

        return $query->result();
    }

    public function filterbytahun3($tahun3)
    {
        $query = $this->db->query("SELECT * FROM pengajuan where YEAR(tanggal) = '$tahun3'  ORDER BY tanggal ASC ");

        return $query->result();
    }

    public function filterbyjenis($where)
    {
        $query = $this->db->get_where('pengajuan', $where);

        return $query->result();
    }
}
