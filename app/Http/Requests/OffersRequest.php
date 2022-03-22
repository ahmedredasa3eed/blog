<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffersRequest extends FormRequest
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
            'title_ar' => 'required|unique:offers,title_ar|max:3',
            'title_en' => 'required|unique:offers,title_en|max:3',
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'title_ar.required'=>__('messages.title_ar_is_required'),
            'title_en.required'=>__('messages.title_en_is_required'),
            'price.required'=>__('messages.price_is_required'),
        ];
    }
}
