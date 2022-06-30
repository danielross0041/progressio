<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class anualreports extends Model
{
    protected $table='anualreports';
	public function downloadfile()
    {
        return $this->morphOne('App\Model\Image', 'imageable')->where('table_name', 'anualreports');
    }
}
