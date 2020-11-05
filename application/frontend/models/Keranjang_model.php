<?php

class Keranjang_model extends Custom_model
{
    public $table           = 'keranjang';
    public $primary_key     = 'id';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {
        parent::__construct();
        $this->has_one['pembelajar'] = array(
            'foreign_model'     => 'Pembelajar_model',
            'foreign_table'     => 'pembelajar',
            'foreign_key'       => 'id',
            'local_key'         => 'id_pembelajar'
        );

        $this->has_one['produk'] = array(
            'foreign_model'     => 'produk_model',
            'foreign_table'     => 'produk',
            'foreign_key'       => 'id',
            'local_key'         => 'id_produk'
        );
    }
}
