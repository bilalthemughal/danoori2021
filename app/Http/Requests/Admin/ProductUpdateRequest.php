<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'required',
            'slug' => [
                'required', 'alpha_dash',
                Rule::unique('products')->ignore($this->product),
            ],
            'image' => ['nullable', 'image', 'dimensions:width=600,height=900'],
            'second_image' => ['nullable', 'image', 'dimensions:width=600,height=900'],
            'image' => ['nullable', 'image', 'dimensions:width=600,height=900'],
            'is_active' => 'boolean',
            'original_price' => ['required', 'numeric'],
            'discounted_price' => ['nullable', 'numeric'],
            'product_info' => 'required',
            'category_id' => 'required',
            'stock' => ['required', 'integer'],
            'left_color' => 'required',
            'right_color' => 'required',
            'cost' => ['required', 'numeric']
        ];
    }
}
