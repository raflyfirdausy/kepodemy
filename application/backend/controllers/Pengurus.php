<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("Pengurus_model", "pengurus");
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
        $this->loadViewAdmin("website/pengurus/v_pengurus");
	}

	public function tambah_data()
	{
		$this->loadViewAdmin("website/pengurus/v_tambahpengurus");
	}

	public function proses_simpan_pengurus($dataInput)
	{
		
		$save = $this->pengurus->save($dataInput);
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
		$pengurus2 = str_replace(' ', '_', strtolower($dataInput['nama']));
		$pengurus3 = str_replace('.', '', strtolower($pengurus2));
		$pengurus = str_replace(',', '', strtolower($pengurus3));
		$code = "";
		$message = "";
		$namafilebaru =  "pengurus_". $pengurus . "_" . time() . "." . pathinfo($_FILES["foto_pengurus"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = "assets/pengurus/";
		$config = $this->config($lokasiArsip,$namafilebaru);
		
        $this->load->library('upload', $config);
		$this->upload->initialize($config);

		unset($dataInput['foto_pengurus_remove']);

		if($_FILES["foto_pengurus"]["name"] == ''){
			$insert = $this->proses_simpan_pengurus($dataInput);
			$code = $insert['code'];
			$message = $insert['message'];
		}else{
			if ($this->upload->do_upload("foto_pengurus")) {
				$dataInput['foto'] = $namafilebaru;
				$insert = $this->proses_simpan_pengurus($dataInput);
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
		$all = $this->pengurus->get_all_data();
		// d($all);
		$output = "";
		$i = 1;
		foreach ($all as $dt) {
			
			$output .= "<tr>";
			$output .= "<td class='text-center'>" . $i++ . "</td>";
			$output .= "<td>" . $dt->nama . "</td>";
			$output .= "<td>" . $dt->jabatan . "</td>";
			$output .= "<td>" . $dt->keterangan . "</td>";
			$output .= "<td>" . just_date($dt->created_at) . "</td>";
			$output .= "<td class='text-center'>";
			$output .= "<a href='" . base_url('pengurus/detail/') . $dt->id . "' type='button' class='btn btn-sm btn-clean btn-icon'title='Detail pengurus'><i class='la la-edit text-warning'></i></a>";
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


	public function proses_update_pengurus($dataInput, $id)
	{
		$update = $this->pengurus->update($dataInput, $id);
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
		$datapengurus = $this->pengurus->where(['id' => $id])->get();

		$pengurus2 = str_replace(' ', '_', strtolower($dataInput['nama']));
		$pengurus3 = str_replace('.', '', strtolower($pengurus2));
		$pengurus = str_replace(',', '', strtolower($pengurus3));
		$code = "";
		$message = "";
		$namafilebaru =  "pengurus_" . $pengurus . "_" . time() . "." . pathinfo($_FILES["foto_pengurus"]["name"], PATHINFO_EXTENSION);
		$lokasiArsip = "assets/pengurus/";

		$config = $this->config($lokasiArsip, $namafilebaru);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		unset($dataInput['id'], $dataInput['foto_pengurus_remove']);

		if($_FILES["foto_pengurus"]["name"] == ''){
			$update = $this->proses_update_pengurus($dataInput, $id);
			$code = $update['code'];
			$message = $update['message'];
		}else{
			if ($this->upload->do_upload("foto_pengurus")) {
				if (is_file(FCPATH . 'assets/pengurus/' . $datapengurus->foto)) {
					unlink(FCPATH . 'assets/pengurus/' . $datapengurus->foto);
				}
				$dataInput['foto'] = $namafilebaru;
				$update = $this->proses_update_pengurus($dataInput, $id);
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
		$getdata = $this->pengurus->where(['id' => $id])->get();

		// d($pengajar_kategori);
		$data = [
			'data' => $getdata,
		];
        $this->loadViewAdmin("website/pengurus/v_editpengurus", $data);
	}

	public function hapus_data()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$delete = $this->pengurus->delete($id);


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
