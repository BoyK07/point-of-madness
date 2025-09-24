<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePhraseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $phrase = $this->route('phrase');

        return [
            'key' => ['required', 'string', 'max:255', Rule::unique('phrases', 'key')->ignore($phrase?->id)],
            'text' => ['required', 'string'],
            'context' => ['nullable', 'string'],
        ];
    }
}
