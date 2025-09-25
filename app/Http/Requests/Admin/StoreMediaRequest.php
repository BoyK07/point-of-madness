<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'purpose' => ['required', 'string', 'max:255', 'unique:media,purpose'],
            'alt' => ['nullable', 'string', 'max:255'],
            'focal_point' => ['nullable', 'array'],
            'focal_point.x' => ['nullable', 'numeric', 'between:0,1'],
            'focal_point.y' => ['nullable', 'numeric', 'between:0,1'],
            'file' => ['required', 'image', 'max:10240'],
        ];
    }
}
