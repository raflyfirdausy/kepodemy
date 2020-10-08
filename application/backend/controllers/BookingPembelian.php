<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BookingPembelian extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("Transaksi_model", "transaksi");
		$this->load->model("Transaksidetail_model", "transaksi_detail");
		$this->load->model("Pembelajar_model", "pembelajar");
    }

    public function index()
    {
		$this->loadViewAdmin("transaksi/pembelian/v_booking");		
	}

	public function get_all_data()
	{
		$dataInput  = $this->input->post();
		// $id = $dataInput["ID"];
		$all = $this->transaksi->get_all_data($dataInput["id_pembelajar"], $dataInput["status_bayar"]);
		
		$output = "";
		$i = 1;
		foreach ($all as $dt) {
			if($dt->status_bayar == 2){
				$status = '<span class="label label-inline label-light-warning font-weight-bold status-pembelajar">Menunggu</span>';
			}elseif($dt->status_bayar == 3){
				$status = '<span class="label label-inline label-light-danger font-weight-bold status-pembelajar">Ditolak</span>';
			}else{
				$status = '<span class="label label-inline label-light-success font-weight-bold status-pembelajar">Diterima</span>';
			}
			$output .= "<tr>";
			$output .= "<td class='text-center'>". $i++ ."</td>";
			$output .= "<td><span class='txt-kelas'>". $dt->pembelajar->nama ."</span></td>";
			$kelas = "";
				if(!empty($dt->transaksidetail)){
					$size = sizeof((array)$dt->transaksidetail);
					$x = 0;				
					foreach ($dt->transaksidetail as $transaksi) {
						$kelas .= $transaksi->produk->nama;
						if (++$x !== $size){
							$kelas .= ", ";
						}
					}
				}
			
			$output .= "<td>". $kelas ."</td>";
			$output .= "<td class='text-right'>". Rupiah($dt->total) ."</td>";
			// $output .= "<td><a href='". base_url('bookingpembelian/download_file/'. $dt->bukti_bayar) ." target='_blank'>". $dt->bukti_bayar ."</a></td>";
			$output .= "<td>". just_date($dt->created_at) ."</td>";
			$output .= "<td class='text-center'>". $status ."</td>";
			$output .= "<td class='text-center'>";
			$output .= "<a href='" . base_url('bookingpembelian/detail/'). $dt->id. "' type='button' class='btn btn-sm btn-clean btn-icon' title='Detail'><i class='la la-edit text-success'></i></a>";
			$output .= "<button type='button' class='btn btn-sm btn-clean btn-icon btn-delete' data-id='". $dt->id ."' title='Hapus data'><i class='la la-trash text-danger'></i></button>";
			$output .= "</td>";
			$output .= "</tr>";
		}

		echo json_encode([
			'response_code'	=> 200,
			'response_message'	=> "Berhasil load data",
			'output'	=> $output
		]);
	}
	
    public function pending()
    {
		// d($this->transaksi->get_all_data());
		// $get = $this->transaksi->get_all_data($id_pembelajar = 1, $statusbayar = 2);
		// d($get);
		$data = [
			'statusbayar'	=> 2,
			'id_pembelajar'	=> "",
			'nama_pembelajar'	=> ""
		];
        $this->loadViewAdmin("transaksi/pembelian/v_bookingtransaksi", $data);
	}

    public function diterima()
    {
        $data = [
			'statusbayar'	=> 1,
			'id_pembelajar'	=> "",
			'nama_pembelajar'	=> ""
		];
        $this->loadViewAdmin("transaksi/pembelian/v_bookingtransaksi", $data);
	
	}
    public function ditolak()
    {
        $data = [
			'statusbayar'	=> 3,
			'id_pembelajar'	=> "",
			'nama_pembelajar'	=> ""
		];
        $this->loadViewAdmin("transaksi/pembelian/v_bookingtransaksi", $data);
	}

    public function transaksi_pembelajar($id)
    {
		$getdata = $this->pembelajar->where(['id' => $id])->get();
        $data = [
			'statusbayar'	=> '',
			'id_pembelajar'	=> $id,
			'nama_pembelajar'	=> $getdata->nama
		];
        $this->loadViewAdmin("transaksi/pembelian/v_bookingtransaksi", $data);
	}
	
    public function detail($id)
    {
		$transaksi = $this->transaksi->where(['id' => $id])->get();
		// $transaksidetail = $this->transaksi_detail->where(['id_transaksi' => $id])->get_all();
		$transaksidetail = $this->transaksi_detail->get_all_data($id);
		// d($transaksidetail);
		$datapembelajar = $this->pembelajar->where(['id' => $transaksi->id_pembelajar])->get();
		$data = [
			'transaksi_detail' => $transaksidetail,
			'datapembelajar' => $datapembelajar,
			'datatransaksi' => $transaksi,
		];
        $this->loadViewAdmin("transaksi/pembelian/v_detailbooking", $data);
	}
	
	public function download_file($fileName)
	{
		$file = asset('transaksi/' . $fileName);
		$data = file_get_contents($file);
		force_download($fileName,$data );
	}
	
	public function hapus_data()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$deletedetail = $this->transaksi_detail->where(['id_transaksi' => $id])->delete();
		$delete = $this->transaksi->delete($id);


		if($delete){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> "Data berhasil dihapus"
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Data gagal dihapus"
			]);
		}
	}

	public function terimaTransaksi()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$data = [
			'status_bayar'	=> 	1
		];
		$update = $this->transaksi->update($data, $id);

		if($update){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> "Transaksi berhasil diterima",
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Transaksi gagal diterima",
			]);
		}
	}

	public function tolakTransaksi()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["id"];

		$data = [
			'status_bayar'	=> 	3,
			'keterangan'	=> $dataInput['keterangan']
		];
		$update = $this->transaksi->update($data, $id);

		if($update){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> "Transaksi berhasil ditolak",
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Transaksi gagal ditolak",
			]);
		}
	}
}
