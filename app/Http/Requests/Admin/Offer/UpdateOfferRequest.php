<?php

namespace App\Http\Requests\Admin\Offer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'int', 'exists:roles,id'],
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'text', 'min:3', 'max:65536'],
            'image' => ['nullable', 'file'],
            'amount' => ['required', 'int', 'min:0'],
            'price' => ['required', 'int', 'min:0'],
        ];
    }
}
