<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends Auth_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model", "admin");
    }

    public function index()
    {
        redirect(base_url("auth/login"));
    }

    public function login()
    {

        d("RAFLY WAS HERE!");
        // if ($this->session->has_userdata(SESSION)) {
        //     redirect(base_url("beranda"));
        // }
        // $this->loadView('auth/login-kepodemy');
    }

    public function proses_login()
    {
        // $username   = $this->input->post('username', TRUE);
        // $password   = md5($this->input->post('password', TRUE));

        // $cekLogin  = $this->user
        //     ->where([
        //         "username" => $username,
        //         "password" => $password
        //     ])
        //     ->as_object()
        //     ->get();

        // if ($cekLogin) {
        //     $this->session->set_userdata(SESSION, $cekLogin);
        //     redirect(base_url("beranda"));
        // } else {
        //     $this->session->set_flashdata("gagal", "Username atau password yang anda masukan salah!");
        //     redirect(base_url("auth/login"));
        // }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
