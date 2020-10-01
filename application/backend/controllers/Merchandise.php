<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merchandise extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("Produk_model", "produk");
    }

    public function index()
    {
        $this->loadViewAdmin("master/merchandise/v_merchandise");
	}

	public function get_all_data()
	{
		$all = $this->produk->get_all_merchandise();
		$output = "";
		$i = 1;
		foreach ($all as $dt) {
			$output .= "<tr>";
			$output .= "<td class='text-center'>". $i++ ."</td>";
			$output .= "<td><span class='txt-merchandise'>". $dt->nama ."</span></td>";
			$output .= "<td><span class='txt-keterangan'>". $dt->keterangan ."</span></td>";
			$output .= "<td><input type='hidden' class='txt-harga' value='". $dt->harga ."'>".  Rupiah($dt->harga) ."</td>";
			$output .= "<td><input type='hidden' class='txt-harga-diskon' value='". $dt->harga_diskon ."'>".  Rupiah($dt->harga_diskon) ."</td>";
			$output .= "<td class='text-center'>";
			$output .= "<button type='button' class='btn btn-sm btn-clean btn-icon btn-edit-merchandise' data-id='". $dt->id ."' title='Edit'><i class='la la-edit text-warning'></i></button>";
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

	public function simpan_merchandise()
	{
		$dataInput = $this->input->post();
		unset($dataInput["id"]);
		$dataInput['tipe_produk'] = "merchandise";
		$cekdata = $this->produk->where(['nama' => $dataInput['nama']])->count_rows();
		if($cekdata > 0){
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Nama merchandise sudah pernah diinput, silahkan dicek kembbali"
			]);
		}else{
			$save = $this->produk->save($dataInput);
			if($save){
				echo json_encode([
					'response_code'	=> 200,
					'response_message'	=> "Data berhasil disimpan"
				]);
			}else{
				echo json_encode([
					'response_code'	=> 500,
					'response_message'	=> "Data gagal disimpan"
				]);
			}
		}
	}
	
	// public function simpan_submerchandise()
	// {
	// 	$dataInput = $this->input->post();
	// 	// $namemember = unserialize($dataInput['NamaPendidikan']);
	// 	// foreach( $namemember as $value ) {
	// 	// 	print $value;
	// 	// }
	// 	var_dump($dataInput);
	// }

	public function update_merchandise()
	{

		$dataInput  = $this->input->post();
		$id = $dataInput['id'];
		unset($dataInput["id"]);
		$update = $this->produk->update($dataInput, $id);
		if($update){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> "Data berhasil diupdate"
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Data gagal diupdate"
			]);
		}
	}

	// public function update_submerchandise()
	// {
	// 	$dataInput  = $this->input->post();
	// 	var_dump($dataInput);
	// }

	public function hapus_merchandise()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$delete = $this->produk->delete($id);

		if($delete){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> "Berhasil menghapus data"
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Gagal menghapus data"
			]);
		}
	}
}
