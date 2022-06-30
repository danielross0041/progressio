<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school extends Model
{
	use Notifiable;
    protected $fillable = [
        'area', 'postal_code', 'school_id'
    ];
    protected $primaryKey = 'id';
  	protected $table = 'school';
    protected $guarded = [];
}
