<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("Produk_model", "produk");
		$this->load->model("Pengajar_model", "pengajar");
		$this->load->model("Kategori_model", "kategori");
		$this->load->model("ProdukKategori_model", "produk_kategori");
    }

    public function index()
    {
		
        $this->loadViewAdmin("master/kelas/v_kelas");
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
		$listPengajar = $this->pengajar->get_all_data();
		$listKategori = $this->kategori->get_lookup_kategori();
		// d($listPengajar);
		$data = [
			'listPengajar'	=> $listPengajar,
			'listKategori'	=> $listKategori
		];
        $this->loadViewAdmin("master/kelas/v_tambahkelas", $data);
	}

	public function get_all_data()
	{
		$all = $this->produk->get_all_kelas();
		$output = "";
		$i = 1;
		foreach ($all as $dt) {
			$output .= "<tr>";
			$output .= "<td class='text-center'>". $i++ ."</td>";
			$output .= "<td><span class='txt-kelas'>". $dt->nama ."</span></td>";
			$output .= "<td>". $dt->tipe_produk ."</td>";
			$output .= "<td>". $dt->harga ."</td>";
			$output .= "<td>". $dt->pengajar->nama ."</td>";
			$output .= "<td>". just_date($dt->tanggal) ." ". just_time($dt->jam_mulai)." - ". just_time($dt->jam_selesai) ."</td>";
			$output .= "<td class='text-center'>";
			$output .= "<a href='" . base_url('kelas/detail/'). $dt->id. "' type='button' class='btn btn-sm btn-clean btn-icon' title='Edit'><i class='la la-edit text-warning'></i></a>";
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


    public function edit_data()
    {
		$data = [
			'namakelas'	=> "Kelas Programming",
		];
        $this->loadViewAdmin("master/kelas/v_editkelas", $data);
	}

	public function proses_simpan_kelas($dataInput, $datakategori)
	{
		$cekdata = $this->produk->where(['nama' => $dataInput['nama'], 'tipe_produk' => 'kelas'])->count_rows();
		if($cekdata > 0){
			$code = "500";
			$message = "Nama kelas sudah pernah diinput, silahkan gunakan nama yang lain";
		}else{
			$saveproduk = $this->produk->save($dataInput);
			if($saveproduk){
				$idkelas = $saveproduk;
				$insertkategoriproduk = $this->insertKategoriProduk($datakategori, $idkelas);
				$code = "200";
				$message = "Data berhasil disimpan";
			}
			else{
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
		$dataInput = $this->input->post();
		$dataInput['tipe_produk'] = "kelas";
		$code = "";
		$message = "";
		$namafilebaru =  "produk_". $dataInput['nama'] . "_" . time() . "." . pathinfo($_FILES["file_gambar_header"]["name"], PATHINFO_EXTENSION);
        $lokasiArsip = "assets/website/desa/";
		$config = $this->config($lokasiArsip,$namafilebaru);
		
        $this->load->library('upload', $config);
		$this->upload->initialize($config);
		$datakategori = $dataInput['kategori'];
		unset($dataInput['kategori']);

		if($_FILES["file_gambar_header"]["name"] == ''){
			$insertkelas = $this->proses_simpan_kelas($dataInput, $datakategori);
			$code = $insertkelas['code'];
			$message = $insertkelas['message'];
		}else{
			if ($this->upload->do_upload("file_gambar_header")) {
				$dataInput['gambar'] = $namafilebaru;
				$insertkelas = $this->proses_simpan_kelas($dataInput, $datakategori);
				$code = $insertkelas['code'];
				$message = $insertkelas['message'];
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
        $this->loadViewAdmin("master/kelas/v_editkelas", $data);
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
