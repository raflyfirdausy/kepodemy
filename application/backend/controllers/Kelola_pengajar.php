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
        $this->loadViewAdmin("master/pengajar/v_kelolapengajar");
	}

	public function configuration($lokasiArsip,$namafilebaru){
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
	
	public function proses_simpan_pengajar($dataheaderpengajar, $dataInput, $datakategori)
	{
		$cekdata = $this->pengajar->where(['email' => $dataheaderpengajar['email']])->count_rows();
		if($cekdata > 0){
			$code = "500";
			$message = "Email sudah pernah terdaftar, silahkan email yang lain";
		}else{
			$save = $this->pengajar->save($dataheaderpengajar);
			$idpengajar = $save;
			if($save){
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
			}else{
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

	public function proses_update_pengajar($dataInput, $id)
	{
		$update = $this->pengajar->update($dataInput, $id);
		if($update){
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
			if($savependidikan){
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
	}
	
	public function simpan_data()
	{
		$dataInput = $this->input->post();
		
		$pengajar = str_replace(' ', '_', strtolower($dataInput['nama']));
		$code = "";
		$message = "";
		// $namafilebaru =  "pengajar_". $pengajar . "_" . time() . "." . pathinfo($_FILES["foto_pengajar"]["name"], PATHINFO_EXTENSION);
		$cvbaru =  "cv_". $pengajar . "_" . time() . "." . pathinfo($_FILES["foto_pengajar"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = "assets/pengajar/";
        $lokasiCV = "assets/lampiran/";
		$config = $this->configuration($lokasiArsip,$namafilebaru);
		$config2 = $this->configuration($lokasiCV,$cvbaru);

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

	
		if($_FILES["foto_pengajar"]["name"] == ''){
			if($_FILES["cv"]["name"] == ''){
				$insert = $this->proses_simpan_pengajar($dataheaderpengajar, $dataInput, $datakategori);
				$code = $insert['code'];
				$message = $insert['message'];
			}
			else{
				$this->load->library('upload', $config2);
				$uploadcv = $this->upload->initialize($config2);
				if ($this->upload->do_upload("cv")) {
					$dataheaderpengajar['cv'] = $cvbaru;
					$insert = $this->proses_simpan_pengajar($dataheaderpengajar, $dataInput, $datakategori);
					$code = $insert['code'];
					$message = $insert['message'];
				}
				else{
					$error = array('error' => $this->upload->display_errors("", ""));
					$code = "500";
					$message = implode("<br>", $error);
				}
			}
		}
		else{
			if($_FILES["cv"]["name"] == ''){
				$this->load->library('upload', $config);
				$uploadfoto = $this->upload->initialize($config);
				if ($this->upload->do_upload("foto_pengajar")) {
					$dataheaderpengajar['foto'] = $namafilebaru;
					$insert = $this->proses_simpan_pengajar($dataheaderpengajar, $dataInput, $datakategori);
					$code = $insert['code'];
					$message = $insert['message'];
				}
				else{
					$error = array('error' => $this->upload->display_errors("", ""));
					$code = "500";
					$message = implode("<br>", $error);
				}
			}
			else{
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
					}
					else{
						$error = array('error' => $this->upload->display_errors("", ""));
						$code = "500";
						$message = implode("<br>", $error);
					}
				}
				else{
					$error = array('error' => $this->upload->display_errors("", ""));
					$code = "500";
					$message = implode("<br>", $error);
				}
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
			$gender .= "<option value='". $xx ."' $select>". $xx ."</option>";
		}

		$level = "";
		$lvl = "Super Admin";
		foreach (Level() as $yy) {
			$selected = $yy == $lvl ? "selected" : "";
			$level .= "<option value='". $yy ."' $selected>". $yy ."</option>";
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
		var_dump($dataInput);
	}

	public function detail_pengajar($status)
    {
		$data = [
			'status' => $status
		];
        $this->loadViewAdmin("master/pengajar/v_keloladetailpengajar", $data);
	}
	
	public function upload_file()
	{
		if(!empty($_FILES['file']['name'])){
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


	public function simpan_pendidikan()
	{
		$dataInput  = $this->input->post();
		unset($dataInput["idPendidikan"]);
		var_dump($dataInput);
	}

	public function simpan_pekerjaan()
	{
		$dataInput  = $this->input->post();
		unset($dataInput["idPekerjaan"]);
		var_dump($dataInput);
	}

	public function update_pekerjaan()
	{
		$dataInput  = $this->input->post();
		var_dump($dataInput);
	}

	public function update_pendidikan()
	{
		$dataInput  = $this->input->post();
		var_dump($dataInput);
	}

	public function hapus_pekerjaan()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Data berhasil terhapus",
		]);
	}

	public function hapus_pendidikan()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Data berhasil terhapus",
		]);
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
