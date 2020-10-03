<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_pengajar extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Pengajar_model", "pengajar");
		$this->load->model("Kategori_model", "kategori");
		$this->load->model("PengajarPendidikan_model", "pengajar_pendidikan");
		$this->load->model("PengajarPekerjaan_model", "pengajar_pekerjaan");
		$this->load->model("PengajarKategori_model", "pengajar_kategori");
	}

	public function index()
	{
		// $all = $this->pengajar->all();
		// d($all);
		// foreach ($all as $dt) {
		// 	$size = sizeof((array)$dt->pengajarkategori);
		// 	$x = 0;
		// 	$kategori = "";
		// 	foreach ($dt->pengajarkategori as $pk) {
		// 		$kategori .= $pk->kategori->nama;
		// 		if (++$x !== $size){
		// 			$kategori .= ", ";
		// 		}
		// 	}
		// }
		// d($kategori);
		$this->loadViewAdmin("master/pengajar/v_kelolapengajar");
	}

	public function config($lokasiArsip, $namafilebaru)
	{
		$config  = [
			"upload_path"       => $lokasiArsip,
			"allowed_types"     => 'gif|jpg|jpeg|png|pdf|docx|doc|xlsx|xls|ppt|pptx|txt|text/plain',
			"max_size"          => 10240,
			"file_ext_tolower"  => FALSE,
			"overwrite"         => TRUE,
			"remove_spaces"     => TRUE,
			"file_name"         => $namafilebaru
		];

		return $config;
	}

	public function insertKategoriPengajar($array, $idpengajar)
	{
		$data = [];
		foreach ($array as $key => $val) {
			$getKategori = $this->kategori->get_kategori($val);
			$data = [
				'id_pengajar' => $idpengajar,
				'id_kategori' => $getKategori->id,
				'keterangan' => $getKategori->keterangan,
			];

			$insert = $this->pengajar_kategori->save($data);
		}

		return true;
	}

	public function tambah_data()
	{
		$listKategori = $this->kategori->get_lookup_kategori();
		// d($listPengajar);
		$data = [
			'listKategori'	=> $listKategori
		];
		$this->loadViewAdmin("master/pengajar/v_tambahpengajar", $data);
	}

	public function get_all_data()
	{
		$all = $this->pengajar->all();
		// d($all);
		$output = "";
		$i = 1;
		foreach ($all as $dt) {
			$output .= "<tr>";
			$output .= "<td class='text-center'>". $i++ ."</td>";
			$output .= "<td>". $dt->nama ."</td>";
			$output .= "<td>". $dt->email ."</td>";
			$kategori = "";
			$size = sizeof((array)$dt->pengajarkategori);
			$x = 0;
			foreach ($dt->pengajarkategori as $pk) {
				$kategori .= $pk->kategori->nama;
				if (++$x !== $size){
					$kategori .= ", ";
				}
			}
			$output .= "<td>". $kategori ."</td>";
			$output .= "<td>". $dt->jabatan ."</td>";
			$output .= "<td>". $dt->no_hp ."</td>";
			$output .= "<td class='text-center'>";
			$output .= "<a href='" . base_url('kelola_pengajar/detail/'). $dt->id. "' type='button' class='btn btn-sm btn-clean btn-icon' title='Edit'><i class='la la-edit text-success'></i></a>";
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

	public function proses_simpan_pengajar($dataheaderpengajar, $dataInput, $datakategori)
	{
		$cekdata = $this->pengajar->where(['email' => $dataheaderpengajar['email']])->count_rows();
		if ($cekdata > 0) {
			$code = "500";
			$message = "Email sudah pernah terdaftar, silahkan email yang lain";
		} else {
			$save = $this->pengajar->save($dataheaderpengajar);
			$idpengajar = $save;
			if ($save) {
				$insertKategoriPengajar = $this->insertKategoriPengajar($datakategori, $idpengajar);
				if (isset($dataInput['nama_pendidikan'])) {
					$rows = count($dataInput['nama_pendidikan']);
					$dataPendidikan[] = [];
					for ($i = 0; $i < $rows; $i++) {
						$dataPendidikan[$i] = [
							"id_pengajar"	=> $idpengajar,
							"nama_pendidikan"	=> $dataInput['nama_pendidikan'][$i],
							"tahun_masuk"	=> $dataInput['tahun_masuk'][$i],
							"tahun_keluar"	=> $dataInput['tahun_keluar'][$i],
							"jurusan"	=> $dataInput['jurusan'][$i],
							"keterangan"	=> $dataInput['keterangan_pendidikan'][$i],
						];
					}
					$savependidikan = $this->pengajar_pendidikan->save($dataPendidikan);
				}

				if (isset($dataInput['nama_pekerjaan'])) {
					$rows_pk = count($dataInput['nama_pekerjaan']);
					$dataPekerjaan[] = [];
					for ($x = 0; $x < $rows_pk; $x++) {
						$dataPekerjaan[$x] = [
							"id_pengajar"	=> $idpengajar,
							"nama_pekerjaan"	=> $dataInput['nama_pekerjaan'][$x],
							"tahun_masuk"	=> $dataInput['tahun_masuk_kerja'][$x],
							"tahun_keluar"	=> $dataInput['tahun_keluar_kerja'][$x],
							"posisi"	=> $dataInput['posisi'][$x],
							"pencapaian"	=> $dataInput['pencapaian'][$x],
							"keterangan"	=> $dataInput['keterangan_pekerjaan'][$x],
						];
					}

					$savepekerjaan = $this->pengajar_pekerjaan->save($dataPekerjaan);
				}
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

	public function proses_update_pengajar($dataInput, $datakategori, $id)
	{
		$update = $this->pengajar->update($dataInput, $id);
		if ($update) {
			$insertKategoriPengajar = $this->insertKategoriPengajar($datakategori, $id);
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

	public function cek()
	{
		d($_FILES["cv"]);
		$dataInput = $this->input->post();
		// d($dataInput);
		if (isset($dataInput['nama_pendidikan'])) {
			$rows = count($dataInput['nama_pendidikan']);
			$dataPendidikan[] = [];
			for ($i = 0; $i < $rows; $i++) {
				$dataPendidikan[$i] = [
					"id_pengajar"	=> 1,
					"nama_pendidikan"	=> $dataInput['nama_pendidikan'][$i],
					"tahun_masuk"	=> $dataInput['tahun_masuk'][$i],
					"tahun_keluar"	=> $dataInput['tahun_keluar'][$i],
					"jurusan"	=> $dataInput['jurusan'][$i],
					"keterangan"	=> $dataInput['keterangan_pendidikan'][$i],
				];
			}
			// d($dataPendidikan);
			$savependidikan = $this->pengajar_pendidikan->save($dataPendidikan);
			if ($savependidikan) {
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
	}

	public function simpan_data()
	{
		$dataInput = $this->input->post();
		
		$pengajar = str_replace(' ', '_', strtolower($dataInput['nama']));
		$code = "";
		$message = "";
		$namafilebaru =  "pengajar_" . $pengajar . "_" . time() . "." . pathinfo($_FILES["foto_pengajar"]["name"], PATHINFO_EXTENSION);
		$cvbaru =  "cv_" . $pengajar . "_" . time() . "." . pathinfo($_FILES["cv"]["name"], PATHINFO_EXTENSION);
		$lokasiArsip = "assets/pengajar/";
		$lokasiCV = "assets/lampiran/";

		$config = $this->config($lokasiArsip, $namafilebaru);
		$config2 = $this->config($lokasiCV, $cvbaru);

		// d($config2);

		$datakategori = $dataInput['kategori'];

		$dataheaderpengajar = [
			'email'			=> $dataInput['email'],
			'nama'			=> $dataInput['nama'],
			'password'		=> md5($dataInput['password']),
			'no_hp'			=> $dataInput['no_hp'],
			'jabatan'		=> $dataInput['jabatan'],
			'deskripsi'		=> $dataInput['deskripsi'],
			'foto'			=> '',
			'cv'			=> '',
		];
		// $this->load->library('upload', $config);
		// $uploadfoto = $this->upload->initialize($config);


		if ($_FILES["foto_pengajar"]["name"] == '') {
			if ($_FILES["cv"]["name"] == '') {
				$insert = $this->proses_simpan_pengajar($dataheaderpengajar, $dataInput, $datakategori);
				$code = $insert['code'];
				$message = $insert['message'];
			} else {
				$this->load->library('upload', $config2);
				$uploadcv = $this->upload->initialize($config2);
				if ($this->upload->do_upload("cv")) {
					$dataheaderpengajar['cv'] = $cvbaru;
					$insert = $this->proses_simpan_pengajar($dataheaderpengajar, $dataInput, $datakategori);
					$code = $insert['code'];
					$message = $insert['message'];
				} else {
					$error = array('error' => $this->upload->display_errors("", ""));
					$code = "500";
					$message = implode("<br>", $error);
				}
			}
		} else {
			if ($_FILES["cv"]["name"] == '') {
				$this->load->library('upload', $config);
				$uploadfoto = $this->upload->initialize($config);
				if ($this->upload->do_upload("foto_pengajar")) {
					$dataheaderpengajar['foto'] = $namafilebaru;
					$insert = $this->proses_simpan_pengajar($dataheaderpengajar, $dataInput, $datakategori);
					$code = $insert['code'];
					$message = $insert['message'];
				} else {
					$error = array('error' => $this->upload->display_errors("", ""));
					$code = "500";
					$message = implode("<br>", $error);
				}
			} else {
				$this->load->library('upload', $config);
				$uploadfoto = $this->upload->initialize($config);
				if ($this->upload->do_upload("foto_pengajar")) {
					$dataheaderpengajar['foto'] = $namafilebaru;
					$this->load->library('upload', $config2);
					$uploadcv = $this->upload->initialize($config2);
					if ($this->upload->do_upload("cv")) {
						$dataheaderpengajar['cv'] = $cvbaru;
						$insert = $this->proses_simpan_pengajar($dataheaderpengajar, $dataInput, $datakategori);
						$code = $insert['code'];
						$message = $insert['message'];
					} else {
						$error = array('error' => $this->upload->display_errors("", ""));
						$code = "500";
						$message = implode("<br>", $error);
					}
				} else {
					$error = array('error' => $this->upload->display_errors("", ""));
					$code = "500";
					$message = implode("<br>", $error);
				}
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

	public function get_data()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];
		$data = [
			'email'	=> "Rafly@gmail.com",
			'password'	=> "12345678",
			'nama'	=> "Rafly Firadusy Irawan",
			'alamat'	=> "Sokaraja, Banyumas",
			'keterangan'	=> "Belum Menikah",
			'nohp'	=> "087712341122",
		];

		$gender = "";
		$jk = "Perempuan";
		foreach (Gender() as $xx) {
			$select = $xx == $jk ? "selected" : "";
			$gender .= "<option value='" . $xx . "' $select>" . $xx . "</option>";
		}

		$level = "";
		$lvl = "Super Admin";
		foreach (Level() as $yy) {
			$selected = $yy == $lvl ? "selected" : "";
			$level .= "<option value='" . $yy . "' $selected>" . $yy . "</option>";
		}

		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Berhasil ambil data",
			'datapersonal' => $data,
			'gender' => $gender,
			'level' => $level
		]);
	}

	public function get_pekerjaan()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];
		$data = [
			'namaperusahaan'	=> "Ultranesia.com",
			'waktumasuk'	=> "2019",
			'waktukeluar'	=> "2020",
			'posisi'	=> "Web Developer",
			'keterangan'	=> "Web Programming Technical",
		];


		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Berhasil ambil data",
			'datapekerjaan' => $data,
		]);
	}

	public function get_pendidikan()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];
		$data = [
			'naampendidikan'	=> "Universitas Amikom Purwokerto",
			'waktumasuk'	=> "2016",
			'waktukeluar'	=> "2020",
			'jurusan'	=> "Informatika",
			'keterangan'	=> "Teknik Informatika Programming",
		];


		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Berhasil ambil data",
			'datapendidikan' => $data,
		]);
	}

	public function update_pengajar()
	{
		$dataInput  = $this->input->post();
		$id =  $dataInput['id'];
		$datapengajar = $this->pengajar->where(['id' => $id])->get();

		//hapus kategori
		$deletekategori = $this->pengajar_kategori->where(['id_pengajar' => $id])->delete();

		$pengajar = str_replace(' ', '_', strtolower($dataInput['nama']));
		$code = "";
		$message = "";
		$namafilebaru =  "pengajar_" . $pengajar . "_" . time() . "." . pathinfo($_FILES["foto_pengajar"]["name"], PATHINFO_EXTENSION);
		$lokasiArsip = "assets/pengajar/";

		$config = $this->config($lokasiArsip, $namafilebaru);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		$datakategori = $dataInput['kategori'];
		if(!isset($dataInput['password'])){
			unset($dataInput['kategori'], $dataInput['password'], $dataInput['id'], $dataInput['foto_pengajar_remove']);
		}
		else{
			unset($dataInput['kategori'], $dataInput['id'], $dataInput['foto_pengajar_remove']);
			$dataInput['password'] = md5($dataInput['password']);
		}
		if($_FILES["foto_pengajar"]["name"] == ''){
			$update = $this->proses_update_pengajar($dataInput, $datakategori, $id);
			$code = $update['code'];
			$message = $update['message'];
		}else{
			if ($this->upload->do_upload("foto_pengajar")) {
				if (is_file(FCPATH . 'assets/pengajar/' . $datapengajar->foto)) {
                    unlink(FCPATH . 'assets/pengajar/' . $datapengajar->foto);
                }
				$dataInput['foto'] = $namafilebaru;
				$update = $this->proses_update_pengajar($dataInput, $datakategori, $id);
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
		$getdata = $this->pengajar->where(['id' => $id])->get();
		$listKategori = $this->kategori->get_lookup_kategori();
		$getpengajarkategori = $this->pengajar_kategori->where(['id_pengajar' => $id])->get_all();
		// d($listKategori);
		$pengajar_kategori = [];
        foreach($getpengajarkategori as $pk)
        {
            $pengajar_kategori[] = $pk->id_kategori;
		}
		
		// d($pengajar_kategori);
		$data = [
			'data' => $getdata,
			'listKategori'	=> $listKategori,
			'pengajar_kategori' => $pengajar_kategori
		];

		$this->loadViewAdmin("master/pengajar/v_keloladetailpengajar", $data);
	}

	public function getPekerjaanPengajar()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];
		$getdata = $this->pengajar_pekerjaan->where(['id_pengajar' => $id])->get_all();
		$output = "";
		foreach ($getdata as $dt) {
			$output .= "<tr>";
			$output .= "<td>". $dt->nama_pekerjaan ."</td>";
			$output .= "<td>". $dt->tahun_masuk ."</td>";
			$output .= "<td>". $dt->tahun_keluar ."</td>";
			$output .= "<td>". $dt->posisi ."</td>";
			$output .= "<td>". $dt->pencapaian ."</td>";
			$output .= "<td>". $dt->keterangan ."</td>";
			$output .= "<td class='text-center'>";
			$output .= "<button type='button' class='btn btn-sm font-weight-bolder btn-light-success btn-edit-pekerjaan mr-2' title='Edit' data-id='". $dt->id ."'><i class='la la-edit'></i></button>";
			$output .= "<button type='button' class='btn btn-sm font-weight-bolder btn-light-danger btn-delete-pekerjaan' data-id='". $dt->id ."' title='Hapus data'><i class='la la-trash-o'></i></button>";
			$output .= "</td>";
			$output .= "</tr>";
		}

		echo json_encode([
			'response_code'	=> 200,
			'response_message'	=> "Berhasil load data",
			'output'	=> $output
		]);
	}

	public function getPendidikanPengajar()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];
		$getdata = $this->pengajar_pendidikan->where(['id_pengajar' => $id])->get_all();
		$output = "";
		foreach ($getdata as $dt) {
			$output .= "<tr>";
			$output .= "<td>". $dt->nama_pendidikan ."</td>";
			$output .= "<td>". $dt->tahun_masuk ."</td>";
			$output .= "<td>". $dt->tahun_keluar ."</td>";
			$output .= "<td>". $dt->jurusan ."</td>";
			$output .= "<td>". $dt->keterangan ."</td>";
			$output .= "<td class='text-center'>";
			$output .= "<button type='button' class='btn btn-sm font-weight-bolder btn-light-success btn-edit-pendidikan mr-2' title='Edit' data-id='". $dt->id ."'><i class='la la-edit'></i></button>";
			$output .= "<button type='button' class='btn btn-sm font-weight-bolder btn-light-danger btn-delete-pendidikan' data-id='". $dt->id ."' title='Hapus data'><i class='la la-trash-o'></i></button>";
			$output .= "</td>";
			$output .= "</tr>";
		}

		echo json_encode([
			'response_code'	=> 200,
			'response_message'	=> "Berhasil load data",
			'output'	=> $output
		]);
	}

	public function getLampiran()
	{

	}

	public function getPekerjaanPengajarById()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];
		$data = $this->pengajar_pekerjaan->where(['id' => $id])->get();
		

		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Data telah ditemukan",
			'datapekerjaan' => $data,
		]);
	}

	public function getPendidikanPengajarById()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];
		$data = $this->pengajar_pendidikan->where(['id' => $id])->get();
		

		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Data telah ditemukan",
			'datapendidikan' => $data,
		]);
	}

	public function savePekerjaanPengajar()
	{
		$dataInput  = $this->input->post();
		// var_dump($dataInput);
		unset($dataInput["id"]);
		$save = $this->pengajar_pekerjaan->save($dataInput);
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

	public function savePendidikanPengajar()
	{
		$dataInput  = $this->input->post();
		unset($dataInput["id"]);
		$save = $this->pengajar_pendidikan->save($dataInput);
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

	public function updatePekerjaanPengajar()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput['id'];
		unset($dataInput["id"], $dataInput['id_pengajar']);
		$update = $this->pengajar_pekerjaan->update($dataInput, $id);
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

	public function updatePendidikanPengajar()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput['id'];
		unset($dataInput["id"], $dataInput['id_pengajar']);
		$update = $this->pengajar_pendidikan->update($dataInput, $id);
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

	public function hapus_pekerjaan()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$delete = $this->pengajar_pekerjaan->delete($id);

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

	public function hapus_pendidikan()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$delete = $this->pengajar_pendidikan->delete($id);

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

	public function upload_file()
	{
		if (!empty($_FILES['file']['name'])) {
			$file = $_FILES['file']['name'];
			// // Set preference
			// $config['upload_path'] = 'uploads/'; 
			// $config['allowed_types'] = 'jpg|jpeg|png|gif';
			// $config['max_size'] = '1024'; // max_size in kb
			// $config['file_name'] = $_FILES['file']['name'];

			// //Load upload library
			// $this->load->library('upload',$config); 

			// // File upload
			// if($this->upload->do_upload('file')){
			//   // Get data about the file
			//   $uploadData = $this->upload->data();
			// }

			echo json_encode([
				'response_code' => 200,
				'response_message' => "Upload berhasil",
				'nama_file'	=> $file
			]);
		}
	}

	public function hapus_lampiran()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Data berhasil terhapus",
		]);
	}
}
