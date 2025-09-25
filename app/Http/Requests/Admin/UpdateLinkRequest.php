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
        $linkId = $this->route('link')?->id;

        return [
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('links', 'slug')->ignore($linkId)],
            'label' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
            'target' => ['required', Rule::in(['_self', '_blank'])],
            'rel' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer', 'min:0'],
            'visible' => ['sometimes', 'boolean'],
            'group' => ['nullable', 'string', 'max:255'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'visible' => $this->boolean('visible'),
            'order' => $this->input('order', 0),
        ]);
    }
}
