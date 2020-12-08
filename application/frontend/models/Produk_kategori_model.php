<?php

class Produk_kategori_model extends Custom_model
{
    public $table           = 'produk_kategori';
    public $primary_key     = 'id';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {
        parent::__construct();
        $this->has_one['kategori'] = array(
            'foreign_model'     => 'Kategori_model',
            'foreign_table'     => 'kategori',
            'foreign_key'       => 'id',
            'local_key'         => 'id_kategori'
        );
    }
}
