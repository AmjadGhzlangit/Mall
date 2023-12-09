<?php

namespace App\Http\Requests\Admin\Seller;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'email' => ['required','email'],
            'password' => ['required','string'],
            'status' => ['required'],
        ];
    }
}
