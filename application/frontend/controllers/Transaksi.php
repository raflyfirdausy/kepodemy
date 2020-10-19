<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends User_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Keranjang_model", "keranjang");
        $this->load->model("Produk_model", "kelas");
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
}
