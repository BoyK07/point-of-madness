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
            'disk' => ['nullable', 'string', 'in:public'],
            'file' => ['required', 'file', 'image'],
            'focal_x' => ['nullable', 'numeric', 'between:-100,100'],
            'focal_y' => ['nullable', 'numeric', 'between:-100,100'],
        ];
    }
}
