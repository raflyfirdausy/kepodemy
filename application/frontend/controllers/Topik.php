<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topik extends User_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kategori_model", "kategori");
        $this->load->model("Produk_model", "kelas");
        $this->load->model("Produk_kategori_model", "kelas_detail");
    }

    public function index($slug = NULL)
    {        
        //TODO : CEK SLUG AND KATEGORI DETAIL
        $detailKategori = $this->kelas_detail
            ->fields()
            ->as_array()
            ->select("DISTINCT(id_kelas) as id")
            ->get_all() ?: [];

        $kategori = $this->kategori->where_slug($slug)->get() ?: NULL;
        if ($slug != NULL) {
            if (!$kategori) {
                redirect(base_url("topik"));
            } else {
                $detailKategori = $this->kelas_detail
                    ->fields()
                    ->select("DISTINCT(id_kelas) as id")
                    ->where(["id_kategori" => $kategori["id"]])
                    ->as_array()
                    ->get_all() ?: [];
            }
        }
        $idKelasArr = [];
        foreach ($detailKategori as $dt) {
            array_push($idKelasArr, $dt["id"]);
        }
        // d($idKelasArr);

        //TODO : FIND KELAS BY SLUG
        if (!empty($idKelasArr)) {
            $kelas = $this->kelas
                ->where("tipe_produk", "kelas")
                ->where("id", $idKelasArr)
                ->with_pengajar("fields:id,nama")
                ->with_produk_kategori([
                    "fields" => "id,keterangan",
                    "with" => [
                        "relation" => "kategori",
                        "fields" => "nama,slug,keterangan,gambar"
                    ]
                ])
                // ->limit(1,1)
                ->order_by("created_at", "DESC")
                ->as_array()
                ->get_all() ?: [];
        } else {
            $kelas = [];
        }


        $uriSegment                 = empty($slug) ? 2 : 3;

        $config['base_url']         = site_url('topik'); //site url
        $config['total_rows']       = sizeof($kelas);
        $config['per_page']         = 1;  //show record per halaman
        $config["uri_segment"]      = $uriSegment; // uri parameter
        $choice                     = $config["total_rows"] / $config["per_page"];
        $config["num_links"]        = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data = [
            "kategori"      => $kategori,
            "kelas"         => $kelas,
            "page"          => ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0,
            "pagination"    => $this->pagination->create_links()
        ];
        $this->loadViewUser("topik/index", $data);
    }
}
