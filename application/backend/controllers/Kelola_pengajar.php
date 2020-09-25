<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_pengajar extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadViewAdmin("master/pengajar/v_kelolapengajar");
	}

    public function tambah_data()
    {
        $this->loadViewAdmin("master/pengajar/v_tambahpengajar");
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

	public function update_data()
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
		// $cek = "cek";
		// var_dump($cek);
		return json_encode([
			'code' => 200
		]);
	}
}
