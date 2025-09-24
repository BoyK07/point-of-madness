<x-app-layout>
    <section class="bg-slate-900 py-16 text-white">
        <div class="mx-auto max-w-4xl px-4">
            <h1 class="text-4xl font-bold">@phrase('contact.title', 'Contact Point of Madness')</h1>
            <p class="mt-3 text-slate-300">@phrase('contact.subtitle', 'Bookings, press enquiries, and fan mail all come through this form.')</p>
        </div>
    </section>

    <section class="mx-auto max-w-4xl px-4 py-12">
        <div class="grid gap-10 md:grid-cols-3">
            <div class="md:col-span-2">
                <form id="contact-form" action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-5 rounded-xl border border-slate-200 bg-white p-6 shadow-sm" novalidate data-captcha-site-key="{{ $captchaSiteKey }}" data-captcha-provider="{{ $captchaProvider }}">
                    @csrf
                    <input type="hidden" name="form_started_at" id="form_started_at" value="{{ now()->timestamp }}">
                    <input type="hidden" name="captcha_token" id="captcha_token">
                    <div class="sr-only" aria-hidden="true">
                        <label for="website">@phrase('contact.honeypot.label', 'Leave this field blank')</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <h2 class="text-xl font-semibold text-slate-900">@phrase('contact.form.title', 'Send us a message')</h2>

                    <div id="contact-success" class="hidden rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800" role="status" aria-live="polite"></div>
                    <div id="contact-errors" class="hidden rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert" aria-live="assertive"></div>

                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="text-sm font-medium text-slate-700" for="name">@phrase('contact.fields.name', 'Name')</label>
                            <input class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none" type="text" name="name" id="name" required autocomplete="name">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-slate-700" for="company">@phrase('contact.fields.company', 'Company')</label>
                            <input class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none" type="text" name="company" id="company" autocomplete="organization">
                        </div>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="text-sm font-medium text-slate-700" for="email">@phrase('contact.fields.email', 'Email')</label>
                            <input class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none" type="email" name="email" id="email" required autocomplete="email">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-slate-700" for="phone">@phrase('contact.fields.phone', 'Phone')</label>
                            <input class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none" type="text" name="phone" id="phone" autocomplete="tel">
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-700" for="reason">@phrase('contact.fields.reason', 'Reason')</label>
                        <select class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none" name="reason" id="reason" required>
                            <option value="">@phrase('contact.fields.reason.placeholder', 'Choose an option')</option>
                            <option value="booking">@phrase('contact.fields.reason.booking', 'Professional booking')</option>
                            <option value="general">@phrase('contact.fields.reason.general', 'General enquiry')</option>
                            <option value="press">@phrase('contact.fields.reason.press', 'Press & media')</option>
                            <option value="fans">@phrase('contact.fields.reason.fans', 'Fans / say hello')</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-700" for="subject">@phrase('contact.fields.subject', 'Subject')</label>
                        <input class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none" type="text" name="subject" id="subject" required>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-700" for="message">@phrase('contact.fields.message', 'Message')</label>
                        <textarea class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none" name="message" id="message" rows="6" required></textarea>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-700" for="attachment">@phrase('contact.fields.attachment', 'Attachment (optional)')</label>
                        <input class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none" type="file" name="attachment" id="attachment" accept=".pdf,.jpg,.jpeg,.png,.webp">
                        <p class="mt-1 text-xs text-slate-500">@phrase('contact.fields.attachment.help', 'PDF or image files up to 5MB.')</p>
                    </div>
                    <div class="flex items-start gap-2 rounded-md border border-slate-200 bg-slate-50 px-3 py-3">
                        <input class="mt-1 h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-slate-500" type="checkbox" name="acknowledgement" id="acknowledgement" required>
                        <label for="acknowledgement" class="text-sm text-slate-600">@phrase('contact.fields.acknowledgement', 'I understand the band will reply as soon as possible.')</label>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center gap-2 rounded-md bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700" data-submit-button>
                            <span>@phrase('contact.submit', 'Send message')</span>
                        </button>
                    </div>
                </form>
            </div>
            <aside class="space-y-6">
                <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-slate-900">@phrase('contact.details.title', 'Direct contact')</h2>
                    <p class="mt-2 text-sm text-slate-600">@phrase('contact.details.body', 'Prefer email? Reach out through the links below.')</p>
                    <ul class="mt-4 space-y-2 text-sm text-slate-700">
                        @foreach(ssot_links('contact') as $link)
                            <li>
                                <a href="{{ $link->url }}" @if($link->target) target="{{ $link->target }}" @endif @if($link->rel) rel="{{ $link->rel }}" @endif class="hover:text-slate-900">{{ $link->label }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-slate-900">@phrase('contact.social.title', 'Follow the band')</h2>
                    <ul class="mt-4 space-y-2 text-sm text-slate-700">
                        @foreach(ssot_links('social') as $link)
                            <li>
                                <a href="{{ $link->url }}" @if($link->target) target="{{ $link->target }}" @endif @if($link->rel) rel="{{ $link->rel }}" @endif class="hover:text-slate-900">{{ $link->label }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </section>
</x-app-layout>
