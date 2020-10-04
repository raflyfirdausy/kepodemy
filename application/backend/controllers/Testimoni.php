<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("Testimoni_model", "testimoni");
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

    public function index()
    {
        $this->loadViewAdmin("website/testimoni/v_testimoni");
	}

	public function tambah_data()
	{
		$this->loadViewAdmin("website/testimoni/v_tambahtestimoni");
	}

	public function proses_simpan_testimoni($dataInput)
	{
		
		$save = $this->testimoni->save($dataInput);
		if ($save) {
			$code = "200";
			$message = "Data berhasil disimpan";
		} else {
			$code = "500";
			$message = "Data gagal disimpan";
		}

		$dataarray = [
			"code"	=> $code,
			"message"	=> $message
		];

		return $dataarray;
	}

	public function simpan_data()
	{
		$dataInput  = $this->input->post();
		$testimoni = str_replace(' ', '_', strtolower($dataInput['nama']));
		$code = "";
		$message = "";
		$namafilebaru =  "testimoni_". $testimoni . "_" . time() . "." . pathinfo($_FILES["foto_testimoni"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = "assets/testimoni/";
		$config = $this->config($lokasiArsip,$namafilebaru);
		
        $this->load->library('upload', $config);
		$this->upload->initialize($config);

		unset($dataInput['id']);

		if($_FILES["foto_testimoni"]["name"] == ''){
			$insert = $this->proses_simpan_testimoni($dataInput);
			$code = $insert['code'];
			$message = $insert['message'];
		}else{
			if ($this->upload->do_upload("foto_testimoni")) {
				$dataInput['foto'] = $namafilebaru;
				$insert = $this->proses_simpan_testimoni($dataInput);
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

	public function get_all_data()
	{
		$all = $this->testimoni->get_all_data();
		// d($all);
		$output = "";
		$i = 1;
		foreach ($all as $dt) {
			
			$output .= "<tr>";
			$output .= "<td class='text-center'><input type='hidden' class='txt-gambar' value='" . $dt->foto . "'>" . $i++ . "</td>";
			$output .= "<td><span class='txt-nama'>" . $dt->nama . "</span></td>";
			$output .= "<td><span class='txt-jabatan'>" . $dt->jabatan . "</span></td>";
			$output .= "<td><span class='txt-isi'>" . $dt->isi . "</span></>";
			$output .= "<td class='text-center'>";
			$output .= "<button type='button' class='btn btn-sm btn-clean btn-icon btn-edit-testimoni' data-id='" . $dt->id . "' title='Edit data'><i class='la la-edit text-warning'></i></button>";
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


	public function proses_update_testimoni($dataInput, $id)
	{
		$update = $this->testimoni->update($dataInput, $id);
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

	public function update_data()
	{
		$dataInput  = $this->input->post();
		$id =  $dataInput['id'];
		$datatestimoni = $this->testimoni->where(['id' => $id])->get();

		$testimoni = str_replace(' ', '_', strtolower($dataInput['nama']));
		$code = "";
		$message = "";
		$namafilebaru =  "testimoni_" . $testimoni . "_" . time() . "." . pathinfo($_FILES["foto_testimoni"]["name"], PATHINFO_EXTENSION);
		$lokasiArsip = "assets/testimoni/";

		$config = $this->config($lokasiArsip, $namafilebaru);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		unset($dataInput['id']);

		if($_FILES["foto_testimoni"]["name"] == ''){
			$update = $this->proses_update_testimoni($dataInput, $id);
			$code = $update['code'];
			$message = $update['message'];
		}else{
			if ($this->upload->do_upload("foto_testimoni")) {
				if (is_file(FCPATH . 'assets/testimoni/' . $datatestimoni->foto)) {
					unlink(FCPATH . 'assets/testimoni/' . $datatestimoni->foto);
				}
				$dataInput['foto'] = $namafilebaru;
				$update = $this->proses_update_testimoni($dataInput, $id);
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

	public function detail($id)
    {
		$getdata = $this->testimoni->where(['id' => $id])->get();

		// d($pengajar_kategori);
		$data = [
			'data' => $getdata,
		];
        $this->loadViewAdmin("website/testimoni/v_edittestimoni", $data);
	}

	public function hapus_data()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$delete = $this->testimoni->delete($id);


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
