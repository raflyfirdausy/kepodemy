<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_pembelajar extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("Pembelajar_model", "pembelajar");
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
		// $all = $this->pembelajar->get_all_data();
		// d($all);
        $this->loadViewAdmin("master/pembelajar/v_kelolapembelajar");
	}

    public function tambah_data()
    {
        $this->loadViewAdmin("master/pembelajar/v_tambahpembelajar");
	}

	public function get_all_data()
	{
		$all = $this->pembelajar->get_all_data();
		// d($all);
		$output = "";
		$i = 1;
		foreach ($all as $dt) {
			$verif = "";
			$btnverif = "";
			if($dt->is_verified == 1){
				$verif .= '<span class="label label-inline label-light-success font-weight-bold status-pembelajar">Sudah Verifikasi</span>';
			}else{
				$verif .= '<span class="label label-inline label-light-danger font-weight-bold status-pembelajar">Belum Verifikasi</span>';
				$btnverif .= '<button type="button" class="btn btn-sm btn-clean btn-icon btn-verifikasi" data-id="2" title="Verifikasi akun"><i class="la la-check-circle-o text-success"></i></button>';
			}
			$output .= "<tr>";
			$output .= "<td class='text-center'>" . $i++ . "</td>";
			$output .= "<td>" . $dt->nama . "</td>";
			$output .= "<td>" . $dt->email . "</td>";
			$output .= "<td>" . $dt->no_hp . "</td>";
			$output .= "<td>" . just_date($dt->created_at) . "</td>";
			$output .= "<td>" . $verif . "</td>";
			$output .= "<td class='text-center'>";
			$output .= $btnverif;
			$output .= "<a href='" . base_url('bookingpembelian/detailbooking/') . $dt->id . "' type='button' class='btn btn-sm btn-clean btn-icon'title='Cek Transaksi'><i class='la la-money-check-alt text-primary'></i></a>";
			$output .= "<a href='" . base_url('kelola_pembelajar/detail/') . $dt->id . "' type='button' class='btn btn-sm btn-clean btn-icon'title='Detail Pembelajar'><i class='la la-edit text-warning'></i></a>";
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

	public function proses_simpan_pembelajar($dataInput)
	{
		$cekdata = $this->pembelajar->where(['email' => $dataInput['email']])->count_rows();
		if ($cekdata > 0) {
			$code = "500";
			$message = "Email sudah pernah terdaftar, silahkan email yang lain";
		} else {
			$save = $this->pembelajar->save($dataInput);
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

	
	public function simpan_data()
	{
		$dataInput  = $this->input->post();
		$namapembelajar = str_replace(' ', '_', strtolower($dataInput['nama']));
		$code = "";
		$message = "";
		$namafilebaru =  "pembelajar_". $namapembelajar . "_" . time() . "." . pathinfo($_FILES["foto_pembelajar"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = "assets/pembelajar/";
		$config = $this->config($lokasiArsip,$namafilebaru);
		
        $this->load->library('upload', $config);
		$this->upload->initialize($config);
		$dataInput["is_verified"] = 1;
		$dataInput["register_by"] = "admin";
		unset($dataInput['passwordConfirm'],$dataInput['foto_pembelajar_remove']);

		if($_FILES["foto_pembelajar"]["name"] == ''){
			$insert = $this->proses_simpan_pembelajar($dataInput);
			$code = $insert['code'];
			$message = $insert['message'];
		}else{
			if ($this->upload->do_upload("foto_pembelajar")) {
				$dataInput['foto'] = $namafilebaru;
				$insert = $this->proses_simpan_pembelajar($dataInput);
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

	public function proses_update_pembelajar($dataInput, $id)
	{
		$update = $this->pembelajar->update($dataInput, $id);
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

	public function update_pembelajar()
	{
		$dataInput  = $this->input->post();
		$id =  $dataInput['id'];
		$datapembelajar = $this->pembelajar->where(['id' => $id])->get();

		$pembelajar = str_replace(' ', '_', strtolower($dataInput['nama']));
		$code = "";
		$message = "";
		$namafilebaru =  "pengajar_" . $pembelajar . "_" . time() . "." . pathinfo($_FILES["foto_pembelajar"]["name"], PATHINFO_EXTENSION);
		$lokasiArsip = "assets/pembelajar/";

		$config = $this->config($lokasiArsip, $namafilebaru);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!isset($dataInput['password'])) {
			unset($dataInput['password'], $dataInput['id'], $dataInput['foto_pembelajar_remove']);
		} else {
			unset($dataInput['id'], $dataInput['foto_pembelajar_remove']);
			$dataInput['password'] = md5($dataInput['password']);
		}

		if($_FILES["foto_pembelajar"]["name"] == ''){
			$update = $this->proses_update_pembelajar($dataInput, $id);
			$code = $update['code'];
			$message = $update['message'];
		}else{
			if ($this->upload->do_upload("foto_pembelajar")) {
				if (is_file(FCPATH . 'assets/lampiran/' . $datapembelajar->foto)) {
					unlink(FCPATH . 'assets/lampiran/' . $datapembelajar->foto);
				}
				$dataInput['foto'] = $namafilebaru;
				$update = $this->proses_update_pembelajar($dataInput, $id);
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
		$getdata = $this->pembelajar->where(['id' => $id])->get();

		// d($pengajar_kategori);
		$data = [
			'data' => $getdata,
		];
        $this->loadViewAdmin("master/pembelajar/v_keloladetailpembelajar", $data);
	}

	public function verifikasi()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$data = [
			'is_verified'	=> 	1
		];
		$update = $this->pembelajar->update($data, $id);

		if($update){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> "Data berhasil diverifikasi",
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Data gagal diverifikasi",
			]);
		}
	}

	public function hapus_data()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		// $deletetransaksi = $this->transaksi->where(['id_pembelajar' => $id])->delete();
		$delete = $this->pembelajar->delete($id);

		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Data berhasil terhapus",
		]);
	}
}
