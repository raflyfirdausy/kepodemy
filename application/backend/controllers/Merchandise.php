<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merchandise extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("Produk_model", "produk");
	}

	public function config($lokasiArsip,$namafilebaru){
		$config  = [
            "upload_path"       => $lokasiArsip,
            "allowed_types"     => 'gif|jpg|jpeg|png',
            "max_size"          => 10240,
            "file_ext_tolower"  => FALSE,
            "overwrite"         => TRUE,
            "remove_spaces"     => TRUE,
            "file_name"         => $namafilebaru
		];
		
		return $config;
	}

    public function index()
    {
        $this->loadViewAdmin("master/merchandise/v_merchandise");
	}

	public function tambah_data()
    {
		
        $this->loadViewAdmin("master/merchandise/v_tambahmerchandise");
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
			$output .= "<a href='" . base_url('merchandise/detail/'). $dt->id. "' type='button' class='btn btn-sm btn-clean btn-icon' title='Edit'><i class='la la-edit text-success'></i></a>";
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

	public function detail($id)
    {
		$getdata = $this->produk->where(['id' => $id])->get();
		$data = [
			'data' => $getdata,
		];

        $this->loadViewAdmin("master/merchandise/v_editmerchandise", $data);
	}

	public function proses_simpan_merchandise($dataInput)
	{
		$cekdata = $this->produk->where(['nama' => $dataInput['nama'], 'tipe_produk' => 'merchandise'])->count_rows();
		if($cekdata > 0){
			$code = "500";
			$message = "Nama merchandise sudah pernah diinput, silahkan gunakan nama yang lain";
		}else{
			$saveproduk = $this->produk->save($dataInput);
			if($saveproduk){
				$code = "200";
				$message = "Data berhasil disimpan";
			}
			else{
				$code = "500";
				$message = "Data gagal disimpan";
			}
		}

		$dataarray = [
			"code"	=> $code,
			"message"	=> $message
		];
		return $dataarray;
	}

	public function proses_update_merchandise($dataInput, $idmerchandise)
	{
		$updateproduk = $this->produk->update($dataInput, $idmerchandise);
		if($updateproduk){
			$code = "200";
			$message = "Data berhasil diubah";
		}
		else{
			$code = "500";
			$message = "Data gagal diubah";
		}

		$dataarray = [
			"code"	=> $code,
			"message"	=> $message
		];
		return $dataarray;
	}

	public function simpan_data()
	{
		$dataInput = $this->input->post();
		$dataInput['harga'] = str_replace('.', '', substr($dataInput['harga'], 0, -3));
		$dataInput['harga_diskon'] = str_replace('.', '', substr($dataInput['harga_diskon'], 0, -3));
		$dataInput['tipe_produk'] = "merchandise";
		$namamerchandise = str_replace(' ', '_', strtolower($dataInput['nama']));
		$code = "";
		$message = "";
		$namafilebaru =  "produk_". $namamerchandise . "_" . time() . "." . pathinfo($_FILES["file_gambar_header"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = "assets/merchandise/";
		$config = $this->config($lokasiArsip,$namafilebaru);
		
        $this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($_FILES["file_gambar_header"]["name"] == ''){
			$insert = $this->proses_simpan_merchandise($dataInput);
			$code = $insert['code'];
			$message = $insert['message'];
		}else{
			if ($this->upload->do_upload("file_gambar_header")) {
				$dataInput['gambar'] = $namafilebaru;
				$insert = $this->proses_simpan_merchandise($dataInput);
				$code = $insert['code'];
				$message = $insert['message'];
			}
			else{
				$error = array('error' => $this->upload->display_errors("", ""));
				$code = "500";
				$message = implode("<br>", $error);
			}
		}

		if($code == 200){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> $message
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> $message
			]);
		}
	}

	public function update_data()
	{

		$dataInput  = $this->input->post();
		$id = $dataInput['id'];
		$dataInput['harga'] = str_replace('.', '', substr($dataInput['harga'], 0, -3));
		$dataInput['harga_diskon'] = str_replace('.', '', substr($dataInput['harga_diskon'], 0, -3));
		$datamerchandise = $this->produk->where(['id' => $id])->get();

		$namamerchandise = str_replace(' ', '_', strtolower($dataInput['nama']));
		$code = "";
		$message = "";
		$namafilebaru =  "produk_". $namamerchandise . "_" . time() . "." . pathinfo($_FILES["file_gambar_header"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = "assets/merchandise/";
		$config = $this->config($lokasiArsip,$namafilebaru);
		
        $this->load->library('upload', $config);
		$this->upload->initialize($config);

		unset($dataInput['id']);

		if($_FILES["file_gambar_header"]["name"] == ''){
			$update = $this->proses_update_merchandise($dataInput, $id);
			$code = $update['code'];
			$message = $update['message'];
		}else{
			if ($this->upload->do_upload("file_gambar_header")) {
				if (is_file(FCPATH . 'assets/merchandise/' . $datamerchandise->gambar)) {
                    unlink(FCPATH . 'assets/merchandise/' . $datamerchandise->gambar);
                }
				$dataInput['gambar'] = $namafilebaru;
				$update = $this->proses_update_merchandise($dataInput, $id);
				$code = $update['code'];
				$message = $update['message'];
			}
			else{
				$error = array('error' => $this->upload->display_errors("", ""));
				$code = "500";
				$message = implode("<br>", $error);
			}
		}



		if($code == 200){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> $message
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> $message
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
				'response_message'	=> "Data berhasil dihapus"
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Data gagal dihapus"
			]);
		}
	}
}
