<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends User_Controller
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
    }

    public function index()
    {
        echo "RAFLY WAS HERE";
    }
}
