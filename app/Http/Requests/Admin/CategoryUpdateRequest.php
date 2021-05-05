<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'image' => ['nullable', 'mimes:jpeg,jpg,png', 'dimensions:width=720,height=650'],
            'slug' => ['required',
                Rule::unique('categories')->ignore($this->category),
            ],
            'is_active' => 'required'
        ];
    }
}
