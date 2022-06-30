<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tutor_quiz_answers extends Model
{
    protected $table='tutor_quiz_answers';
	protected $fillable = [
        'question_id', 'option_value', 'is_correct',
    ];
	public function question(){
		return $this->hasOne('App\Model\tutor_quiz_questions','id','question_id');
	}
}
