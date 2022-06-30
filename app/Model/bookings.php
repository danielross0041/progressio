<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class bookings extends Model
{
	protected $table = 'bookings';
	protected $appends = ['full_from_date','full_to_date'];
	public $primaryKey = 'id';
    protected $fillable = [
        'tutor_id', 'date', 'from_time','to_time','subject_id','total','teacher_id','status','cancel_reason',
    ];
	public function subject () {
		return $this->hasOne('App\Model\m_flag','id','subject_id');
	}
	public function tutor () {
		return $this->hasOne('App\Model\User','id','tutor_id');
	}
	public function teacher () {
		return $this->hasOne('App\Model\User','id','teacher_id');
	}
	public function getFullFromDateAttribute()
	{
		$date = date('l jS F - h:i A',strtotime($this->date.' '.$this->from_time));
		return $date;
	}
	public function getFullToDateAttribute()
	{
		$date = date('l jS F - h:i A',strtotime($this->date.' '.$this->to_time));
		return $date;
	}
	public function pupils(){
		return $this->hasMany('App\Model\booking_pupils','booking_id','id');
	}
	public function chat(){
		return $this->hasMany('App\Model\chat','booking_id','id');
	}
}
