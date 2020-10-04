<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends Admin_Controller
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
        $this->loadViewAdmin("transaksi/pendaftaran_pengajar/v_pengajar");
	}
	
    public function pending()
    {
        $this->loadViewAdmin("transaksi/pendaftaran_pengajar/v_pengajarpending");
	}

	public function get_pengajar()
	{
		$dataInput  = $this->input->post();
		$status = $dataInput["status"];
		$all = $this->pengajar->get_pengajar(FALSE, $status);
		// d($all);
		$output = "";
		$i = 1;
		foreach ($all as $dt) {
			$output .= "<tr>";
			$output .= "<td class='text-center'>" . $i++ . "</td>";
			$output .= "<td>" . $dt->nama . "</td>";
			$output .= "<td>" . $dt->email . "</td>";
			$kategori = "";
			$status = "";
			
			if (!empty($dt->pengajarkategori)) {
				$size = sizeof((array)$dt->pengajarkategori);
				$x = 0;
				foreach ($dt->pengajarkategori as $pk) {
					$kategori .= $pk->kategori->nama;
					if (++$x !== $size) {
						$kategori .= ", ";
					}
				}
			}
			
			$output .= "<td>" . $kategori . "</td>";
			$output .= "<td>" . $dt->jabatan . "</td>";
			$output .= "<td>" . just_date($dt->created_at) . "</td>";
			$output .= "<td class='text-center'>";
			$output .= "<a href='" . base_url('pengajar/detail/') . $dt->id . "' type='button' class='btn btn-sm btn-clean btn-icon' title='Edit'><i class='la la-edit text-success'></i></a>";
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

    public function diterima()
    {
        $this->loadViewAdmin("transaksi/pendaftaran_pengajar/v_pengajarterima");
	
	}
    public function ditolak()
    {
        $this->loadViewAdmin("transaksi/pendaftaran_pengajar/v_pengajartolak");
	}
	
    public function detail($id)
    {
		$getdata = $this->pengajar->getdetailpengajar($id);
		// d($getdata);
		$kategori = "";
		if (!empty($getdata->pengajarkategori)) {
			$size = sizeof((array)$getdata->pengajarkategori);
			$x = 0;
			foreach ($getdata->pengajarkategori as $xx) {
				$kategori .= $xx->kategori->nama;
				if (++$x !== $size) {
					$kategori .= ", ";
				}
			}
		}

		// d($kategori);	
		$data = [
			'data' => $getdata,
			'kategori'	=> $kategori
		];
        $this->loadViewAdmin("transaksi/pendaftaran_pengajar/v_detailpengajar", $data);
	}

	public function getPekerjaanPengajar()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];
		$getdata = $this->pengajar_pekerjaan->where(['id_pengajar' => $id])->get_all();
		$output = "";
		foreach ($getdata as $dt) {
			$output .= "<tr>";
			$output .= "<td>" . $dt->nama_pekerjaan . "</td>";
			$output .= "<td>" . $dt->tahun_masuk . "</td>";
			$output .= "<td>" . $dt->tahun_keluar . "</td>";
			$output .= "<td>" . $dt->posisi . "</td>";
			$output .= "<td>" . $dt->pencapaian . "</td>";
			$output .= "<td>" . $dt->keterangan . "</td>";
		
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
			$output .= "<td>" . $dt->nama_pendidikan . "</td>";
			$output .= "<td>" . $dt->tahun_masuk . "</td>";
			$output .= "<td>" . $dt->tahun_keluar . "</td>";
			$output .= "<td>" . $dt->jurusan . "</td>";
			$output .= "<td>" . $dt->keterangan . "</td>";
			
			$output .= "</tr>";
		}

		echo json_encode([
			'response_code'	=> 200,
			'response_message'	=> "Berhasil load data",
			'output'	=> $output
		]);
	}
	
	public function hapus_data()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$deletekategori = $this->pengajar_kategori->where(['id_pengajar' => $id])->delete();
		$deletepekerjaan = $this->pengajar_pekerjaan->where(['id_pengajar' => $id])->delete();
		$deletependidikan = $this->pengajar_pendidikan->where(['id_pengajar' => $id])->delete();
		$delete = $this->pengajar->delete($id);


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

	public function terimaPengajar()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$data = [
			'is_verified'	=> 	1
		];
		$update = $this->pengajar->update($data, $id);

		if($update){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> "Pengajar berhasil diterima",
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Pengajar gagal diterima",
			]);
		}
	}

	public function tolakPengajar()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["id"];

		$data = [
			'is_verified'	=> 	3,
			'keterangan'	=> $dataInput['keterangan']
		];
		$update = $this->pengajar->update($data, $id);

		if($update){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> "Pengajar berhasil ditolak",
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Pengajar gagal ditolak",
			]);
		}
	}

}
