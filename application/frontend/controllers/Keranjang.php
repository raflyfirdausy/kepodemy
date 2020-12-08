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
        $this->load->model("Keranjang_model", "keranjang");
        $this->load->model("Transaksi_model", "transaksi");
        $this->load->model("Transaksidetail_model", "detail");
    }

    public function index()
    {
        $keranjang = $this->keranjang
            ->where([
                "id_pembelajar" => $this->userData->id,
                "status"        => 0
            ])
            ->with_produk()
            ->as_object()
            ->get_all() ?: [];
        // d($keranjang);
        $data = [
            "keranjang"     => $keranjang
        ];
        $this->loadViewUser("keranjang/index", $data);
    }

    public function hapus($x = "")
    {
        //TODO : CEK ADA ENGGA    
        $id = base64_decode(urldecode($x));
        $cek = $this->keranjang
            ->where([
                "id"            => $id,
                "id_pembelajar" => $this->userData->id,
            ])
            ->as_object()
            ->with_produk()
            ->get();
        // d($cek);
        if ($cek) {
            $delete = $this->keranjang->delete($id);
            if ($delete) {
                $this->session->set_flashdata("sukses", $cek->produk->nama .  " berhasil di hapus dari keranjang");
                redirect(base_url("keranjang"));
            } else {
                $this->session->set_flashdata("gagal", $cek->produk->nama .  " gagal di hapus dari keranjang");
                redirect(base_url("keranjang"));
            }
        } else {
            $this->session->set_flashdata("gagal", "Produk tidak ditemukan");
            redirect(base_url("keranjang"));
        }
    }

    public function bayar()
    {
        //TODO : CEK KERANJANG
        $keranjang = $this->keranjang
            ->where(["id_pembelajar" => $this->userData->id, "status" => 0])
            ->with_produk()
            ->as_object()
            ->get_all();
        // d($keranjang);
        if ($keranjang) {
            //TODO : INSERT KE TABLE TRANSAKSI
            $kodeTransaksi          = "K-" . $this->userData->id . time();
            $dataInsert = [
                "id_pembelajar"     => $this->userData->id,
                "kode_transaksi"    => $kodeTransaksi,
                "bukti_bayar"       => NULL,
                "status_bayar"      => 2, //? 1 = ACC | 2 = PENDING | 3 TOLAK
                "catatan"           => NULL,
                "keterangan"        => $this->input->post("catatan", TRUE)
            ];
            $insert = $this->transaksi->insert($dataInsert);
            if ($insert) {
                //TODO : AMBIL ID
                $transaksi = $this->transaksi->as_object()->where(["kode_transaksi" => $kodeTransaksi])->get();
                if ($transaksi) {
                    //TODO : INSERT INTO TABLE DETAIL TRANSAKSI
                    foreach ($keranjang as $k) {
                        $dataDetail = [
                            "id_transaksi"  => $transaksi->id,
                            "id_produk"     => $k->id_produk,
                            "id_pembelajar" => $this->userData->id,
                            "harga"         => $k->produk->harga,
                            "harga_diskon"  => $k->produk->harga_diskon,
                            "keterangan"    => NULL,
                        ];
                        $insertDetail = $this->detail->insert($dataDetail);
                        if ($insertDetail) {
                            //TODO : SET STATUS KERANJANG = 1
                            $statusKeranjang = $this->keranjang->update(["status" => 1], $k->id);
                            if (!$statusKeranjang) {
                                $this->session->set_flashdata("gagal", "Terjadi kesalahan saat melakukan transaksi (Kode : RFL-004)");
                                redirect(base_url("keranjang"));
                            }
                        } else {
                            $this->session->set_flashdata("gagal", "Terjadi kesalahan saat melakukan transaksi (Kode : RFL-003)");
                            redirect(base_url("keranjang"));
                        }
                    }
                    redirect(base_url("transaksi/detail/" . $kodeTransaksi));
                } else {
                    $this->session->set_flashdata("gagal", "Terjadi kesalahan saat melakukan transaksi (Kode : RFL-002)");
                    redirect(base_url("keranjang"));
                }
            } else {
                $this->session->set_flashdata("gagal", "Terjadi kesalahan saat  melakukan transaksi (Kode : RFL-001)");
                redirect(base_url("keranjang"));
            }
        } else {
            $this->session->set_flashdata("gagal", "Gagal melakukan transaksi, item tidak ditemukan");
            redirect(base_url("keranjang"));
        }
    }    
}
