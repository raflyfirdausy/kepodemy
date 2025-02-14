<?php

class Kategori_model extends Custom_model
{
    public $table           = 'kategori';
    public $primary_key     = 'id';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {
        parent::__construct();
	}

	public function get_lookup_kategori()
	{
		$qry = $this->order_by("nama", "ASC")->get_all() ? : [];
		return $qry ;
	}

	public function get_kategori($id)
	{
		$qry = $this->where(['id' => $id])->get() ? : [];
		return $qry ;
	}
	
	public function get_induk()
	{
		$qry = $this->where(['id_induk' => NULL])
		->where("id_induk", "=", "0", TRUE)
		->order_by("created_at", "DESC")
		->get_all() ? : [];
		return $qry ;
	}

	public function get_subkategori($idInduk)
	{
		$qry = $this->where(['id_induk' => $idInduk])->order_by("created_at", "DESC")->get_all() ? : [];
		return $qry ;
	}

	public function get_jumah_sub($idInduk)
	{
		$qry = $this->where(['id_induk' => $idInduk])->count_rows();
		return $qry;
	}

	public function save($array)
	{
		$qry = $this->insert($array);
		return $qry;
	}
}
