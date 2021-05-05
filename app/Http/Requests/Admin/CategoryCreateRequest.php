<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the frontend is authorized to make this request.
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
            'name' => 'required',
            'image' => ['required', 'mimes:jpeg,jpg,png', 'dimensions:width=720,height=650'],
            'slug' => ['required', 'unique:categories'],
            'is_active' => 'required'
        ];
    }
}
