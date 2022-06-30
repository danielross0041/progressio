<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class chat extends Model
{
	protected $table = 'chat';
	public $primaryKey = 'id';
    protected $fillable = [
        'booking_id', 'user_id', 'message','is_read',
    ];
	public function booking () {
		return $this->hasOne('App\Model\bookings','id','booking_id');
	}
	public function user () {
		return $this->hasOne('App\Model\User','id','user_id');
	}
}
