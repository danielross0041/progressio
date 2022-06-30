<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tutor_quiz_questions extends Model
{
    public function answers(){
		return $this->hasMany('App\Model\tutor_quiz_answers','question_id','id');
	}
}
