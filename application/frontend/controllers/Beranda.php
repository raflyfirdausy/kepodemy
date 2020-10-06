<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends User_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Slider_model", "slider");
        $this->load->model("Kategori_model", "kategori");
        $this->load->model("Produk_model", "kelas");
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

        //TODO : FIND KELAS POPULER
        $kelas = $this->kelas
            ->as_array()
            ->limit(4)
            ->where(["tipe_produk" => "kelas"])
            ->order_by("id", "RANDOM")
            ->with_pengajar("fields:nama,email,jabatan,no_hp")
            ->get_all() ?: [];


        //TODO : FIND KELAS TERDEKAT
        $terdekat = $this->kelas
            ->as_array()
            ->limit(4)
            ->where(["tipe_produk" => "kelas"])
            ->where("tanggal >=", date("Y-m-d"))
            ->order_by("tanggal", "asc")
            ->with_pengajar("fields:nama,email,jabatan,no_hp")
            ->get_all() ?: [];
        // d($terdekat);
              
        //TODO : PREPARE DATA
        $data = [
            "slider"            => $slider,
            "kategori_populer"  => $kategori,
            "kelas"             => $kelas,
            "terdekat"          => $terdekat,            
        ];
        $this->loadViewUser('beranda/index', $data);
    }

   
}
