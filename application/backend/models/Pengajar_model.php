<?php

class Pengajar_model extends Custom_model
{
    public $table           = 'pengajar';
    public $primary_key     = 'id';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {

		// $this->has_one['user'] = array(
        //     'foreign_model'     => 'Pengajar_model',
        //     'foreign_table'     => 'pengajar',
        //     'foreign_key'       => 'id_pengajar',
        //     'local_key'         => 'id_pengajar'
        // );
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
}
