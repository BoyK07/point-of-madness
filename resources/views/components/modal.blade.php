@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth];
@endphp

<div
    x-data="{
        show: @js($show),
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
            // Hide navbar when modal opens
            const navbar = document.querySelector('nav');
            if (navbar) {
                navbar.style.opacity = '0';
                navbar.style.visibility = 'hidden';
                navbar.style.transition = 'opacity 0.15s ease-out, visibility 0.15s ease-out';
            }
            {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
        } else {
            document.body.classList.remove('overflow-y-hidden');
            // Show navbar when modal closes
            const navbar = document.querySelector('nav');
            if (navbar) {
                navbar.style.opacity = '1';
                navbar.style.visibility = 'visible';
            }
        }
    })"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-on:close.stop="$dispatch('close-modal', '{{ $name }}')"
    x-on:keydown.escape.window="$dispatch('close-modal', '{{ $name }}')"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    x-transition:enter="ease-out duration-50"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-50"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50 flex items-center justify-center"
    style="display: none;"
    x-cloak
>
    <div
        class="fixed inset-0 bg-black/50 backdrop-blur-md"
        x-on:click="$dispatch('close-modal', '{{ $name }}')"
    >
    </div>

    <div class="relative w-full {{ $maxWidth }} mx-auto my-auto">
        <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-xl overflow-hidden shadow-2xl">
            {{ $slot }}
        </div>
    </div>
</div>
