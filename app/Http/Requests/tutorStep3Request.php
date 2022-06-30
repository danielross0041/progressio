<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tutorStep3Request extends FormRequest
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
			'profile_picture'=>'required',
			'identity_proof'=>'required',
			'bank_name'=>'required',
			'account_name'=>'required',
			'sort_code'=>'required',
			'account_number'=>'required',
        ];
    }
}
