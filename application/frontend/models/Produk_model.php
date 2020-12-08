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
        parent::__construct();

        $this->has_many['produk_kategori'] = array(
            'foreign_model'     => 'Produk_kategori_model',
            'foreign_table'     => 'Produk_kategori',
            'foreign_key'       => 'id_kelas',
            'local_key'         => 'id'
        );

        $this->has_one['pengajar'] = array(
            'foreign_model'     => 'Pengajar_model',
            'foreign_table'     => 'pengajar',
            'foreign_key'       => 'id',
            'local_key'         => 'id_pengajar'
        );
    }
}
