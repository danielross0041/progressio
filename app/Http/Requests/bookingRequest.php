<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pupil_current_grade.*'=>'required|max:100',
			'pupil_target_grade.*'=>'required|max:100',
			'exam_board.*'=>'required',
        ];
    }
}
