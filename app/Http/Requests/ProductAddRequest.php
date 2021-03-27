<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:3',
            'price' => 'required',
            'category_id'=> 'required',
            'contents' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép trống',
            'name.unique' => 'Tên ko được phép trùng',
            'name.max' => 'Tên không phép quá 255 kí tự',
            'name.min' => 'Tên không phép dưới 3 kí tự',
            'price.required' => 'Giá không được phép trống',
            'category_id.required' => 'Danh mục không được phép trống',
            'contents.required' => 'Nội dung không được phép trống',
        ];
    }

}
