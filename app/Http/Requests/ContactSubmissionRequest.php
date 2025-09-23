<?php

namespace App\Http\Requests;

use Carbon\CarbonImmutable;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Validator;

class ContactSubmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->isCoolingDownAfterFailures()) {
            throw new HttpResponseException(response()->json([
                'message' => __('Too many recent failed attempts. Please wait :seconds seconds before trying again.', [
                    'seconds' => max(1, $this->failureCooldownSeconds()),
                ]),
            ], 429));
        }

        $this->merge([
            'form_started_at' => (int) $this->input('form_started_at'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $emailRule = app()->environment('testing') ? 'email:rfc' : 'email:rfc,dns';

        return [
            'name' => ['required', 'string', 'max:120'],
            'company' => ['nullable', 'string', 'max:150'],
            'email' => ['required', $emailRule, 'max:255', 'indisposable'],
            'reason' => ['required', 'in:booking,general,press,fans'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:20', 'max:8000'],
            'acknowledgement' => ['accepted'],
            'captcha_token' => ['required', 'string'],
            'website' => ['nullable', 'max:0'],
            'form_started_at' => ['required', 'integer'],
            'phone' => ['nullable', 'string', 'max:40'],
            'attachment' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,webp', 'max:5120'],
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            if (!$this->passesMinimumSubmitTime()) {
                $validator->errors()->add('form', __('Please take a moment to review your message before submitting.'));
            }

            if (!$this->passesCaptchaCheck()) {
                $validator->errors()->add('captcha_token', __('Captcha verification failed. Please try again.'));
            }
        });
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'website.max' => __('Spam detected. If you are human, please leave the hidden field blank.'),
            'acknowledgement.accepted' => __('You must acknowledge the response time to submit the form.'),
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(ValidatorContract $validator): void
    {
        RateLimiter::hit($this->failureThrottleKey(), 120);

        throw new HttpResponseException(response()->json([
            'message' => __('Please correct the errors below and try again.'),
            'errors' => $validator->errors(),
        ], 422));
    }

    /**
     * Determine whether the submission respected the minimum time requirement.
     */
    protected function passesMinimumSubmitTime(): bool
    {
        try {
            $startedAt = CarbonImmutable::createFromTimestamp((int) $this->input('form_started_at'));
        } catch (\Throwable $e) {
            return false;
        }

        return $startedAt->diffInRealSeconds(now()) >= 3;
    }

    /**
     * Perform captcha verification if the service is configured.
     */
    protected function passesCaptchaCheck(): bool
    {
        if (app()->isProduction()) {
            return true;
        }
        
        $secret = config('services.captcha.secret');

        if (empty($secret)) {
            return true;
        }

        $token = $this->string('captcha_token')->trim();

        if ($token->isEmpty()) {
            return false;
        }

        $response = Http::asForm()->post(config('services.captcha.endpoint'), [
            'secret' => $secret,
            'response' => $token->value(),
            'remoteip' => $this->ip(),
        ]);

        if ($response->failed()) {
            return false;
        }

        $payload = $response->json();

        if (!is_array($payload)) {
            return false;
        }

        $success = (bool) ($payload['success'] ?? false);

        if (!$success) {
            return false;
        }

        if (isset($payload['score'])) {
            return (float) $payload['score'] >= config('services.captcha.minimum_score');
        }

        return true;
    }

    /**
     * Determine if the requester is in a cooldown period after consecutive failures.
     */
    protected function isCoolingDownAfterFailures(): bool
    {
        return RateLimiter::tooManyAttempts($this->failureThrottleKey(), 3);
    }

    /**
     * Get the unique throttle key for this request.
     */
    protected function throttleKey(): string
    {
        return 'contact:' . sha1((string) $this->ip());
    }

    /**
     * Get the failure throttle key.
     */
    protected function failureThrottleKey(): string
    {
        return $this->throttleKey() . ':failures';
    }

    /**
     * Retrieve the number of seconds remaining on the failure cooldown.
     */
    public function failureCooldownSeconds(): int
    {
        return RateLimiter::availableIn($this->failureThrottleKey());
    }

    /**
     * Clear the failure cooldown tracking after a successful submission.
     */
    public function clearFailureCooldown(): void
    {
        RateLimiter::clear($this->failureThrottleKey());
    }

    /**
     * Expose the throttle key for external rate limiting.
     */
    public function generalThrottleKey(): string
    {
        return $this->throttleKey();
    }
}
