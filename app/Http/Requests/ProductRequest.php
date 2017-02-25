<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category' => 'required',
            'txtName' => 'required|unique:products,name',
            'txtIntro' => 'required',
            'fImages' => 'image',
            'source' => 'required'
            
        ];
    }
        
    public function messages()
    {
       
            return [
            'category.required' => 'Please Choose Category',
            'txtName.required' => 'Please Enter Name',
            'txtIntro.unique' => 'This Name Product Is Exist',
            'txtIntro.required`' => 'Please Enter Introduce',
            'fImages.image' => 'This File Not Image ?',
            'source.required' => 'Please Enter Source'
            ];
    }

}
