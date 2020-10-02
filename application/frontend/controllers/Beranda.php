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
        $slider     = $this->slider->where(["is_active" => 1])->get_all();
        $kategori   = $this->kategori->as_array()->limit(5)->order_by("id", "RANDOM")->get_all();
        // d($kategori);

        $data = [
            "slider"            => $slider,
            "kategori_populer"  => $kategori
        ];
        $this->loadViewUser('beranda/index', $data);
    }
}
