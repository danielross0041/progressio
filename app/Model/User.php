<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','is_deleted','is_active','user_type','school_id','profile_image'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	public function tutordetail () {
		return $this->hasOne('App\Model\tutor_details','tutor_id','id');
	}
	public function tutorsubjects () {
		return $this->hasMany('App\Model\tutor_subjects','tutor_id','id');
	}
	public function teachersessions(){
		return $this->hasMany('App\Model\bookings','teacher_id','id')
		->where('status',0);
	}
	public function pupilsessions(){
		return $this->belongsToMany('App\Model\bookings', 'booking_pupils', 'pupil_id', 'booking_id');
	}
	public function tutor_subject () {
		return $this->hasOne('App\Model\m_flag','id','subject');
	}
	
}
