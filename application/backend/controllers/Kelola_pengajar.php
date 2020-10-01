<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_pengajar extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model("Pengajar_model", "pengajar");
		$this->load->model("Kategori_model", "kategori");
    }

    public function index()
    {
        $this->loadViewAdmin("master/pengajar/v_kelolapengajar");
	}

	public function config($lokasiArsip,$namafilebaru){
		$config  = [
            "upload_path"       => $lokasiArsip,
            "allowed_types"     => 'gif|jpg|jpeg|png',
            "max_size"          => 2048,
            "file_ext_tolower"  => FALSE,
            "overwrite"         => TRUE,
            "remove_spaces"     => TRUE,
            "file_name"         => $namafilebaru
		];
		
		return $config;
	}

	public function insertKategoriProduk($array, $idkelas)
	{
		$data = [];
		foreach ($array as $key => $val) {
			$getKategori = $this->kategori->get_kategori($val);
			$data = [
				'id_kelas' => $idkelas,
				'id_kategori' => $getKategori->id,
				'keterangan' => $getKategori->keterangan,
			];

			$insert = $this->produk_kategori->save($data);
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
	
	public function simpan_data()
	{
		$dataInput = $this->input->post();
		// $namemember = unserialize($dataInput['NamaPendidikan']);
		// foreach( $namemember as $value ) {
		// 	print $value;
		// }
		unset($dataInput['foto_pengajar_remove'], $dataInput['passwordConfirm']);
		var_dump($_FILES["foto_pengajar"]["name"]);
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
