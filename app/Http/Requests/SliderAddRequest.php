<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
                 'name' => 'required|unique:sliders|min:3',
                 'description' => 'required',
                 'image_path' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép trống',
            'name.unique' => 'Tên ko được phép trùng',
            'name.min' => 'Tên không phép dưới 3 kí tự',
            'description.required' => 'Tên mô tả không được phép trống',
            'image_path.required' => 'Hình ảnh không được trống',
        ];
    }


}
