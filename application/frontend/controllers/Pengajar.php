<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends User_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pengajar_model", "pengajar");
        $this->load->model("Produk_model", "produk");
    }

    public function index()
    {
        $pengajar = $this->pengajar->as_array()->get_all() ?: [];

        for ($i = 0; $i < sizeof($pengajar); $i++) {
            $pengajar[$i]["foto"] = asset("pengajar/" . $pengajar[$i]["foto"]);
        }

        $data = [
            "pengajar"  => $pengajar,
        ];

        $this->loadViewUser("pengajar/index", $data);
    }

    public function detail($slug = "")
    {
        $nama = str_replace("-", " ", $slug);
        $pengajar = $this->pengajar
            ->as_array()
            ->where(["LOWER(nama)" => $nama])
            ->get() ?: redirect(base_url("pengajar"));

        //TODO : CARI KELASNYA
        $produk = $this->produk
            ->where(["id_pengajar" => $pengajar["id"]])
            ->as_array()
            ->get_all() ?: [];

        for ($i = 0; $i < sizeof($produk); $i++) {
            $produk[$i]["gambar"]   = asset("gambar/" . $produk[$i]["gambar"]);
        }

        $pengajar["foto"]   = asset("pengajar/" . $pengajar["foto"]);

        $data = [
            "pengajar"  => $pengajar,
            "produk"    => $produk
        ];

        // d($data);

        $this->loadViewUser("pengajar/detail", $data);
    }
}
