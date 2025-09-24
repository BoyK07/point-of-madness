<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLinkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $link = $this->route('link');

        return [
            'key' => ['required', 'string', 'max:255', Rule::unique('links', 'key')->ignore($link?->id)],
            'label' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
            'target' => ['nullable', 'string', 'max:20'],
            'rel' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer'],
            'visible' => ['nullable', 'boolean'],
            'group' => ['required', 'string', 'max:255'],
        ];
    }
}
