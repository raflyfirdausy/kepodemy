<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            "rafly" => "RAFLI FIRDAUSY"
        ];
        $this->loadViewAdmin("beranda/index", $data);
    }
}
