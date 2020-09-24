<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_admin extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadViewAdmin("master/admin/data_admin");
    }
}
