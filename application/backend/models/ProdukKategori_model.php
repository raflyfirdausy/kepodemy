<?php

class ProdukKategori_model extends Custom_model
{
    public $table           = 'produk_kategori';
    public $primary_key     = 'id';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {
		$this->has_one['kategori'] = array(
            'foreign_model'     => 'Kategori_model',
            'foreign_table'     => 'kategori',
            'foreign_key'       => 'id',
            'local_key'         => 'id_kategori'
		);

        parent::__construct();
	}
	
	public function get_all_data()
	{
		$qry = $this->order_by("created_at", "DESC")->get_all() ? : [];
		return $qry ;
	}

	public function save($array)
	{
		$qry = $this->insert($array);
		return $qry;
	}

	public function delete_byidkelas($idkelas)
	{
		$qry = $this->where(['id_kelas' => $idkelas])->delete();
		return $qry;
	}
}
