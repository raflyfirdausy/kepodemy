<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("Slider_model", "slider");
    }

    public function index()
    {
        $this->loadViewAdmin("website/slider/v_slider");
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
		$all = $this->slider->get_all_data();
		// d($all);
		$output = "";
		$i = 1;
		foreach ($all as $dt) {
			$actived = "";
			$btnactived = "";
			if($dt->is_active == 1){
				$actived .= '<span class="label label-inline label-light-success font-weight-bold status-slider">Active</span>';
				$btnactived .= '<button type="button" class="btn btn-sm btn-clean btn-icon btn-not-active" data-id="' . $dt->id . '" title="Non aktifkan slider"><i class="la la-times-circle-o text-danger"></i></button>';
			}else{
				$actived .= '<span class="label label-inline label-light-danger font-weight-bold status-slider">Not Active</span>';
				$btnactived .= '<button type="button" class="btn btn-sm btn-clean btn-icon btn-active" data-id="' . $dt->id . '" title="Aktifkan slider"><i class="la la-check-circle-o text-success"></i></button>';
			}

			$output .= "<tr>";
			$output .= "<td class='text-center'>" . $i++ . "</td>";
			$output .= "<td><span class='txt-judul'>" . $dt->judul . "</span></td>";
			$output .= "<td><span class='txt-keterangan'>" . $dt->keterangan . "</span></td>";
			$output .= "<td class='text-center'><input type='hidden' class='txt-gambar' value='" . $dt->foto . "'>" . $actived. "</td>";
			$output .= "<td class='text-center'>";
			$output .= $btnactived;
			$output .= "<button type='button' class='btn btn-sm btn-clean btn-icon btn-edit-slider' data-id='" . $dt->id . "' title='Edit data'><i class='la la-edit text-warning'></i></button>";
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

	public function proses_simpan_slider($dataInput)
	{
		
		$save = $this->slider->save($dataInput);
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
		$slider = str_replace(' ', '_', strtolower($dataInput['judul']));
		$code = "";
		$message = "";
		$namafilebaru =  "slider_". $slider . "_" . time() . "." . pathinfo($_FILES["foto_slider"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = "assets/slider/";
		$config = $this->config($lokasiArsip,$namafilebaru);
		
        $this->load->library('upload', $config);
		$this->upload->initialize($config);

		unset($dataInput['id']);

		if($_FILES["foto_slider"]["name"] == ''){
			$insert = $this->proses_simpan_slider($dataInput);
			$code = $insert['code'];
			$message = $insert['message'];
		}else{
			if ($this->upload->do_upload("foto_slider")) {
				$dataInput['foto'] = $namafilebaru;
				$insert = $this->proses_simpan_slider($dataInput);
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

	public function proses_update_slider($dataInput, $id)
	{
		$update = $this->slider->update($dataInput, $id);
		if ($update) {
			$code = "200";
			$message = "Data berhasil diubah";
		} else {
			$code = "500";
			$message = "Data gagal diubah";
		}

		$dataarray = [
			"code"		=> $code,
			"message"	=> $message
		];
		
		return $dataarray;
	}
	


	public function update_data()
	{
		$dataInput  = $this->input->post();
		$id =  $dataInput['id'];
		$dataslider = $this->slider->where(['id' => $id])->get();

		$slider = str_replace(' ', '_', strtolower($dataInput['judul']));
		$code = "";
		$message = "";
		$namafilebaru =  "slider_" . $slider . "_" . time() . "." . pathinfo($_FILES["foto_slider"]["name"], PATHINFO_EXTENSION);
		$lokasiArsip = "assets/slider/";

		$config = $this->config($lokasiArsip, $namafilebaru);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		unset($dataInput['id']);

		if($_FILES["foto_slider"]["name"] == ''){
			$update = $this->proses_update_slider($dataInput, $id);
			$code = $update['code'];
			$message = $update['message'];
		}else{
			if ($this->upload->do_upload("foto_slider")) {
				if (is_file(FCPATH . 'assets/slider/' . $dataslider->foto)) {
					unlink(FCPATH . 'assets/slider/' . $dataslider->foto);
				}
				$dataInput['foto'] = $namafilebaru;
				$update = $this->proses_update_slider($dataInput, $id);
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

	public function detail($status)
    {
		$data = [
			'status' => $status,
			'namaslider' => 'Web'
		];
        $this->loadViewAdmin("master/slider/v_subslider", $data);
	}

	public function slider_active()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$data = [
			'is_active'	=> 	1
		];
		$update = $this->slider->update($data, $id);

		if($update){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> "Slider berhasil diaktifkan",
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Slider gagal diaktifkan",
			]);
		}
	}

	public function slider_notactive()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$data = [
			'is_active'	=> 	0
		];
		$update = $this->slider->update($data, $id);

		if($update){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> "Slider berhasil di non-aktifkan",
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Slider gagal di non-aktifkan",
			]);
		}
	}


	public function hapus_data()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];
		$delete = $this->slider->delete($id);
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
