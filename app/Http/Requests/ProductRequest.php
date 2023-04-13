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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:2000'],
            'image' => ['nullable', 'image'],
            'price' => ['required', 'numeric'],
            'description' => ['nullable', 'string'],
            'published' => ['required', 'boolean'],
            'product_categories' => ['nullable'],
            'product_subcategories' => ['nullable'],
            'category_id' => ['required'],
            'subcategory_id' => ['nullable'],
        ];
    }
}
