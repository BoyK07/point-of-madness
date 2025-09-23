<x-app-layout>
    <!-- Professional Contact Page -->
    <div class="relative min-h-screen">
        <!-- Background matching homepage -->
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900 via-gray-800 to-black">
            <div class="absolute inset-0 opacity-5">
                <div class="absolute inset-0" style="background-image:
                    linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px);
                    background-size: 30px 30px;">
                </div>
            </div>
        </div>

        <!-- Ambient effects -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-900/10 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-900/10 rounded-full filter blur-3xl"></div>

        <!-- Content -->
        <div class="relative z-10 py-24 px-6">
            <div class="max-w-6xl mx-auto">
                <!-- Page Header -->
                <div class="text-center mb-16">
                    <h1 class="text-5xl md:text-6xl font-black mb-4 tracking-wide">
                        <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                            Contact Us
                        </span>
                    </h1>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
                    <p class="text-gray-400 mt-6 text-xl">Get in touch for bookings, collaborations, or just to say hello</p>
                </div>

                <!-- Contact Grid -->
                <div class="grid md:grid-cols-2 gap-12 mb-16">
                    <!-- Contact Form -->
                    <div>
                        <div class="bg-gradient-to-br from-gray-800/60 to-black/60 backdrop-blur-sm border border-blue-500/30 rounded-2xl p-8">
                            <div class="space-y-6">
                                <div>
                                    <h2 class="text-3xl font-bold text-white">Send us a message</h2>
                                    <p class="text-gray-300 mt-2 text-base">All fields are required unless marked optional.</p>
                                </div>

                                <div id="contact-success" class="hidden rounded-xl border border-emerald-500/40 bg-emerald-500/10 p-4 text-emerald-200 text-sm" role="status" aria-live="polite" tabindex="-1">
                                </div>
                                <div id="contact-errors" class="hidden rounded-xl border border-red-500/40 bg-red-500/10 p-4 text-red-200 text-sm" role="alert" aria-live="assertive" tabindex="-1">
                                </div>

                                <form id="contact-form" action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6" novalidate data-captcha-site-key="{{ $captchaSiteKey }}" data-captcha-provider="{{ $captchaProvider }}">
                                    @csrf
                                    <input type="hidden" name="form_started_at" id="form_started_at" value="{{ now()->timestamp }}">
                                    <input type="hidden" name="captcha_token" id="captcha_token">

                                    <div class="sr-only" aria-hidden="true">
                                        <label for="website">Leave this field empty</label>
                                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                                    </div>

                                    <div>
                                        <label for="name" class="block text-sm font-semibold text-gray-200">Name / Company name</label>
                                        <input type="text" name="name" id="name" required autocomplete="name" aria-describedby="name-error" class="mt-2 block w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder-gray-500 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/70" placeholder="Your full name or company name">
                                        <p id="name-error" class="mt-2 text-sm text-red-400 hidden" data-error-for="name"></p>
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-semibold text-gray-200">Email address</label>
                                        <input type="email" name="email" id="email" required autocomplete="email" aria-describedby="email-error" class="mt-2 block w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder-gray-500 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/70" placeholder="you@example.com">
                                        <p id="email-error" class="mt-2 text-sm text-red-400 hidden" data-error-for="email"></p>
                                    </div>

                                    <div>
                                        <label for="reason" class="block text-sm font-semibold text-gray-200">Reason for contacting</label>
                                        <select name="reason" id="reason" required aria-describedby="reason-help reason-error" class="mt-2 block w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-white shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/70">
                                            <option value="" disabled selected>Select an option</option>
                                            <option value="booking">Professional Booking</option>
                                            <option value="general">General Inquiries</option>
                                            <option value="press">Press &amp; Media</option>
                                            <option value="fans">Fans / Say Hi</option>
                                        </select>
                                        <p id="reason-help" class="mt-2 text-sm text-gray-300">Please choose the option that best fits your message.</p>
                                        <p id="reason-error" class="mt-2 text-sm text-red-400 hidden" data-error-for="reason"></p>
                                    </div>

                                    <div>
                                        <label for="subject" class="block text-sm font-semibold text-gray-200">Subject</label>
                                        <input type="text" name="subject" id="subject" required aria-describedby="subject-error" class="mt-2 block w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder-gray-500 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/70" placeholder="How can we help?">
                                        <p id="subject-error" class="mt-2 text-sm text-red-400 hidden" data-error-for="subject"></p>
                                    </div>

                                    <div>
                                        <label for="message" class="block text-sm font-semibold text-gray-200">Message / Description</label>
                                        <textarea name="message" id="message" rows="6" required aria-describedby="message-error" class="mt-2 block w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder-gray-500 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/70" placeholder="Share as much detail as possible"></textarea>
                                        <p id="message-error" class="mt-2 text-sm text-red-400 hidden" data-error-for="message"></p>
                                    </div>

                                    <div class="grid gap-4 md:grid-cols-2">
                                        <div>
                                            <label for="phone" class="block text-sm font-semibold text-gray-200">Phone (optional)</label>
                                            <input type="tel" name="phone" id="phone" aria-describedby="phone-error" class="mt-2 block w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder-gray-500 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/70" placeholder="Include country code">
                                            <p id="phone-error" class="mt-2 text-sm text-red-400 hidden" data-error-for="phone"></p>
                                        </div>
                                        <div>
                                            <label for="company" class="block text-sm font-semibold text-gray-200">Company (optional)</label>
                                            <input type="text" name="company" id="company" aria-describedby="company-error" class="mt-2 block w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder-gray-500 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/70" placeholder="Your organisation">
                                            <p id="company-error" class="mt-2 text-sm text-red-400 hidden" data-error-for="company"></p>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="attachment" class="block text-sm font-semibold text-gray-200">Attachment (optional)</label>
                                        <input type="file" name="attachment" id="attachment" accept=".pdf,.jpg,.jpeg,.png,.webp" aria-describedby="attachment-hint attachment-error" class="mt-2 block w-full text-sm text-gray-300 file:mr-4 file:rounded-lg file:border-0 file:bg-blue-500/10 file:px-4 file:py-2 file:text-blue-200 hover:file:bg-blue-500/20">
                                        <p id="attachment-hint" class="mt-2 text-xs text-gray-400">Accepted formats: pdf, jpg, jpeg, png, webp up to 5 MB.</p>
                                        <p id="attachment-error" class="mt-2 text-sm text-red-400 hidden" data-error-for="attachment"></p>
                                    </div>

                                    <div class="flex items-start gap-3 rounded-xl border border-white/10 bg-black/40 p-4">
                                        <input type="checkbox" name="acknowledgement" id="acknowledgement" required class="mt-1 h-5 w-5 rounded border-white/20 bg-black/60 text-blue-500 focus:ring-blue-500/60">
                                        <label for="acknowledgement" class="text-sm text-gray-200">
                                            “I understand that it may take some time for Point of Madness to reply and that spam messages will not be answered.”
                                        </label>
                                    </div>
                                    <p id="acknowledgement-error" class="-mt-4 text-sm text-red-400 hidden" data-error-for="acknowledgement"></p>

                                    <div class="flex justify-end">
                                        <button type="submit" class="inline-flex items-center gap-3 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-3 font-semibold text-white shadow-lg transition focus:outline-none focus:ring-2 focus:ring-blue-500/60 disabled:cursor-not-allowed disabled:opacity-60" data-submit-button>
                                            <span>Send message</span>
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media & Links -->
                    <div class="space-y-8">
                        <!-- Social Media Section -->
                        <div class="bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-pink-500/20
                                    rounded-2xl p-8 hover:border-pink-500/40 transition-all duration-300">
                            <h3 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-pink-500 to-purple-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </div>
                                Social Media
                            </h3>

                            <div class="space-y-4 mb-6">
                                <a href="https://www.instagram.com/pointofmadnessband/" target="_blank"
                                   class="flex items-center gap-4 p-4 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-all duration-300 group">
                                    <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-purple-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold group-hover:text-pink-400 transition-colors duration-300">Instagram</div>
                                        <div class="text-gray-400 text-sm">@pointofmadnessband</div>
                                    </div>
                                </a>

                                <a href="https://www.tiktok.com/@point.of.madness" target="_blank"
                                   class="flex items-center gap-4 p-4 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-all duration-300 group">
                                    <div class="w-10 h-10 bg-gradient-to-br from-gray-500 to-gray-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-.88-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold group-hover:text-gray-300 transition-colors duration-300">TikTok</div>
                                        <div class="text-gray-400 text-sm">@point.of.madness</div>
                                    </div>
                                </a>

                                <a href="https://open.spotify.com/artist/1YhRX1mRz6rzQofSyzlszi" target="_blank"
                                   class="flex items-center gap-4 p-4 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-all duration-300 group">
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.6 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.611 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.559.3z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold group-hover:text-green-400 transition-colors duration-300">Spotify</div>
                                        <div class="text-gray-400 text-sm">Point of Madness</div>
                                    </div>
                                </a>
                            </div>

                            <p class="text-gray-400">
                                Follow us for the latest updates, behind-the-scenes content, and exclusive announcements.
                            </p>
                        </div>

                        <!-- Location -->
                        <div class="bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-blue-500/20
                                    rounded-2xl p-8 hover:border-blue-500/40 transition-all duration-300">
                            <h3 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                Based in Netherlands
                            </h3>
                            <p class="text-gray-300 text-lg leading-relaxed">
                                Point of Madness is based in the Netherlands, bringing the authentic 80s new wave sound to audiences across Europe and beyond.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Response Promise -->
                <div class="text-center">
                    <div class="bg-gradient-to-r from-gray-700/20 to-gray-600/20 backdrop-blur-sm border border-gray-500/20
                                rounded-xl p-8 max-w-2xl mx-auto">
                        <h2 class="text-3xl font-bold text-white mb-4">We'll Get Back to You</h2>
                        <p class="text-gray-300 text-lg">
                            We aim to respond to all inquiries within 24-48 hours. For urgent booking requests, please mention it in your subject line.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($captchaSiteKey)
        @if ($captchaProvider === 'hcaptcha')
            <script src="https://hcaptcha.com/1/api.js?render={{ $captchaSiteKey }}" async defer></script>
        @else
            <script src="https://www.google.com/recaptcha/api.js?render={{ $captchaSiteKey }}" async defer></script>
        @endif
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('contact-form');
            if (!form) {
                return;
            }

            const reasonHelp = document.getElementById('reason-help');
            const reasonSelect = document.getElementById('reason');
            const successBanner = document.getElementById('contact-success');
            const errorSummary = document.getElementById('contact-errors');
            const submitButton = form.querySelector('[data-submit-button]');
            const captchaInput = document.getElementById('captcha_token');
            const startedInput = document.getElementById('form_started_at');
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') ?? '' : '';

            const reasonDescriptions = {
                booking: 'Bookings for festivals, venues, private events, and corporate functions.',
                general: 'Questions about our music, collaborations, or general information.',
                press: 'Media inquiries, interviews, and press kit requests.',
                fans: 'For fans who want to say hi, share feedback, or send a personal message.',
            };

            const updateReasonHelp = (value) => {
                if (!value || !reasonDescriptions[value]) {
                    reasonHelp.textContent = 'Please choose the option that best fits your message.';
                    return;
                }

                reasonHelp.textContent = reasonDescriptions[value];
            };

            updateReasonHelp(reasonSelect.value);

            reasonSelect.addEventListener('change', (event) => {
                updateReasonHelp(event.target.value);
            });

            const clearFieldError = (field) => {
                if (!field) {
                    return;
                }

                const errorElement = form.querySelector(`[data-error-for="${field}"]`);
                const fieldInput = form.querySelector(`[name="${field}"]`);

                if (errorElement) {
                    errorElement.textContent = '';
                    errorElement.classList.add('hidden');
                }

                if (fieldInput) {
                    fieldInput.setAttribute('aria-invalid', 'false');
                }
            };

            const resetErrors = () => {
                errorSummary.classList.add('hidden');
                errorSummary.textContent = '';

                form.querySelectorAll('[data-error-for]').forEach((element) => {
                    element.textContent = '';
                    element.classList.add('hidden');
                });

                form.querySelectorAll('[aria-invalid="true"]').forEach((element) => {
                    element.setAttribute('aria-invalid', 'false');
                });
            };

            const setSuccessMessage = (message) => {
                successBanner.textContent = message;
                successBanner.classList.remove('hidden');
                successBanner.focus();
            };

            const hideSuccess = () => {
                successBanner.textContent = '';
                successBanner.classList.add('hidden');
            };

            const handleErrors = (response) => {
                successBanner.classList.add('hidden');
                let firstInvalidField = null;
                const summaryDetails = [];

                if (response.errors) {
                    Object.entries(response.errors).forEach(([field, messages]) => {
                        if (!Array.isArray(messages)) {
                            messages = [messages];
                        }

                        const errorElement = form.querySelector(`[data-error-for="${field}"]`);
                        const fieldInput = form.querySelector(`[name="${field}"]`);

                        if (errorElement) {
                            errorElement.textContent = messages.join(' ');
                            errorElement.classList.remove('hidden');
                        }

                        if (fieldInput) {
                            fieldInput.setAttribute('aria-invalid', 'true');
                            if (!firstInvalidField) {
                                firstInvalidField = fieldInput;
                            }
                        } else if (field === 'form') {
                            summaryDetails.push(messages.join(' '));
                        } else if (!errorElement) {
                            summaryDetails.push(messages.join(' '));
                        }
                    });
                }

                const combinedMessages = [];
                if (response.message) {
                    combinedMessages.push(response.message);
                }
                if (summaryDetails.length) {
                    combinedMessages.push(summaryDetails.join(' '));
                }

                if (!combinedMessages.length) {
                    combinedMessages.push('We couldn\'t send your message yet. Please review the details below.');
                }

                errorSummary.textContent = combinedMessages.join(' ');
                errorSummary.classList.remove('hidden');

                (firstInvalidField ?? errorSummary).focus();
            };

            const restoreFormState = () => {
                submitButton.disabled = false;
                submitButton.classList.remove('cursor-wait');
            };

            const setFormPendingState = () => {
                submitButton.disabled = true;
                submitButton.classList.add('cursor-wait');
            };

            const refreshFormStart = () => {
                startedInput.value = Math.floor(Date.now() / 1000);
            };

            const executeCaptcha = () => {
                const siteKey = form.dataset.captchaSiteKey;
                const provider = form.dataset.captchaProvider;

                if (!siteKey) {
                    return Promise.resolve('');
                }

                if (provider === 'hcaptcha' && window.hcaptcha && typeof window.hcaptcha.execute === 'function') {
                    return window.hcaptcha.execute(siteKey, { action: 'contact' });
                }

                if (window.grecaptcha && typeof window.grecaptcha.execute === 'function') {
                    return new Promise((resolve, reject) => {
                        window.grecaptcha.ready(function () {
                            window.grecaptcha.execute(siteKey, { action: 'contact' }).then(resolve).catch(reject);
                        });
                    });
                }

                return Promise.resolve('');
            };

            form.addEventListener('input', (event) => {
                if (!event.target || typeof event.target.name !== 'string') {
                    return;
                }

                clearFieldError(event.target.name);
            });

            form.addEventListener('change', (event) => {
                if (!event.target || typeof event.target.name !== 'string') {
                    return;
                }

                clearFieldError(event.target.name);
            });

            refreshFormStart();

            form.addEventListener('submit', async (event) => {
                event.preventDefault();
                hideSuccess();
                resetErrors();
                setFormPendingState();

                try {
                    const token = await executeCaptcha();
                    captchaInput.value = token;
                } catch (error) {
                    restoreFormState();
                    errorSummary.textContent = 'Captcha verification failed. Please reload the page and try again.';
                    errorSummary.classList.remove('hidden');
                    errorSummary.focus();
                    return;
                }

                const formData = new FormData(form);

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        body: formData,
                    });

                    const payload = await response.json().catch(() => ({}));

                    if (!response.ok) {
                        handleErrors(payload);
                        return;
                    }

                    form.reset();
                    refreshFormStart();
                    updateReasonHelp(reasonSelect.value);
                    captchaInput.value = '';
                    setSuccessMessage(payload.message ?? 'Thank you! Your message has been sent successfully.');
                } catch (error) {
                    errorSummary.textContent = 'Something went wrong while sending your message. Please try again in a moment.';
                    errorSummary.classList.remove('hidden');
                    errorSummary.focus();
                } finally {
                    restoreFormState();
                }
            });
        });
    </script>
</x-app-layout>
