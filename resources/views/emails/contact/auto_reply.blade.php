<x-mail::message>
# Thank you for reaching out!

Hi {{ $submission->name }},

We’ve received your message and the team will get back to you as soon as possible. Our typical response time is 24–48 hours.

Here’s a quick summary of what you sent us:

@php
    $reasonLabel = match ($submission->reason) {
        'booking' => 'Professional Booking',
        'general' => 'General Inquiries',
        'press' => 'Press & Media',
        'fans' => 'Fans / Say Hi',
        default => ucfirst($submission->reason),
    };
@endphp

- **Reason:** {{ $reasonLabel }}
- **Subject:** {{ $submission->subject }}

<x-mail::panel>
{!! nl2br(e($submission->message)) !!}
</x-mail::panel>

If your inquiry is time-sensitive, feel free to mention that when we follow up. We appreciate your patience and can’t wait to connect.

Stay curious,
{{ config('app.name') }}
</x-mail::message>
