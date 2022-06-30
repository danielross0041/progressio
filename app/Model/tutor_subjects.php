<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tutor_subjects extends Model
{
    protected $table='tutor_subjects';
	protected $with=['subject'];
	public function subject () {
		return $this->hasOne('App\Model\m_flag','id','subject_id');
	}
}
