<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_pembelajar extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadViewAdmin("master/pembelajar/v_kelolapembelajar");
	}

    public function tambah_data()
    {
        $this->loadViewAdmin("master/pembelajar/v_tambahpembelajar");
	}
	
	public function simpan_data()
	{
		$dataInput = $this->input->post();
		// $namemember = unserialize($dataInput['NamaPendidikan']);
		// foreach( $namemember as $value ) {
		// 	print $value;
		// }
		var_dump($dataInput);
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

	public function update_pembelajar()
	{
		$dataInput  = $this->input->post();
		var_dump($dataInput);
	}

	public function detail_pembelajar($status)
    {
		$data = [
			'status' => $status
		];
        $this->loadViewAdmin("master/pembelajar/v_keloladetailpembelajar", $data);
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

	public function hapus_pembelajar()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Data berhasil terhapus",
		]);
	}
}
