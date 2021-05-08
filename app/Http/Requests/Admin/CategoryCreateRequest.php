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
            'image' => ['required', 'image', 'dimensions:width=700,height=714'],
            'slug' => ['required', 'unique:categories', 'alpha_dash'],
            'is_active' => 'required'
        ];
    }
}
