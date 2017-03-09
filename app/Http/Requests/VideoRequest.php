<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'txtIntro' => 'required|unique:videos,introduce',
            'fImages' => 'image| mimes:jpeg,jpg,png,PNG | max:1000',
            'source' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'txtIntro.required' => 'Plear Enter Introduce',
            'txtIntro.unique' => 'This Name Video Is Exists',
            'fImages.image' => 'This File not Image',
            'source.required' => 'Please Enter Source '
        ];
    }
}
