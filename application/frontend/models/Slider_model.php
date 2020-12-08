<?php

class Slider_model extends Custom_model
{
    public $table           = 'slider';
    public $primary_key     = 'id';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {
        parent::__construct();
    }
}
