<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class booking_pupils extends Model
{
	protected $table = 'booking_pupils';
	public $primaryKey = 'id';
    protected $fillable = [
        'pupil_id', 'booking_id', 'current_grade','target_grade','exam_board','advice',
        'notes',
		'lesson_title','what_covered','pupil_did_well','what_cover_nextime','pupil_struggle',
    ];
	public function user(){
		return $this->hasOne('App\Model\User','id','pupil_id');
	}
}
