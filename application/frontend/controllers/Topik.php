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

        $orderBy = ["created_at" => "DESC"];
        $sort = $this->input->get("sort");
        if ($sort) {
            if ($sort == "terbaru") {
                $orderBy = ["created_at" => "DESC"];
            } else if ($sort == "populer") {
                $orderBy = ["created_at" => "RANDOM"];
            } else if ($sort == "tertinggi") {
                $orderBy = ["created_at" => "ASC"];
            }
        }

        //TODO : FIND KELAS BY SLUG
        $perPage    = 2;
        $page       = $this->input->get("page");
        if (!empty($idKelasArr)) {
            $data      = $this->kelas
                ->where("tipe_produk", "kelas")
                ->where("id", $idKelasArr)
                ->where("nama", "LIKE", $this->input->get("search") ?: "")
                ->with_pengajar("fields:id,nama")
                ->with_produk_kategori([
                    "fields"    => "id,keterangan",
                    "with"      => [
                        "relation"   => "kategori",
                        "fields"    => "nama,slug,keterangan,gambar"
                    ]
                ]);

            $total = $data
                ->order_by($orderBy)
                ->as_array()
                ->get_all() ?: [];

            $kelas =  $data
                ->where("tipe_produk", "kelas")
                ->where("id", $idKelasArr)
                ->where("nama", "LIKE", $this->input->get("search") ?: "")
                ->with_pengajar("fields:id,nama")
                ->with_produk_kategori([
                    "fields"    => "id,keterangan",
                    "with"      => [
                        "relation"   => "kategori",
                        "fields"    => "nama,slug,keterangan,gambar"
                    ]
                ])
                ->order_by($orderBy)
                ->as_array()
                ->limit($perPage, $page ? ($page - 1) * $perPage : 0)
                ->get_all() ?: [];
        } else {
            $kelas = [];
            $total = [];
        }


        $data = [
            "kategori"      => $kategori,
            "kelas"         => $kelas,
            "totalPage"     => floor(sizeof($total) / $perPage),
            "pagination"    => ""
        ];

        $this->loadViewUser("topik/index", $data);
    }

    public function backup()
    {
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        // d($queries);

        $uriSegment                 = empty($slug) ? 2 : 3;
        $config['base_url']         = site_url('topik'); //site url
        // $config['total_rows']       = sizeof($total);
        $config['per_page']         = 1;  //show record per halaman
        // $config["uri_segment"]      = $uriSegment; // uri parameter
        $choice                     = $config["total_rows"] / $config["per_page"];
        $config["num_links"]        = floor($choice);
        // $config['reuse_query_string'] = true;
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
        $pagination = $this->pagination->create_links();
        $pagination = str_replace(base_url("topik/"), base_url("topik?page="), $pagination);
        $pagination = str_replace(base_url("topik/"), base_url("topik?page="), $pagination);
    }
}
