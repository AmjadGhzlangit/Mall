<?php

namespace App\Http\Requests\Admin\Seller;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerRequest extends FormRequest
{
   
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'email' => ['email'],
            'password' => [],
            'status' => [],
        ];
    }
}
