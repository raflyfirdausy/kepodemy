<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Controller extends MY_Controller
{
    public $userData;
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kategori_model", "kategori");
        $this->load->model("Keranjang_model", "keranjang");

        $this->global_data["keranjang_"] = [];
        if ($this->session->has_userdata(SESSION)) {
            $this->userData = $this->session->userdata(SESSION);

            $this->global_data["keranjang_"] = $this->keranjang
                ->where([
                    "id_pembelajar" => $this->userData->id,
                    "status"        => 0,
                ])
                ->as_array()
                ->get_all() ?: [];
        }
        //TODO : FIND TOPIK
        $topikRoot = $this->kategori
            ->where(["id_induk" => NULL])
            ->where("id_induk", "=" , "0", TRUE)
            ->as_array()
            ->order_by("nama", "ASC")
            ->get_all() ?: [];

        $output = "";
        $topikArr = [];
        for ($a = 0; $a < sizeof($topikRoot); $a++) {
            // $output .= $topikRoot[$a]["id"] . ". " . $topikRoot[$a]["nama"] . "<br>";
            // $output .= $this->getSubTopik($topikRoot[$a]["id"],  $topikRoot[$a]["id"]);

            $topikArr[$a] = $topikRoot[$a];
            $topikArr[$a]["sub"] = $this->getSubTopik($topikRoot[$a]["id"]);
        }
        // d($topikArr);        
        $this->global_data["topik"] = $topikArr;
    }

    protected function loadViewUser($view = NULL, $local_data = array(), $asData = FALSE)
    {
        if (!file_exists(APPPATH . "views/$view" . ".php")) {
            show_404();
        }
        $local_data["__content"] =  $this->loadView($view, $local_data, TRUE);

        $this->loadView("template/main", $local_data);
    }

    public function getSubTopik($idInduk = NULL, $string = "")
    {
        $subTopik = $this->kategori
            ->where(["id_induk" => $idInduk])
            ->as_array()
            ->order_by("nama", "ASC")
            ->get_all() ?: [];

        $output = "";
        $subTopikArr = [];
        for ($b = 0; $b < sizeof($subTopik); $b++) {
            // $output .= $string . "." . $subTopik[$b]["id"] . " " . $subTopik[$b]["nama"] . "<br>";
            // $output .= $this->getSubTopik($subTopik[$b]["id"], $string . "." . $subTopik[$b]["id"]);

            $subTopikArr[$b] = $subTopik[$b];
            $subTopikArr[$b]["sub"] = $this->getSubTopik($subTopik[$b]["id"]);
        }
        return $subTopikArr;
    }
}
