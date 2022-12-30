<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    public function index()
    {
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/home');
        $this->load->view('superadmin/footer');
    }

    public function konfirmasi()
    {
        $data['admin'] = $this->M_admin->tampil_data()->result();

        $this->load->view('superadmin/header');
        $this->load->view('superadmin/konfirmasi', $data);
        $this->load->view('superadmin/footer');
    }

    //menampilkan data kriteria
    public function kriteria()
    {
        $data['superadmin'] = $this->M_superadmin->tampil_data()->result();

        $this->load->view('superadmin/header');
        $this->load->view('superadmin/kriteria', $data);
        $this->load->view('superadmin/footer');
    } //end

    public function laporan()
    {
        $data['tahun'] = $this->M_manajemen->gettahun();
        $data['databarang'] = $this->M_manajemen->getdatabarang();
        $data['datauser'] = $this->M_manajemen->getdatauser();

        $this->load->view('superadmin/header');
        $this->load->view('superadmin/laporan', $data);
        $this->load->view('superadmin/footer');
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

    //edit kriteria
    public function editkriteria($id_kriteria)
    {
        $where = array('id_kriteria' => $id_kriteria);
        $data['superadmin'] = $this->M_superadmin->edit_data($where, 'kriteria_dap')->result();
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/editkriteria', $data);
        $this->load->view('superadmin/footer');
    }

    public function edit()
    {
        $id_kriteria = $this->input->post('id_kriteria');
        $jenis_bantuan = $this->input->post('jenis_bantuan');
        $nominal = $this->input->post('nominal');
        $keterangan = $this->input->post('keterangan');
        $dokumen = $this->input->post('dokumen');

        $data = array(
            'jenis_bantuan' => $jenis_bantuan,
            'nominal' => $nominal,
            'keterangan' => $keterangan,
            'dokumen' => $dokumen,

        );

        $where = array(
            'id_kriteria' => $id_kriteria
        );

        $this->M_superadmin->update_data($where, $data, 'kriteria_dap');
        redirect('superadmin/kriteria');
    }
    //end

    //hapus kriteria
    public function hapuskriteria($id_kriteria)
    {
        $where = array('id_kriteria' => $id_kriteria);
        $this->M_superadmin->hapus_data($where, 'kriteria_dap');
        redirect('superadmin/kriteria');
    }

    //tambahkriteria
    public function tambahkriteria()
    {
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/tambahkriteria');
        $this->load->view('superadmin/footer');
    }

    public function tambah()
    {
        $id_users = $this->session->userdata('id_users');
        $jenis_bantuan = $this->input->post('jenis_bantuan');
        $nominal = $this->input->post('nominal');
        $keterangan = $this->input->post('keterangan');
        $dokumen = $this->input->post('dokumen');


        $data = array(
            'id_users' => $id_users,
            'jenis_bantuan' => $jenis_bantuan,
            'nominal' => $nominal,
            'keterangan' => $keterangan,
            'dokumen' => $dokumen,
        );

        $this->M_superadmin->input_data($data, 'kriteria_dap');
        redirect('superadmin/kriteria');
    }
    //end

    //baca data pengguna
    public function data_pengguna()
    {
        $data['datapengguna'] = $this->M_superadmin->tampilpengguna()->result();

        $this->load->view('superadmin/header');
        $this->load->view('superadmin/data_pengguna', $data);
        $this->load->view('superadmin/footer');
    }

    //tambah data pengguna
    public function tambahpengguna()
    {
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/tambahpengguna');
        $this->load->view('superadmin/footer');
    }

    public function tambahdatapengguna()
    {
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $level = $this->input->post('level');

        $data = array(
            'username' => $username,
            'nama' => $nama,
            'password' => $password,
            'no_telp' => $no_telp,
            'email' => $email,
            'level' => $level,
        );

        $this->M_superadmin->input_data($data, 'user');
        redirect('superadmin/data_pengguna');
    } //end

    //block data pengguna
    public function blockdata($id_users)
    {
        $where = array('id_users' => $id_users);
        $data['superadmin'] = $this->M_superadmin->edit_data($where, 'user')->result();
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/blockdata', $data);
        $this->load->view('superadmin/footer');
    }

    public function block()
    {
        $id_users = $this->input->post('id_users');
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('no_telp');
        $level = $this->input->post('level');

        $data = array(
            'id_users' => $id_users,
            'username' => $username,
            'nama' => $nama,
            'no_telp' => $no_telp,
            'level' => $level,

        );

        $where = array(
            'id_users' => $id_users
        );

        $this->M_superadmin->update_data($where, $data, 'user');
        redirect('superadmin/data_pengguna');
    } //end

    public function hapusdata($id_users)
    {
        $where = array('id_users' => $id_users);
        $this->M_superadmin->hapus_data($where, 'user');
        redirect('superadmin/data_pengguna');
    }

    public function keuangan()
    {
        $data['admin'] = $this->M_admin->tampil_data1()->result();

        $this->load->view('superadmin/header');
        $this->load->view('superadmin/keuangan', $data);
        $this->load->view('superadmin/footer');
    }

    public function tolakpengajuan($id_pengajuan)
    {
        $where = array('id_pengajuan' => $id_pengajuan);
        $this->M_admin->hapus_data($where, 'pengajuan');
        redirect('superadmin/konfirmasi');
    }

    //mulai
    public function editpengajuan($id_pengajuan)
    {
        $data['datajenis'] = $this->M_karyawan->getdata();
        $where = array('id_pengajuan' => $id_pengajuan);
        $data['admin'] = $this->M_admin->edit_data($where, 'pengajuan')->result();
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/editpengajuan', $data);
        $this->load->view('superadmin/footer');
    }

    public function edit1()
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
        redirect('superadmin/konfirmasi');
    } //end

    //status pengajuan
    public function statuspengajuan($id_pengajuan)
    {
        $where = array('id_pengajuan' => $id_pengajuan);
        $data['admin'] = $this->M_admin->edit_data($where, 'pengajuan')->result();
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/statuspengajuan', $data);
        $this->load->view('superadmin/footer');
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
        redirect('superadmin/konfirmasi');
    } //end

    //terima pengajuan
    public function terimapengajuan($id_pengajuan)
    {
        $where = array('id_pengajuan' => $id_pengajuan);
        $data['admin'] = $this->M_admin->edit_data($where, 'pengajuan')->result();
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/terimapengajuan', $data);
        $this->load->view('superadmin/footer');
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
        redirect('superadmin/konfirmasi');
    } //end

    //tambah data keuangan
    public function tambahkeuangan()
    {
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/tambahkeuangan');
        $this->load->view('superadmin/footer');
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
        redirect('superadmin/keuangan');
    } //end

    public function hapuskeuangan($id_keuangan)
    {
        $where = array('id_keuangan' => $id_keuangan);
        $this->M_admin->hapus_data($where, 'keuangan');
        redirect('superadmin/keuangan');
    }

    public function updatekeuangan($id_keuangan)
    {
        $where = array('id_keuangan' => $id_keuangan);
        $data['admin'] = $this->M_admin->edit_data($where, 'keuangan')->result();
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/updatekeuangan', $data);
        $this->load->view('superadmin/footer');
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
        redirect('superadmin/keuangan');
    }
}
