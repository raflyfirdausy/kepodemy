<?php

class Transaksidetail_model extends Custom_model
{
    public $table = 'transaksi_detail';
    public $primary_key = 'id';
    public $soft_deletes = true;
    public $timestamps = true;
    public $return_as = "object";

    public function __construct()
    {
		parent::__construct();
		$this->has_one['produk'] = array(
            'foreign_model'     => 'Produk_model',
            'foreign_table'     => 'produk',
            'foreign_key'       => 'id',
            'local_key'         => 'id_produk'
		);
				
    }

    public function get_all_data($id_transaksi = null)
	{
		if($id_transaksi != null){
			$qry = $this->where(['id_transaksi' => $id_transaksi]);
		}
		$qry = $this->with_produk(['fields'=>'id_produk', 'fields'=>'nama' ,'with'=>['relation'=>'pengajar','fields'=>'nama'] ]);
		$qry = $this->order_by("created_at", "DESC")->get_all() ? : [];
		return $qry ;
	}
	
   

    public function save($array)
    {
        $qry = $this->insert($array);
        return $qry;
    }
}
