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
        
        $this->has_many['produk_kategori'] = array(
            'foreign_model'     => 'Produk_kategori_model',
            'foreign_table'     => 'Produk_kategori',
            'foreign_key'       => 'id_kategori',
            'local_key'         => 'id'
        );
    }
}
