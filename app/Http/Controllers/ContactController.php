<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSubmissionRequest;
use App\Mail\ContactSubmissionAutoReply;
use App\Mail\ContactSubmissionReceived;
use App\Models\ContactSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index(): View
    {
        return view('contact.index', [
            'captchaSiteKey' => config('services.captcha.site_key'),
            'captchaProvider' => config('services.captcha.provider'),
        ]);
    }

    /**
     * Handle a contact form submission.
     */
    public function store(ContactSubmissionRequest $request): JsonResponse
    {
        if (RateLimiter::tooManyAttempts($request->generalThrottleKey(), 5)) {
            $seconds = max(
                1,
                $request->failureCooldownSeconds(),
                RateLimiter::availableIn($request->generalThrottleKey())
            );

            return response()->json([
                'message' => __('Too many submissions. Please wait :seconds seconds before trying again.', [
                    'seconds' => $seconds,
                ]),
            ], 429);
        }

        RateLimiter::hit($request->generalThrottleKey(), 60);

        $data = $request->validated();

        $attachmentPath = null;
        $attachmentMime = null;
        $attachmentOriginalName = null;

        if ($request->hasFile('attachment')) {
            $uploaded = $request->file('attachment');
            $attachmentMime = $uploaded->getMimeType();
            $attachmentOriginalName = $this->sanitizeFilename($uploaded->getClientOriginalName());
            $storedFilename = $this->generateStoredFilename($uploaded->getClientOriginalExtension());
            $attachmentPath = $uploaded->storeAs('contact-submissions', $storedFilename, 'local');
        }

        $submission = ContactSubmission::create([
            'reason' => $data['reason'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'name' => $data['name'],
            'company' => $data['company'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'attachment_original_name' => $attachmentOriginalName,
            'meta' => [
                'ip_hash' => hash_hmac('sha256', (string) $request->ip(), config('app.key')), 
                'user_agent_hash' => hash_hmac('sha256', (string) $request->userAgent(), config('app.key')),
                'referrer' => $request->headers->get('referer'),
            ],
        ]);

        $notificationAddress = $this->notificationAddress();
        $attachmentDiskPath = $attachmentPath ? storage_path('app/' . $attachmentPath) : null;

        try {
            Mail::to($notificationAddress)->send(new ContactSubmissionReceived(
                $submission,
                $attachmentDiskPath,
                $attachmentOriginalName,
                $attachmentMime
            ));

            Mail::to($submission->email)->send(new ContactSubmissionAutoReply($submission));
        } finally {
            if ($attachmentPath) {
                Storage::disk('local')->delete($attachmentPath);
            }
        }

        $request->clearFailureCooldown();

        return response()->json([
            'message' => __('Thank you! Your message has been sent successfully.'),
        ]);
    }

    /**
     * Sanitize an uploaded file name for display and storage.
     */
    protected function sanitizeFilename(?string $name): ?string
    {
        if ($name === null) {
            return null;
        }

        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $base = pathinfo($name, PATHINFO_FILENAME);
        $safeBase = Str::of($base)
            ->ascii()
            ->replaceMatches('/[^A-Za-z0-9-_]+/u', '-')
            ->trim('-')
            ->limit(60, '');

        $safeBase = $safeBase->isEmpty() ? 'attachment' : $safeBase;

        return $extension ? $safeBase . '.' . Str::lower($extension) : $safeBase;
    }

    /**
     * Generate a hashed filename for temporary storage.
     */
    protected function generateStoredFilename(?string $extension): string
    {
        $hash = hash_hmac('sha256', (string) Str::uuid(), config('app.key'));
        $extension = $extension ? '.' . Str::lower($extension) : '';

        return $hash . $extension;
    }

    /**
     * Determine the notification email address.
     */
    protected function notificationAddress(): string
    {
        return config('mail.to.address')
            ?? env('MAIL_TO_ADDRESS')
            ?? 'info@pointofmadness.nl';
    }
}
