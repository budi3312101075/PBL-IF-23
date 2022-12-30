<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_manajemen');
    }

    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }

    public function laporan()
    {
        $data['tahun'] = $this->M_manajemen->gettahun();
        $data['databarang'] = $this->M_manajemen->getdatabarang();
        $data['datauser'] = $this->M_manajemen->getdatauser();

        $this->load->view('admin/header');
        $this->load->view('admin/laporan', $data);
        $this->load->view('admin/footer');
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

    //menampilkan data pengajuan
    public function konfirmasi()
    {
        $data['admin'] = $this->M_admin->tampil_data()->result();

        $this->load->view('admin/header');
        $this->load->view('admin/konfirmasi', $data);
        $this->load->view('admin/footer');
    } //end

    //hapus data pengajuan
    public function tolakpengajuan($id_pengajuan)
    {
        $where = array('id_pengajuan' => $id_pengajuan);
        $this->M_admin->hapus_data($where, 'pengajuan');
        redirect('admin/konfirmasi');
    } //end

    //edit pengajuan
    public function editpengajuan($id_pengajuan)
    {
        $data['datajenis'] = $this->M_karyawan->getdata();
        $where = array('id_pengajuan' => $id_pengajuan);
        $data['admin'] = $this->M_admin->edit_data($where, 'pengajuan')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/editpengajuan', $data);
        $this->load->view('admin/footer');
    }

    public function edit()
    {
        $id_pengajuan = $this->input->post('id_pengajuan');
        $username = $this->input->post('username');
        $tanggal = $this->input->post('tanggal');
        $deskripsi = $this->input->post('deskripsi');
        $nominal = $this->input->post('nominal');
        $telepon = $this->input->post('telepon');
        $jenis_bantuan = $this->input->post('jenis_bantuan');
        $status = $this->input->post('status');
        $deskripsi_status = $this->input->post('deskripsi_status');

        $data = array(
            'username' => $username,
            'tanggal' => $tanggal,
            'deskripsi' => $deskripsi,
            'nominal' => $nominal,
            'telepon' => $telepon,
            'jenis_bantuan' => $jenis_bantuan,
            'status' => $status,
            'deskripsi_status' => $deskripsi_status,

        );

        $where = array(
            'id_pengajuan' => $id_pengajuan
        );

        $this->M_admin->update_data($where, $data, 'pengajuan');
        redirect('admin/konfirmasi');
    } //end

    //status pengajuan
    public function statuspengajuan($id_pengajuan)
    {
        $where = array('id_pengajuan' => $id_pengajuan);
        $data['admin'] = $this->M_admin->edit_data($where, 'pengajuan')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/statuspengajuan', $data);
        $this->load->view('admin/footer');
    }

    public function editstatus()
    {
        $id_pengajuan = $this->input->post('id_pengajuan');
        $username = $this->input->post('username');
        $nominal = $this->input->post('nominal');
        $status = $this->input->post('status');
        $deskripsi_status = $this->input->post('deskripsi_status');

        $data = array(
            'username' => $username,
            'nominal' => $nominal,
            'status' => $status,
            'deskripsi_status' => $deskripsi_status,

        );

        $where = array(
            'id_pengajuan' => $id_pengajuan
        );

        $this->M_admin->update_data($where, $data, 'pengajuan');
        redirect('admin/konfirmasi');
    } //end

    //terima pengajuan
    public function terimapengajuan($id_pengajuan)
    {
        $where = array('id_pengajuan' => $id_pengajuan);
        $data['admin'] = $this->M_admin->edit_data($where, 'pengajuan')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/terimapengajuan', $data);
        $this->load->view('admin/footer');
    }

    public function terima()
    {
        $id_pengajuan = $this->input->post('id_pengajuan');
        $username = $this->input->post('username');
        $tanggal = $this->input->post('tanggal');
        $deskripsi = $this->input->post('deskripsi');
        $nominal = $this->input->post('nominal');
        $telepon = $this->input->post('telepon');
        $jenis_bantuan = $this->input->post('jenis_bantuan');
        $status = $this->input->post('status');
        $deskripsi_status = $this->input->post('deskripsi_status');
        $bukti_transfer = $_FILES['bukti_transfer'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = 'assets/image_transfer';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti_transfer')) {
                echo "Upload Gagal";
                die();
            } else {
                $bukti_transfer = $this->upload->data('file_name');
            }
        }

        $data = array(
            'username' => $username,
            'tanggal' => $tanggal,
            'deskripsi' => $deskripsi,
            'nominal' => $nominal,
            'telepon' => $telepon,
            'jenis_bantuan' => $jenis_bantuan,
            'status' => $status,
            'deskripsi_status' => $deskripsi_status,
            'bukti_transfer' => $bukti_transfer,

        );

        $where = array(
            'id_pengajuan' => $id_pengajuan
        );

        $this->M_admin->update_data($where, $data, 'pengajuan');
        redirect('admin/konfirmasi');
    } //end

    public function excel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach (range('A', 'H') as $coulumID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($coulumID)->setAutosize(true);
        }
        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Deskripsi');
        $sheet->setCellValue('D1', 'Nominal');
        $sheet->setCellValue('E1', 'Telepon');
        $sheet->setCellValue('F1', 'Jenis Bantuan');
        $sheet->setCellValue('G1', 'Status');
        $sheet->setCellValue('H1', 'Deskripsi Status');

        $users = $this->db->query("SELECT * FROM pengajuan")->result_array();
        $x = 2; //start from row 2
        foreach ($users as $row) {
            $sheet->setCellValue('A' . $x, $row['username']);
            $sheet->setCellValue('B' . $x, $row['tanggal']);
            $sheet->setCellValue('C' . $x, $row['deskripsi']);
            $sheet->setCellValue('D' . $x, $row['nominal']);
            $sheet->setCellValue('E' . $x, $row['telepon']);
            $sheet->setCellValue('F' . $x, $row['jenis_bantuan']);
            $sheet->setCellValue('G' . $x, $row['status']);
            $sheet->setCellValue('H' . $x, $row['deskripsi_status']);
            $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data_pengajuan.xlsx';
        //$writer->save($fileName);  //this is for save in folder


        /* for force download */
        header('Content-Type: appliction/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        $writer->save('php://output');
        /* force download end */
    }

    public function keuangan()
    {
        $data['admin'] = $this->M_admin->tampil_data1()->result();

        $this->load->view('admin/header');
        $this->load->view('admin/keuangan', $data);
        $this->load->view('admin/footer');
    }

    //tambah data keuangan
    public function tambahkeuangan()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/tambahkeuangan');
        $this->load->view('admin/footer');
    }

    public function tambahdatakeuangan()
    {

        $id_users = $this->session->userdata('id_users');
        $username = $this->session->userdata('username');
        $status = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');
        $tanggal = $this->input->post('tanggal');
        $nominal = $this->input->post('nominal');

        $data = array(
            'id_users' => $id_users,
            'username' => $username,
            'status' => $status,
            'keterangan' => $keterangan,
            'tanggal' => $tanggal,
            'nominal' => $nominal,
        );

        $this->M_superadmin->input_data($data, 'keuangan');
        redirect('admin/keuangan');
    } //end

    public function hapuskeuangan($id_keuangan)
    {
        $where = array('id_keuangan' => $id_keuangan);
        $this->M_admin->hapus_data($where, 'keuangan');
        redirect('admin/keuangan');
    }

    public function updatekeuangan($id_keuangan)
    {
        $where = array('id_keuangan' => $id_keuangan);
        $data['admin'] = $this->M_admin->edit_data($where, 'keuangan')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/updatekeuangan', $data);
        $this->load->view('admin/footer');
    }

    public function update1()
    {
        $id_keuangan = $this->input->post('id_keuangan');
        $username = $this->input->post('username');
        $status = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');
        $tanggal = $this->input->post('tanggal');
        $nominal = $this->input->post('nominal');

        $data = array(
            'username' => $username,
            'status' => $status,
            'keterangan' => $keterangan,
            'tanggal' => $tanggal,
            'nominal' => $nominal,
        );

        $where = array(
            'id_keuangan' => $id_keuangan
        );

        $this->M_admin->update_data($where, $data, 'keuangan');
        redirect('admin/keuangan');
    }
}
