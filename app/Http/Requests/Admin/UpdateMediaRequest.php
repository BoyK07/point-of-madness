<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $media = $this->route('media');

        return [
            'purpose' => ['required', 'string', 'max:255', Rule::unique('media', 'purpose')->ignore($media?->id)],
            'alt' => ['nullable', 'string', 'max:255'],
            'disk' => ['nullable', 'string', 'in:public'],
            'file' => ['nullable', 'file', 'image'],
            'focal_x' => ['nullable', 'numeric', 'between:-100,100'],
            'focal_y' => ['nullable', 'numeric', 'between:-100,100'],
        ];
    }
}
