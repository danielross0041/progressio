<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tutor_meeting_admin extends Model
{
    protected $table='tutor_meeting_admin';
	protected $fillable = [
        'tutor_id', 'date', 'time','meeting_success',
    ];
	public function tutor(){
		return $this->hasOne('App\Model\User','id','tutor_id');
	}
}
