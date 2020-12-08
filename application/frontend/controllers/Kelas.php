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
        $this->load->model("Transaksidetail_model", "detail");
        $this->load->model("Transaksi_model", "transaksi");
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
                "fields"    => "id,keterangan",
                "with"      => [
                    "relation"  => "kategori",
                    "fields"    => "nama,slug,keterangan,gambar"
                ]
            ])
            ->get($idKelas);

        //TODO : GET SUDAH MASUK KERANJANG BELUM
        $keranjang = FALSE;
        $cekKelas = FALSE;
        if ($this->session->has_userdata(SESSION)) {
            $keranjang = $this->keranjang
                ->where([
                    "id_pembelajar" => $this->userData->id,
                    "id_produk"     => $idKelas,
                ])->get() ? TRUE : FALSE;

            //TODO : CEK KELASNYA UDAH DI BELI BELUM
            $cekKelas = $this->detail
                ->where([
                    "id_produk"         => $idKelas,
                    "id_pembelajar"     => $this->userData->id
                ])
                ->with_transaksi()
                ->get();
        }


        // d($cekKelas->transaksi->status_bayar);
        //TODO : PREPARE DATA
        $data = [
            "kelas"         => $detailKelas,
            "isKeranjang"   => $keranjang,
            "cekKelas"      => $cekKelas
        ];
        $this->loadViewUser("kelas/index", $data);
    }

    public function bayar($idKelas  = NULL)
    {
        $id = $idKelas;

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
                    redirect(base_url("keranjang"));
                } else {
                    $this->session->set_flashdata("gagal", "Terjadi Kesalahan saat menambahkan ke keranjang");
                    redirect(base_url("keranjang"));
                }
            } else {
                redirect(base_url("keranjang"));
            }
        } else {
            $this->session->set_flashdata("gagal", "Gagal menambahkan kelas ke keranjang, silahkan masuk menggunakan akun anda terlebih dahulu");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
