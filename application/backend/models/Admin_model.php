<?php

class Admin_model extends Custom_model
{
    public $table           = 'admin';
    public $primary_key     = 'id';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {
        parent::__construct();
	}
	
	public function get_all_data()
	{
		$qry = $this->order_by("created_at", "DESC")->get_all() ? : [];
		return $qry;
	}

	public function save($array)
	{
		$qry = $this->insert($array);
		return $qry;
	}
}
