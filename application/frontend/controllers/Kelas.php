<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends User_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kategori_model", "kategori");
        $this->load->model("Produk_model", "kelas");
        $this->load->model("Produk_kategori_model", "kelas_detail");
        $this->load->model("Keranjang_model", "keranjang");
    }

    public function index($slug = NULL)
    {
        //TODO : GET ALL KELAS
        $idKelas = NULL;
        $findKelas = $this->kelas->get_all() ?: [];
        foreach ($findKelas as $kls) {
            if (slug($kls->nama) == $slug) {
                $idKelas = $kls->id;
                break;
            }
        }
        if ($idKelas == NULL) redirect(base_url("topik"));

        //TODO : GET DATA DETAIL KELAS
        $detailKelas = $this->kelas
            ->as_array()
            ->with_pengajar("fields:id,nama,foto,jabatan,deskripsi")
            ->with_produk_kategori([
                "fields" => "id,keterangan",
                "with" => [
                    "relation" => "kategori",
                    "fields" => "nama,slug,keterangan,gambar"
                ]
            ])
            ->get($idKelas);

        //TODO : GET SUDAH MASUK KERANJANG BELUM
        $keranjang = FALSE;
        if ($this->session->has_userdata(SESSION)) {
            $keranjang = $this->keranjang
                ->where([
                    "id_pembelajar" => $this->userData->id,
                    "id_produk"     => $idKelas,
                ])->get() ? TRUE : FALSE;
        }

        //TODO : PREPARE DATA
        $data = [
            "kelas"         => $detailKelas,
            "isKeranjang"   => $keranjang
        ];
        $this->loadViewUser("kelas/index", $data);
    }
}
