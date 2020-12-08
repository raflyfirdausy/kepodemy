<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_saya extends User_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->userData == NULL) {
            redirect(base_url());
        }
        $this->load->model("Kategori_model", "kategori");
        $this->load->model("Produk_model", "kelas");
        $this->load->model("Produk_kategori_model", "kelas_detail");
        $this->load->model("Keranjang_model", "keranjang");
        $this->load->model("Transaksidetail_model", "detail");
        $this->load->model("Transaksi_model", "transaksi");
    }

    public function index($kodeTransaksi = NULL)
    {
        $cek = $this->transaksi
            ->where([
                "id_pembelajar"     => $this->userData->id,
                "kode_transaksi"    => $kodeTransaksi
            ])
            ->get();

        d($cek);
    }
}
