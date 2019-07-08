<?php

use munkireport\models\MRModel as Eloquent;

class Inventory_model extends Eloquent
{
    protected $table = 'inventoryitem';

    protected $fillable = [
      'serial_number',
      'name',
      'version',
      'bundleid',
      'bundlename',
      'path',
    ];

    public $timestamps = false;
}
