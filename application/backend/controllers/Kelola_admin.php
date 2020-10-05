<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_admin extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("Admin_model", "admin");
    }

    public function index()
    {
		
        $this->loadViewAdmin("master/admin/v_kelolaadmin");
	}

	public function get_all_data()
	{
		$all = $this->admin->get_all_data();
		$output = "";
		$i = 1;
		// if(!$all){
		foreach ($all as $dt) {
			$output .= "<tr>";
			$output .= "<td class='text-center'>". $i++ ."</td>";
			$output .= "<td>". $dt->nama ."</td>";
			$output .= "<td>". $dt->email ."</td>";

			$level = $dt->level == 1 ? "Super Admin" : "Admin";
			$jk = $dt->jenis_kelamin == 1 ? 'Laki-laki' : 'Wanita';

			$output .= "<td>". $level ."</td>";
			$output .= "<td>". $jk ."</td>";
			$output .= "<td>". just_date($dt->created_at) ."</td>";
			$output .= "<td class='text-center'>";
			$output .= "<button type='button' class='btn btn-sm btn-clean btn-icon btn-edit-data' title='Detail' data-id=". $dt->id ."><i class='la la-edit text-success'></i></button>";
			$output .= "<button type='button' class='btn btn-sm btn-clean btn-icon btn-delete' title='Hapus data' data-id=". $dt->id ."><i class='la la-trash text-danger'></i></button>";
			$output .= "</td>";
			$output .= "</tr>";
		}
		// }

		echo json_encode([
			'response_code'	=> 200,
			'response_message'	=> "Berhasil load data",
			'output'	=> $output
		]);
	}
	
	public function simpan_data()
	{
		$dataInput  = $this->input->post();
		unset($dataInput["id"], $dataInput['passwordConfirm']);
		$cekdata = $this->admin->where(['email' => $dataInput['email']])->count_rows();
		if($cekdata > 0){
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Email sudah terdaftar, silahkan gunakan email yang lain"
			]);
		}else{
			$dataInput['password'] = md5($dataInput['password']);
			$save = $this->admin->save($dataInput);
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

	public function get_data()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];
		$data = $this->admin->where(['id' => $id])->get();
		// d($data);
		$gender = "";
		$jk = $data->jenis_kelamin;
		// die($jk);
		foreach (gender() as $xx) {
			$select= $xx['id_jk'] == $jk ? "selected" : "";
			$gender .= "<option value='". $xx['id_jk'] ."' $select>". $xx['jk'] ."</option>";
		}

		$level = "";
		$lvl = $data->level;
		foreach (Level() as $yy) {
			$selected = $yy['id_level'] == $lvl ? "selected" : "";
			$level .= "<option value='". $yy['id_level'] ."' $selected>". $yy['level'] ."</option>";
		}

		echo json_encode([
			'response_code' => 200,
			'response_message'	=> "Data telah ditemukan",
			'datapersonal' => $data,
			'gender' => $gender,
			'level' => $level
		]);
	}

	public function update_data()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput['id'];
		

		if(!isset($dataInput['password'])){
			unset($dataInput['passwordConfirm'], $dataInput['password'], $dataInput['id']);
		}
		else{
			unset($dataInput['passwordConfirm'], $dataInput['id']);
			$dataInput['password'] = md5($dataInput['password']);
		}

		$update = $this->admin->update($dataInput, $id);
		
		if($update){
			echo json_encode([
				'response_code'	=> 200,
				'response_message'	=> "Data berhasil diubah"
			]);
		}else{
			echo json_encode([
				'response_code'	=> 500,
				'response_message'	=> "Data gagal diubah"
			]);
		}
	}

	public function hapus_data()
	{
		$dataInput  = $this->input->post();
		$id = $dataInput["ID"];

		$delete = $this->admin->delete($id);

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
}
