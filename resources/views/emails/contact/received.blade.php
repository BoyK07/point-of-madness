<x-mail::message>
# New Contact Submission

A new message has been received through the Point of Madness contact page.

**Reason:** {{ $reasonLabel }}  
**Subject:** {{ $submission->subject }}  
**From:** {{ $submission->name }} ({{ $submission->email }})

@if(!empty($submission->company))
**Company:** {{ $submission->company }}
@endif

@if(!empty($submission->phone))
**Phone:** {{ $submission->phone }}
@endif

<x-mail::panel>
{!! nl2br(e($submission->message)) !!}
</x-mail::panel>

@php($referrer = $submission->meta['referrer'] ?? null)

**Submitted:** {{ $submission->created_at?->timezone(config('app.timezone'))->format('Y-m-d H:i:s') }}  
@isset($referrer)
**Referrer:** {{ $referrer }}
@endisset

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
