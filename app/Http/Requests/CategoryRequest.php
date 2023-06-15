<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'describe' => 'required',
            //'status' => 'required|in:0,1', //0: no active, 1: active
        ];
    }
    public function messages()
    {
       return [ 'title.required' => 'Vui lòng nhập tiêu đề.',
                'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
                'describe.required' => 'Vui lòng nhập mô tả.',
                'status.required' => 'Vui lòng chọn trạng thái.',];
    }
}
