<?php

class Transaksi_model extends Custom_model
{
    public $table = 'transaksi';
    public $primary_key = 'id';
    public $soft_deletes = true;
    public $timestamps = true;
    public $return_as = "object";

    public function __construct()
    {
        parent::__construct();
        $this->has_many['transaksidetail'] = array(
            'foreign_model'     => 'Transaksidetail_model',
            'foreign_table'     => 'transaksi_detail',
            'foreign_key'       => 'id_transaksi',
            'local_key'         => 'id'
        );
        $this->has_one['pembelajar'] = array(
            'foreign_model'     => 'Pembelajar_model',
            'foreign_table'     => 'pembelajar',
            'foreign_key'       => 'id',
            'local_key'         => 'id_pembelajar'
        );
    }

    public function get_all_data($id_pembelajar = null, $statusbayar = null)
    {
        if ($id_pembelajar != null) {
            $qry = $this->where(['id_pembelajar' => $id_pembelajar]);
        }
        if ($statusbayar != null) {
            $qry = $this->where(['status_bayar' => $statusbayar]);
        }
        $qry = $this->with_pembelajar("fields:nama");
        $qry = $this->with_transaksidetail(['fields' => 'id_transaksi,harga,harga_diskon', 'with' => ['relation' => 'produk', 'fields' => 'nama']]);
        $qry = $this->order_by("created_at", "DESC")->get_all() ?: [];
        foreach ($qry as $a) {
            $total = 0;
            if (isset($a->transaksidetail)) {
                foreach ($a->transaksidetail as $dt) {
                    $total += ($dt->harga_diskon > $dt->harga) ? $dt->harga_diskon : $dt->harga;
                }
                $a->total = $total;
            }
        }
        return $qry;
    }


    public function save($array)
    {
        $qry = $this->insert($array);
        return $qry;
    }
}
