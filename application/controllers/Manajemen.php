<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen extends CI_Controller
{
    public function index()
    {
        $this->load->view('manajemen/header');
        $this->load->view('manajemen/home');
        $this->load->view('manajemen/footer');
    }

    public function laporan()
    {
        $data['tahun'] = $this->M_manajemen->gettahun();
        $data['databarang'] = $this->M_manajemen->getdatabarang();
        $data['datauser'] = $this->M_manajemen->getdatauser();

        $this->load->view('manajemen/header');
        $this->load->view('manajemen/laporan', $data);
        $this->load->view('manajemen/footer');
    }

    function filter()
    {
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');

        //tambahan untuk berdasarkan jenis
        $jenis_bantuan = $this->input->post('jenis_bantuan');
        $username = $this->input->post('username');
        $tahun3 = $this->input->post('tahun3');

        if ($nilaifilter == 1) {
            $data['title'] = "Laporan DAP Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . ' sampai tanggal: ' . $tanggalakhir;
            $data['datafilter'] = $this->M_manajemen->filterbytanggal($tanggalawal, $tanggalakhir);

            $this->load->view('print_laporan', $data);
        } elseif ($nilaifilter == 2) {
            $data['title'] = "Laporan DAP Berdasarkan Bulan";
            $data['subtitle'] = "Dari Bulan : " . $bulanawal . ' sampai Bulan: ' . $bulanakhir . ' Tahun :' . $tahun1;
            $data['datafilter'] = $this->M_manajemen->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('print_laporan', $data);
        } elseif ($nilaifilter == 3) {
            $data['title'] = "Laporan DAP Berdasarkan Tahun";
            $data['subtitle'] = ' Tahun : ' . $tahun2;
            $data['datafilter'] = $this->M_manajemen->filterbytahun($tahun2);

            $this->load->view('print_laporan', $data);
        } elseif ($nilaifilter == 4) {
            $data['title'] = "Laporan DAP Berdasarkan Tahun";
            $data['subtitle'] = ' Tahun : ' . $tahun3;

            if ($jenis_bantuan == null and $username == null) {
                $data['datafilter'] = $this->M_manajemen->filterbytahun3($tahun3);
            } else {
                if ($username == null) {
                    $where = array(
                        'YEAR(tanggal)' => $tahun3,
                        'jenis_bantuan' => $jenis_bantuan,
                    );
                    $data['datafilter'] = $this->M_manajemen->filterbyjenis($where);
                } elseif ($jenis_bantuan == null) {
                    $where = array(
                        'YEAR(tanggal)' => $tahun3,
                        'username' => $username,
                    );
                    $data['datafilter'] = $this->M_manajemen->filterbyjenis($where);
                } else {
                    $where = array(
                        'YEAR(tanggal)' => $tahun3,
                        'username' => $username,
                        'jenis_bantuan' => $jenis_bantuan,
                    );
                    $data['datafilter'] = $this->M_manajemen->filterbyjenis($where);
                }
            }


            $this->load->view('print_laporan', $data);
        }
    }
}
