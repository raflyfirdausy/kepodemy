<?php

class Produk_model extends Custom_model
{
    public $table           = 'produk';
    public $primary_key     = 'id';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {

		$this->has_one['pengajar'] = array(
            'foreign_model'     => 'Pengajar_model',
            'foreign_table'     => 'pengajar',
            'foreign_key'       => 'id',
            'local_key'         => 'id_pengajar'
        );
        parent::__construct();
	}
	
	public function get_all_merchandise()
	{
		$qry = $this->where(['tipe_produk' => 'merchandise'])->order_by("created_at", "DESC")->get_all() ? : [];
		return $qry ;
	}

	public function get_all_kelas()
	{
		$qry = $this->where(['tipe_produk' => 'kelas'])->with_pengajar("fields:nama")->order_by("created_at", "DESC")->get_all() ? : [];
		return $qry ;
	}

	public function save($array)
	{
		$qry = $this->insert($array);
		return $qry;
	}
}
