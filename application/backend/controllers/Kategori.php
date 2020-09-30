<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("Kategori_model", "kategori");
    }

    public function index()
    {
        $this->loadViewAdmin("master/kategori/v_kategori");
	}

	public function get_all_data()
	{
		$all = $this->kategori->get_all_data();
		$output = "";
		$i = 1;
		foreach ($all as $dt) {
			$output .= "<tr>";
			$output .= "<td class='text-center'>". $i++ ."</td>";
			$output .= "<td><span class='txt-kategori'>". $dt->nama ."</span></td>";
			$output .= "<td><span class='txt-keterangan'>". $dt->keterangan ."</span></td>";
			$output .= "<td>". $this->kategori->get_jumah_sub($dt->id) ."</td>";
			$output .= "<td class='text-center'>";
			$output .= "<button type='button' class='btn btn-sm btn-clean btn-icon btn-edit-kategori' data-id='". $dt->id ."' title='Edit'><i class='la la-edit text-warning'></i></button>";
			$output .= "<a href='". base_url('kategori/detail/') . $dt->id  ."' type='button' class='btn btn-sm btn-clean btn-icon' title='Subkategori'><i class='la la-list-ul text-success'></i></a>";
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

	public function simpan_kategori()
	{
		$dataInput = $this->input->post();
		unset($dataInput["id"]);
		$dataInput['slug'] = slug($dataInput['nama']);
		$cekdata = $this->kategori->where(['nama' => $dataInput['nama']])->count_rows();
		if($cekdata > 0){
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Nama kategori sudah pernah diinput, silahkan dicek kembbali"
			]);
		}else{
			$save = $this->kategori->save($dataInput);
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
	}
	
	public function simpan_subkategori()
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

	public function update_kategori()
	{
		$dataInput  = $this->input->post();
		var_dump($dataInput);
	}

	public function update_subkategori()
	{
		$dataInput  = $this->input->post();
		var_dump($dataInput);
	}

	public function detail($status)
    {
		$data = [
			'status' => $status,
			'namakategori' => 'Web'
		];
        $this->loadViewAdmin("master/kategori/v_subkategori", $data);
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

	public function hapus_kategori()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Data berhasil terhapus",
		]);
	}
}
