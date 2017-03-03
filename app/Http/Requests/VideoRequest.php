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
            'txtIntro' => 'required|unique:videos,intro',
            'fImages' => 'image| mimes:jpeg,jpg,png | max:1000',
            'link' => 'required',
            'source' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'txtIntro.required' => 'Plear Enter Introduce',
            'txtIntro.unique' => 'This Name Video Is Exists',
            'fImages.image' => 'This File not Image',
            'link.required' => 'Please Enter Link Video',
            'source.required' => 'Please Enter Source '
        ];
    }
}
