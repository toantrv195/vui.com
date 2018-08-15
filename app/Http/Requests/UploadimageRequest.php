<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadimageRequest extends FormRequest
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
            
            'title' => 'required|unique:products,title',
            'fImages' => 'image',
            'cate' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề hình ảnh',
            'title.unique' => 'Tiêu đề này đã tồn tại, vui lòng nhập tiêu đề khác',
            'cate.required' => 'Vui lòng chọn thể loại'

        ];
    }
}
