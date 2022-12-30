<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    //mengatasi error str_replace, severity : 8192
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('M_login');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function ceklogin()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->M_login->cek($username, $password);
        if ($cek->num_rows() == 1) {

            foreach ($cek->result() as $data) {
                $sess_data['username'] = $data->username;
                $sess_data['id_users'] = $data->id_users;
                $sess_data['level'] = $data->level;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('level') == 'admin') {
                redirect('admin');
            } elseif ($this->session->userdata('level') == 'karyawan') {
                redirect('karyawan');
            } elseif ($this->session->userdata('level') == 'superadmin') {
                redirect('superadmin');
            } elseif ($this->session->userdata('level') == 'manajemen') {
                redirect('manajemen');
            } elseif ($this->session->userdata('level') == 'BLOK') {
                echo "Akun anda terblokir silahkan hubungi admin DAP";
            }
        } else {
            $this->session->set_flashdata('pesan', 'Maaf, kombinasi username dengan password salah.');
            redirect('Login');
        }
    }

    public function homesuperadmin()
    {
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/home');
        $this->load->view('superadmin/footer');
    }

    public function homeadmin()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }

    public function homemanajemen()
    {
        $this->load->view('manajemen/header');
        $this->load->view('manajemen/home');
        $this->load->view('manajemen/footer');
    }

    public function homekaryawan()
    {
        $this->load->view('karyawan/header');
        $this->load->view('karyawan/home');
        $this->load->view('karyawan/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
