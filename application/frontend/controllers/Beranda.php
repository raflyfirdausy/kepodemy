<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends User_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Slider_model", "slider");
        $this->load->model("Kategori_model", "kategori");
    }

    public function index()
    {
        //TODO : FIND SLIDER
        $slider     = $this->slider->where(["is_active" => 1])->get_all();

        //TODO : FIND KATEGORI POPULER
        $kategori   = $this->kategori
            ->as_array()
            ->limit(5)
            ->order_by("id", "RANDOM")
            ->with_produk_kategori()
            ->get_all() ?: [];

        for ($i = 0; $i < sizeof($kategori); $i++) {
            $kategori[$i]["produk_kategori"] = isset($kategori[$i]["produk_kategori"]) ? $kategori[0]["produk_kategori"] : [];
        }

        // d($kategori[0]);

        //TODO : PREPARE DATA
        $data = [
            "slider"            => $slider,
            "kategori_populer"  => $kategori
        ];
        $this->loadViewUser('beranda/index', $data);
    }
}
