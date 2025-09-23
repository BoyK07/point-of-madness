<?php

use App\Mail\ContactSubmissionAutoReply;
use App\Mail\ContactSubmissionReceived;
use App\Models\ContactSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

beforeEach(function () {
    $ipKey = 'contact:' . sha1('127.0.0.1');
    RateLimiter::clear($ipKey);
    RateLimiter::clear($ipKey . ':failures');
});

it('renders the contact form with expected structure', function () {
    $this->get(route('contact.index'))
        ->assertOk()
        ->assertSee('id="contact-form"', false)
        ->assertSee('Send us a message', false);
});

it('stores a submission, sends emails, and removes attachments', function () {
    Mail::fake();
    Storage::fake('local');

    $attachment = UploadedFile::fake()->create('press-kit.pdf', 256, 'application/pdf');

    $payload = [
        'name' => 'Point Contact',
        'email' => 'listener@gmail.com',
        'reason' => 'general',
        'subject' => 'Collaboration Request',
        'message' => 'This is a sufficiently detailed message containing more than twenty characters.',
        'acknowledgement' => 'on',
        'captcha_token' => 'token',
        'form_started_at' => now()->subSeconds(5)->timestamp,
        'website' => '',
        'phone' => '+31 123456789',
        'company' => 'Synthwave Labs',
        'attachment' => $attachment,
    ];

    $response = $this->post(route('contact.submit'), $payload, ['HTTP_ACCEPT' => 'application/json']);

    $response->assertOk()
        ->assertJsonStructure(['message']);

    $submission = ContactSubmission::first();

    expect($submission)->not->toBeNull()
        ->and($submission->email)->toBe('listener@gmail.com')
        ->and($submission->attachment_original_name)->toBe('press-kit.pdf')
        ->and($submission->meta['ip_hash'] ?? null)->not->toBeNull()
        ->and($submission->meta['user_agent_hash'] ?? null)->not->toBeNull();

    Mail::assertSent(ContactSubmissionReceived::class, function ($mail) use ($submission) {
        return $mail->submission->is($submission);
    });

    Mail::assertSent(ContactSubmissionAutoReply::class, function ($mail) use ($submission) {
        return $mail->submission->is($submission);
    });

    expect(Storage::disk('local')->allFiles())->toBeEmpty();
});

it('returns validation errors for spam defences', function () {
    Mail::fake();

    $payload = [
        'name' => 'Test',
        'email' => 'listener@gmail.com',
        'reason' => 'general',
        'subject' => 'Hi',
        'message' => 'Too short',
        'acknowledgement' => 'off',
        'captcha_token' => '',
        'form_started_at' => now()->timestamp,
        'website' => 'http://example.com',
    ];

    $response = $this->post(route('contact.submit'), $payload, ['HTTP_ACCEPT' => 'application/json']);

    $response->assertStatus(422)
        ->assertJsonFragment(['message' => 'Please correct the errors below and try again.'])
        ->assertJsonPath('errors.form.0', 'Please take a moment to review your message before submitting.');

    expect(ContactSubmission::count())->toBe(0);
});

it('enforces submission rate limiting', function () {
    Mail::fake();
    Storage::fake('local');

    $basePayload = [
        'name' => 'Rate Limited User',
        'email' => 'limited@gmail.com',
        'reason' => 'fans',
        'subject' => 'Just saying hi',
        'message' => 'This message easily meets the twenty character minimum requirement.',
        'acknowledgement' => 'on',
        'captcha_token' => 'token',
        'website' => '',
    ];

    for ($i = 0; $i < 5; $i++) {
        $payload = array_merge($basePayload, [
            'form_started_at' => now()->subSeconds(5)->timestamp,
        ]);

        $this->post(route('contact.submit'), $payload, ['HTTP_ACCEPT' => 'application/json'])
            ->assertOk();
    }

    $payload = array_merge($basePayload, [
        'form_started_at' => now()->subSeconds(5)->timestamp,
    ]);

    $this->post(route('contact.submit'), $payload, ['HTTP_ACCEPT' => 'application/json'])
        ->assertStatus(429);
});
