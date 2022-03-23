<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'email' => 'required|min:5',
            'password' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'your email is required',
            'password.required'=>'your password is required',
            'email.min'=>' Minimum email length is 5 chars here',
            'password.min'=>' Minimum password length is 5 chars here',
        ];
    }
}
