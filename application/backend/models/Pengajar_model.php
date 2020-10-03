<?php

class Pengajar_model extends Custom_model
{
    public $table = 'pengajar';
    public $primary_key = 'id';
    public $soft_deletes = true;
    public $timestamps = true;
    public $return_as = "object";

    public function __construct()
    {
				parent::__construct();
				
        $this->has_many['pengajarkategori'] = array(
            'foreign_model' => 'PengajarKategori_model',
            'foreign_table' => 'pengajar_kategori',
            'foreign_key' => 'id_pengajar',
            'local_key' => 'id',
        );
    }

    public function all()
    {
        $qry = $this->with_pengajarkategori(['fields' => 'id_kategori', 'with' => ['relation' => 'kategori', 'fields' => 'nama']])->order_by("created_at", "DESC")->get_all() ?: [];
        return $qry;
    }

    public function save($array)
    {
        $qry = $this->insert($array);
        return $qry;
    }
}
