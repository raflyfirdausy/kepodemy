<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends User_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->userData == NULL) {
            redirect(base_url());
        }
        $this->load->model("Keranjang_model", "keranjang");
        $this->load->model("Produk_model", "kelas");
        $this->load->model("Transaksi_model", "transaksi");
        $this->load->model("Transaksidetail_model", "detail");
    }

    public function index()
    {
        redirect(base_url("transaksi/saya"));
    }

    public function addToCart()
    {
        $id = $this->input->post("id", TRUE);

        if ($this->userData) {
            //TODO : CEK DI KERANJANG
            $cekKeranjang = $this->keranjang
                ->where([
                    "id_pembelajar"     => $this->userData->id,
                    "id_produk"         => $id,
                    "status"            => 0, // 0 : BELUM DI PROSES | 1 : SUDAH DI PROSES
                ])
                ->get();

            if (!$cekKeranjang) {
                //TODO : INSERT INTO KERANJANG
                $dataInsert = [
                    "id_pembelajar"     => $this->userData->id,
                    "id_produk"         => $id,
                    "status"            => 0,
                ];
                $insert = $this->keranjang->insert($dataInsert);
                if ($insert) {
                    echo json_encode([
                        "response_code"     => 200,
                        "response_message"  => "Berhasil menambahkan kelas ke keranjang",
                    ]);
                } else {
                    echo json_encode([
                        "response_code"     => 405,
                        "response_message"  => "Terjadi Kesalahan saat menambahkan ke keranjang",
                    ]);
                }
            } else {
                echo json_encode([
                    "response_code"     => 405,
                    "response_message"  => "Kelas Sudah ditambahkan ke keranjang",
                ]);
            }
        } else {
            echo json_encode([
                "response_code"     => 403,
                "response_message"  => "Gagal menambahkan kelas ke keranjang, silahkan masuk menggunakan akun anda terlebih dahulu",
            ]);
        }
    }

    public function detail($kodeTransaksi = NULL)
    {
        $cek = $this->transaksi
            ->where([
                "id_pembelajar"     => $this->userData->id,
                "kode_transaksi"    => $kodeTransaksi
            ])
            ->as_array()
            ->with_transaksidetail([
                "with"      => [
                    "relation"  => "produk",
                    "fields"    => "nama,slug,keterangan,gambar"
                ]
            ])
            ->get();

        if (!$cek) {
            $this->session->set_flashdata("gagal", "Transaksi Tidak ditemukan");
            redirect(base_url("keranjang"));
        }


        $data = [
            "data"    => $cek
        ];
        $this->loadViewUser("transaksi/info_bayar", $data);
    }

    public function config($lokasiArsip, $namafilebaru)
    {
        $config  = [
            "upload_path"       => $lokasiArsip,
            "allowed_types"     => 'gif|jpg|jpeg|png',
            "max_size"          => 10240,
            "file_ext_tolower"  => FALSE,
            "overwrite"         => TRUE,
            "remove_spaces"     => TRUE,
            "file_name"         => $namafilebaru
        ];

        return $config;
    }

    public function upload()
    {
        $kodeTransaksi = $this->input->post("kode_transaksi", TRUE);

        $cek = $this->transaksi
            ->as_array()
            ->where([
                "id_pembelajar"     => $this->userData->id,
                "kode_transaksi"    => $kodeTransaksi
            ])
            ->get();

        if ($cek) {
            $namafilebaru =  "bukti_" . $$kodeTransaksi . "_" . time() . "." . pathinfo($_FILES["bukti_pembayaran"]["name"], PATHINFO_EXTENSION);
            $lokasiArsip = "assets/bukti/";
            $config = $this->config($lokasiArsip, $namafilebaru);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($_FILES["bukti_pembayaran"]["name"] != '') {
                if ($this->upload->do_upload("bukti_pembayaran")) {
                    $update = $this->transaksi->where(["id" => $cek["id"]])->update(["bukti_bayar" => $namafilebaru]);
                    if ($update) {
                        $this->session->set_flashdata("sukses", "Bukti pembayaran berhasil di upload");
                        // redirect(base_url("keranjang"));
                        redirect($_SERVER['HTTP_REFERER']);
                    } else {
                        $this->session->set_flashdata("gagal", "Terjadi kesalahan saat upload bukti pembayaran");
                        // redirect(base_url("keranjang"));
                        redirect(redirect($_SERVER['HTTP_REFERER']));
                    }
                } else {
                    $this->session->set_flashdata("gagal", $this->upload->display_errors("", ""));
                    // redirect(base_url("keranjang"));
                    redirect(redirect($_SERVER['HTTP_REFERER']));
                }
            } else {
                $this->session->set_flashdata("gagal", "Gambar tidak ditemukan");
                // redirect(base_url("keranjang"));
                redirect(redirect($_SERVER['HTTP_REFERER']));
            }
        } else {
            $this->session->set_flashdata("gagal", "Transaksi tidak ditemukan");
            // redirect(base_url("keranjang"));
            redirect(redirect($_SERVER['HTTP_REFERER']));
        }
    }

    public function saya()
    {
        $transaksi = $this->transaksi
            ->as_array()
            ->where([
                "id_pembelajar" => $this->userData->id,
            ])
            ->with_transaksidetail([
                "with"      => [
                    "relation"  => "produk",
                    "fields"    => "nama,slug,keterangan,gambar"
                ]
            ])
            ->get_all() ?: [];

        // d($transaksi);
        $data = [
            "transaksi" => $transaksi
        ];
        $this->loadViewUser("transaksi/saya", $data);
    }
}
