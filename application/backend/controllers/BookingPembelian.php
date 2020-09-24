<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BookingPembelian extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadViewAdmin("transaksi/pembelian/v_booking");
	}
	
    public function pending()
    {
        $this->loadViewAdmin("transaksi/pembelian/v_bookingpending");
	}

    public function diterima()
    {
        $this->loadViewAdmin("transaksi/pembelian/v_bookingterima");
	
	}
    public function ditolak()
    {
        $this->loadViewAdmin("transaksi/pembelian/v_bookingtolak");
	}
	
    public function detailbooking($status)
    {
		$data = [
			'status' => $status
		];
        $this->loadViewAdmin("transaksi/pembelian/v_detailbooking", $data);
    }
}
