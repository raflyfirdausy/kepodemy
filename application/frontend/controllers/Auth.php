<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends User_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model", "admin");
        $this->load->model("Pembelajar_model", "murid");
    }

    public function index()
    {
        redirect(base_url("auth/login"));
    }

    public function register()
    {
        $this->loadViewUser("auth/register");
    }

    public function register_proses()
    {
        $nama               = $this->input->post("nama", TRUE);
        $no_hp              = $this->input->post("no_hp", TRUE);
        $jabatan            = $this->input->post("jabatan", TRUE);
        $pendidikan         = $this->input->post("pendidikan", TRUE);
        $email              = $this->input->post("email", TRUE);
        $password           = $this->input->post("password", TRUE);
        $retype_password    = $this->input->post("retype_password", TRUE);
        //TODO : CEK EMAIL
        $cekEmail = $this->murid->where(["email" => $email])->get();
        if (!$cekEmail) {
            if ($password == $retype_password) {
                $dataInsert = [
                    "email"         => $email,
                    "password"      => md5($password),
                    "nama"          => $nama,
                    "no_hp"         => $no_hp,
                    "jabatan"       => $jabatan,
                    "pendidikan"    => $pendidikan,
                    "foto"          => NULL,
                    "is_verified"   => 1,
                    "register_by"   => "user"
                ];

                $insert = $this->murid->insert($dataInsert);
                if ($insert) {
                    echo json_encode([
                        "response_code"     => 200,
                        "response_message"  => "Pendaftaran berhasil, silahkan masuk menggunakan email dan password yang telah di daftarkan"
                    ]);
                } else {
                    echo json_encode([
                        "response_code"     => 400,
                        "response_message"  => "Terjadi kesalahan saat mendaftar akun"
                    ]);
                }
            } else {
                echo json_encode([
                    "response_code"     => 400,
                    "response_message"  => "Konfirmasi Password yang anda masukan salah"
                ]);
            }
        } else {
            echo json_encode([
                "response_code"     => 400,
                "response_message"  => "Email yang anda daftarkan telah digunakan. Silahkan menggunakan email yang lain"
            ]);
        }
    }

    public function login()
    {
        $email      = $this->input->post("email", TRUE);
        $password   = md5($this->input->post("password", TRUE));

        $cekCredential = $this->murid->where([
            "email"     => $email,
            "password"  => $password
        ])->get();

        if ($cekCredential) {
            $this->session->set_userdata(SESSION, $cekCredential);
            echo json_encode([
                "response_code"     => 200,
                "response_message"  => "Berhasil Login"
            ]);
        } else {
            echo json_encode([
                "response_code"     => 400,
                "response_message"  => "Email atau password yang anda masukan salah."
            ]);
        }
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
