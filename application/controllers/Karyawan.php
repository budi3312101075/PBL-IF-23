<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('Login');
		}
		$this->load->model('M_karyawan');
	}

	public function index()
	{
		$this->load->view('karyawan/header');
		$this->load->view('karyawan/home');
		$this->load->view('karyawan/footer');
	}

	public function kriteria()
	{
		$data['superadmin'] = $this->M_superadmin->tampil_data()->result();

		$this->load->view('karyawan/header');
		$this->load->view('karyawan/kriteria', $data);
		$this->load->view('karyawan/footer');
	}

	public function laporan()
	{
		$data['tahun'] = $this->M_manajemen->gettahun();
		$data['databarang'] = $this->M_manajemen->getdatabarang();
		$data['datauser'] = $this->M_manajemen->getdatauser();

		$this->load->view('karyawan/header');
		$this->load->view('karyawan/laporan', $data);
		$this->load->view('karyawan/footer');
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

			$this->load->view('karyawan/print_laporan', $data);
		} elseif ($nilaifilter == 2) {
			$data['title'] = "Laporan DAP Berdasarkan Bulan";
			$data['subtitle'] = "Dari Bulan : " . $bulanawal . ' sampai Bulan: ' . $bulanakhir . ' Tahun :' . $tahun1;
			$data['datafilter'] = $this->M_manajemen->filterbybulan($tahun1, $bulanawal, $bulanakhir);

			$this->load->view('karyawan/print_laporan', $data);
		} elseif ($nilaifilter == 3) {
			$data['title'] = "Laporan DAP Berdasarkan Tahun";
			$data['subtitle'] = ' Tahun : ' . $tahun2;
			$data['datafilter'] = $this->M_manajemen->filterbytahun($tahun2);

			$this->load->view('karyawan/print_laporan', $data);
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


			$this->load->view('karyawan/print_laporan', $data);
		}
	}

	public function status()
	{
		$data['karyawan'] = $this->M_karyawan->tampil_data1();

		$this->load->view('karyawan/header');
		$this->load->view('karyawan/status', $data);
		$this->load->view('karyawan/footer');
	}

	public function pengajuan()
	{
		$data['datajenis'] = $this->M_karyawan->getdata();

		$this->load->view('karyawan/header');
		$this->load->view('karyawan/pengajuan', $data);
		$this->load->view('karyawan/footer');
	}

	public function tambah_pengajuan()
	{
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'danaamalpolibatam@gmail.com',
			'smtp_pass' => 'tmxx jxos ivne wqei',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('danaamalpolibatam@gmail.com', 'DAP');
		$this->email->to('danaamalpolibatam@gmail.com');
		$this->email->subject('Pengajuan DAP');
		$this->email->message('ada pengajuan silahkan untuk cek segera');
		$this->email->send();

		$id_users = $this->session->userdata('id_users');
		$username = $this->session->userdata('username');
		$tanggal = $this->input->post('tanggal');
		$telepon = $this->input->post('telepon');
		$nominal = $this->input->post('nominal');
		$deskripsi = $this->input->post('deskripsi');
		$jenis_bantuan = $this->input->post('jenis_bantuan');
		$bukti = $_FILES['bukti'];
		if ($foto = '') {
		} else {
			$config['upload_path'] = 'assets/image';
			$config['allowed_types'] = 'jpg|png|jpeg';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('bukti')) {
				echo "Upload Gagal";
				die();
			} else {
				$bukti = $this->upload->data('file_name');
			}
		}


		$data = array(
			'id_users' => $id_users,
			'username' => $username,
			'tanggal' => $tanggal,
			'telepon' => $telepon,
			'nominal' => $nominal,
			'deskripsi' => $deskripsi,
			'jenis_bantuan' => $jenis_bantuan,
			'bukti' => $bukti,
		);

		$this->M_karyawan->input_data($data, 'pengajuan');
		redirect('karyawan/index');
	}
}
