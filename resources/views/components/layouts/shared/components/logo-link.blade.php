{{-- Logo --}}
{{--
Jeg har blot kopieret alle classes fra knappen ved "A navbar with a call-to-action button" fra PUI.
Og derefter lavet disse ændringer i classes:
- inline-flex og w-fit tilføjet
- bg-primary og dark:bg-primary-dark er fjernet
---
Dette er ikke nødvendigt men kan gøres hvis man vil:
- text-on-primary erstattet med text-on-surface-strong
- dark:text-on-primary-dark erstattet med dark:text-on-surface-dark-strong
--}}

@props([
    'href' => \Illuminate\Support\Str::finish(route('public.public-pages.home'), '/'),
    'text' => 'text-on-primary',
    'text_dark' => 'text-on-primary-dark',
    'darkOrLightMode' => 'default',
    'border' => false
])

@php
// Definer stil baseret på darkOrLightMode
$modeClasses = match ($darkOrLightMode) {
    'dark' => "{$text_dark} focus-visible:outline-primary-dark",
    'light' => "{$text} focus-visible:outline-primary",
    default => "{$text} dark:{$text_dark} focus-visible:outline-primary dark:focus-visible:outline-primary-dark",
};

// Håndter border klasser
$borderClasses = '';
if ($border) {
    $borderClasses = match ($darkOrLightMode) {
        'dark' => 'border border-primary-dark',
        'light' => 'border border-primary',
        default => 'border border-primary dark:border-primary-dark',
    };
}

// Faste klasser der altid er inkluderet
$baseClasses = 'inline-flex justify-center items-center w-fit rounded-radius px-2 py-2 text-center text-sm font-medium tracking-wide hover:opacity-90 focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0';

// Saml alle klasser
$classes = "{$baseClasses} {$modeClasses} {$borderClasses}";
@endphp

<a
	href="{{ $href }}"
	{{ $attributes->merge(['class' => $classes]) }}
>
	<span class="sr-only">{{ __('shared/navigation_links.public__public_pages__home') }}</span>
	<x-shared.svg.other.app-logo {{-- role="img" aria-labelledby="logoTitle logoDesc" --}} fill="none" class="w-24" role="none" aria-hidden="true" />
</a>