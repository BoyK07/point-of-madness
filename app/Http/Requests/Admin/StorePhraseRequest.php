<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePhraseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'key' => ['required', 'string', 'max:255', 'unique:phrases,key'],
            'text' => ['required', 'string'],
            'context' => ['nullable', 'string', 'max:255'],
        ];
    }
}
