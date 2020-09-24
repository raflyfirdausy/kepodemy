<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadViewAdmin("transaksi/pendaftaran_pengajar/v_pengajar");
	}
	
    public function pending()
    {
        $this->loadViewAdmin("transaksi/pendaftaran_pengajar/v_pengajarpending");
	}

    public function diterima()
    {
        $this->loadViewAdmin("transaksi/pendaftaran_pengajar/v_pengajarterima");
	
	}
    public function ditolak()
    {
        $this->loadViewAdmin("transaksi/pendaftaran_pengajar/v_pengajartolak");
	}
	
    public function detailpendaftar($status)
    {
		$data = [
			'status' => $status
		];
        $this->loadViewAdmin("transaksi/pendaftaran_pengajar/v_detailpengajar", $data);
    }
}
