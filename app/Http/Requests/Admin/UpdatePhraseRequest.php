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
        $phraseId = $this->route('phrase')?->id;

        return [
            'key' => ['required', 'string', 'max:255', Rule::unique('phrases', 'key')->ignore($phraseId)],
            'text' => ['required', 'string'],
            'context' => ['nullable', 'string', 'max:255'],
        ];
    }
}
