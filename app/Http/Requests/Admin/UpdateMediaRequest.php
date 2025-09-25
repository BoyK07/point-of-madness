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
        $mediaId = $this->route('medium')?->id ?? $this->route('media')?->id;

        return [
            'purpose' => ['required', 'string', 'max:255', Rule::unique('media', 'purpose')->ignore($mediaId)],
            'alt' => ['nullable', 'string', 'max:255'],
            'focal_point' => ['nullable', 'array'],
            'focal_point.x' => ['nullable', 'numeric', 'between:0,1'],
            'focal_point.y' => ['nullable', 'numeric', 'between:0,1'],
            'file' => ['nullable', 'image', 'max:10240'],
        ];
    }
}
