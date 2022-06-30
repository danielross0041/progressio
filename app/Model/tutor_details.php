<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tutor_details extends Model
{
    protected $table='tutor_details';
	protected $with = ['uni'];
	protected $fillable = [
        'tutor_id', 'birth_date', 'university','year','phone','subject','brief_description','hear_about_us','enhanced',
		'bank_name','account_name','sort_code','account_number','additional_images',
    ];
	public function uni () {
		return $this->hasOne('App\Model\m_flag','id','university');
	}
	public function tutor_subject () {
		return $this->hasOne('App\Model\m_flag','id','subject');
	}
}
