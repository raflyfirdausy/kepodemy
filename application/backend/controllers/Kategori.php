<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Kategori_model", "kategori");
	}

	public function index()
	{
		$this->loadViewAdmin("master/kategori/v_kategori");
	}

	public function config($lokasiArsip, $namafilebaru)
	{
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

	public function get_all_data()
	{
		$all = $this->kategori->get_induk();
		$output = "";
		$i = 1;
		foreach ($all as $dt) {
			$output .= "<tr>";
			$output .= "<td class='text-center'>" . $i++ . "</td>";
			$output .= "<td><span class='txt-kategori'>" . $dt->nama . "</span></td>";
			$output .= "<td><span class='txt-keterangan'>" . $dt->keterangan . "</span></td>";
			$output .= "<td><input type='hidden' class='txt-gambar' value='" . $dt->gambar . "'>" . $this->kategori->get_jumah_sub($dt->id) . "</td>";
			$output .= "<td class='text-center'>";
			$output .= "<button type='button' class='btn btn-sm btn-clean btn-icon btn-edit-kategori' data-id='" . $dt->id . "' title='Edit'><i class='la la-edit text-warning'></i></button>";
			$output .= "<a href='" . base_url('kategori/detail/') . $dt->id  . "' type='button' class='btn btn-sm btn-clean btn-icon' title='Subkategori'><i class='la la-list-ul text-success'></i></a>";
			$output .= "<button type='button' class='btn btn-sm btn-clean btn-icon btn-delete' data-id='" . $dt->id . "' title='Hapus data'><i class='la la-trash text-danger'></i></button>";
			$output .= "</td>";
			$output .= "</tr>";
		}

		echo json_encode([
			'response_code'	=> 200,
			'response_message'	=> "Berhasil load data",
			'output'	=> $output
		]);
	}

	public function get_subkategori()
	{
		$dataInput = $this->input->post();
		$all = $this->kategori->get_subkategori($dataInput['id_induk']);
		$output = "";
		$i = 1;
		foreach ($all as $dt) {
			$output .= "<tr>";
			$output .= "<td class='text-center'>" . $i++ . "</td>";
			$output .= "<td><span class='txt-kategori'>" . $dt->nama . "</span></td>";
			$output .= "<td><span class='txt-keterangan'>" . $dt->keterangan . "</span></td>";
			$output .= "<td><input type='hidden' class='txt-gambar' value='" . $dt->gambar . "'>" . $this->kategori->get_jumah_sub($dt->id) . "</td>";
			$output .= "<td class='text-center'>";
			$output .= "<button type='button' class='btn btn-sm btn-clean btn-icon btn-edit-subkategori' data-id='" . $dt->id . "' title='Edit'><i class='la la-edit text-warning'></i></button>";
			$output .= "<a href='" . base_url('kategori/detail/') . $dt->id  . "' type='button' class='btn btn-sm btn-clean btn-icon' title='Subkategori'><i class='la la-list-ul text-success'></i></a>";
			$output .= "<button type='button' class='btn btn-sm btn-clean btn-icon btn-delete' data-id='" . $dt->id . "' title='Hapus data'><i class='la la-trash text-danger'></i></button>";
			$output .= "</td>";
			$output .= "</tr>";
		}

		echo json_encode([
			'response_code'	=> 200,
			'response_message'	=> "Berhasil load data",
			'output'	=> $output
		]);
	}

	// public function simpan_kategori()
	// {
	// 	$dataInput = $this->input->post();
	// 	unset($dataInput["id"]);
	// 	$dataInput['slug'] = slug($dataInput['nama']);
	// 	$cekdata = $this->kategori->where(['nama' => $dataInput['nama']])->count_rows();
	// 	if($cekdata > 0){
	// 		echo json_encode([
	// 			'response_code'	=> 500,
	// 			'response_message'	=> "Nama kategori sudah pernah diinput, silahkan dicek kembbali"
	// 		]);
	// 	}else{
	// 		$save = $this->kategori->save($dataInput);
	// 		if($save){
	// 			echo json_encode([
	// 				'response_code'	=> 200,
	// 				'response_message'	=> "Data berhasil disimpan"
	// 			]);
	// 		}else{
	// 			echo json_encode([
	// 				'response_code'	=> 500,
	// 				'response_message'	=> "Data gagal disimpan"
	// 			]);
	// 		}
	// 	}
	// }
	public function proses_simpan_kategori($dataInput)
	{
		$cekdata = $this->kategori->where(['nama' => $dataInput['nama']])->count_rows();
		if ($cekdata > 0) {
			$code = "500";
			$message = "Nama kategori sudah pernah diinput, silahkan gunakan nama yang lain";
		} else {
			$save = $this->kategori->save($dataInput);
			if ($save) {
				$code = "200";
				$message = "Data berhasil disimpan";
			} else {
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

	public function proses_update_kategori($dataInput, $id)
	{
		$update = $this->kategori->update($dataInput, $id);
		if ($update) {
			$code = "200";
			$message = "Data berhasil diubah";
		} else {
			$code = "500";
			$message = "Data gagal diubah";
		}

		$dataarray = [
			"code"	=> $code,
			"message"	=> $message
		];
		return $dataarray;
	}

	public function simpan_kategori()
	{
		$dataInput = $this->input->post();
		unset($dataInput["id"]);
		$dataInput['slug'] = slug($dataInput['nama']);
		$namakategori = str_replace(' ', '_', strtolower($dataInput['nama']));
		$code = "";
		$message = "";
		$namafilebaru =  "kategori_" . $namakategori . "_" . time() . "." . pathinfo($_FILES["file_gambar_header"]["name"], PATHINFO_EXTENSION);
		$lokasiArsip = "assets/kategori/";
		$config = $this->config($lokasiArsip, $namafilebaru);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($_FILES["file_gambar_header"]["name"] == '') {
			$insert = $this->proses_simpan_kategori($dataInput);
			$code = $insert['code'];
			$message = $insert['message'];
		} else {
			if ($this->upload->do_upload("file_gambar_header")) {
				$dataInput['gambar'] = $namafilebaru;
				$insert = $this->proses_simpan_kategori($dataInput);
				$code = $insert['code'];
				$message = $insert['message'];
			} else {
				$error = array('error' => $this->upload->display_errors("", ""));
				$code = "500";
				$message = implode("<br>", $error);
			}
		}

		if ($code == 200) {
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> $message
			]);
		} else {
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> $message
			]);
		}
	}

	// public function simpan_subkategori()
	// {
	// 	$dataInput = $this->input->post();
	// 	// $namemember = unserialize($dataInput['NamaPendidikan']);
	// 	// foreach( $namemember as $value ) {
	// 	// 	print $value;
	// 	// }
	// 	var_dump($dataInput);
	// }

	public function update_kategori()
	{

		$dataInput  = $this->input->post();
		$dataInput['slug'] = slug($dataInput['nama']);
		$id = $dataInput['id'];
		$datakategori = $this->kategori->where(['id' => $id])->get();
		$namakategori = str_replace(' ', '_', strtolower($dataInput['nama']));
		unset($dataInput["id"]);

		$code = "";
		$message = "";
		$namafilebaru =  "kategori_" . $namakategori . "_" . time() . "." . pathinfo($_FILES["file_gambar_header"]["name"], PATHINFO_EXTENSION);
		$lokasiArsip = "assets/kategori/";
		$config = $this->config($lokasiArsip, $namafilebaru);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($_FILES["file_gambar_header"]["name"] == '') {
			$update = $this->proses_update_kategori($dataInput, $id);
			$code = $update['code'];
			$message = $update['message'];
		} else {
			if ($this->upload->do_upload("file_gambar_header")) {
				if (is_file(FCPATH . 'assets/kategori/' . $datakategori->gambar)) {
					unlink(FCPATH . 'assets/kategori/' . $datakategori->gambar);
				}
				$dataInput['gambar'] = $namafilebaru;
				$update = $this->proses_update_kategori($dataInput, $id);
				$code = $update['code'];
				$message = $update['message'];
			} else {
				$error = array('error' => $this->upload->display_errors("", ""));
				$code = "500";
				$message = implode("<br>", $error);
			}
		}

		if ($code == 200) {
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> $message
			]);
		} else {
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> $message
			]);
		}
	}
	// public function update_kategori()
	// {

	// 	$dataInput  = $this->input->post();
	// 	$dataInput['slug'] = slug($dataInput['nama']);
	// 	$id = $dataInput['id'];
	// 	unset($dataInput["id"]);
	// 	$update = $this->kategori->update($dataInput, $id);
	// 	if($update){
	// 		echo json_encode([
	// 			'response_code'	=> 200,
	// 			'response_message'	=> "Data berhasil diupdate"
	// 		]);
	// 	}else{
	// 		echo json_encode([
	// 			'response_code'	=> 500,
	// 			'response_message'	=> "Data gagal diupdate"
	// 		]);
	// 	}
	// }

	public function detail($id)
	{
		$data = $this->kategori->where(['id' => $id])->get();
		$data = [
			'id_induk' => $id,
			'namakategori'	=> $data->nama
		];
		$this->loadViewAdmin("master/kategori/v_subkategori", $data);
	}


	public function hapus_kategori()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$delete = $this->kategori->where(['id_induk' => $id])->delete();
		$delete = $this->kategori->delete($id);

		if ($delete) {
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> "Data berhasil dihapus"
			]);
		} else {
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Data gagal dihapus"
			]);
		}
	}
}
