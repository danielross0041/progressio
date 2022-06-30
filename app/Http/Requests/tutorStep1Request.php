<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tutorStep1Request extends FormRequest
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
            'name'=>'required|max:100',
            'school_name'=>'max:100',
            'school_area'=>'max:100',
            'school_postal_code'=>'max:100',
            'birth'=>'required|date',
			'university'=>'required',
			'year'=>'required',
			'phone'=>'required',
			'subject'=>'required',
			'brief_description'=>'required',
			'accept_terms'=>'required',
			'email'=>'required|email|max:255|unique:users,email',
            'school_email'=>'email|max:255|unique:users,email',
        ];
    }
}
