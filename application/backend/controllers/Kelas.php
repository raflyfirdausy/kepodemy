<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadViewAdmin("master/kelas/v_kelas");
	}

    public function tambah_data()
    {
        $this->loadViewAdmin("master/kelas/v_tambahkelas");
	}

    public function edit_data()
    {
		$data = [
			'namakelas'	=> "Kelas Programming",
		];
        $this->loadViewAdmin("master/kelas/v_editkelas", $data);
	}

	public function simpan_data()
	{
		$dataInput = $this->input->post();
		// $namemember = unserialize($dataInput['NamaPendidikan']);
		// foreach( $namemember as $value ) {
		// 	print $value;
		// }
		$data = $dataInput["tglPembelajaran"] ." ". $dataInput["jamPembelajaran"];
		$dataInput['waktuPembelajaran'] = date("d-m-Y H:i", strtotime($data));
		unset($dataInput["tglPembelajaran"], $dataInput["jamPembelajaran"]);
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

	public function update_data()
	{
		$dataInput  = $this->input->post();
		$data = $dataInput["tglPembelajaran"] ." ". $dataInput["jamPembelajaran"];
		$dataInput['waktuPembelajaran'] = date("d-m-Y H:i", strtotime($data));
		unset($dataInput["tglPembelajaran"], $dataInput["jamPembelajaran"]);
		var_dump($dataInput);
	}

	public function detail($status)
    {
		$data = [
			'status' => $status,
			'namakelas' => 'Web'
		];
        $this->loadViewAdmin("master/kelas/v_subkelas", $data);
	}
	

	public function hapus_kelas()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Data berhasil terhapus",
		]);
	}
}
