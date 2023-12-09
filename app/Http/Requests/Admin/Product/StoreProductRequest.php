<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'category_id' => ['required'],
            'description' => ['required', 'string'],
            'image' => ['required', 'file'],
            'price' => ['required', 'min:0'],
            'quantity' => ['required', 'min:0'],
        ];
    }
}
