<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarouselCreateRequest extends FormRequest
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
            'background_color' => ['required'],
            'link' => ['required'],
            'h3_tag' => ['required'],
            'h2_tag' => ['required'],
            'p_tag' => ['required'],
            'is_active' => ['required'],
            'image' => ['required', 'image', 'dimensions:width=963,height=700'],
        ];
    }
}
