@props([
    'href'   => route('register'),
    'aClass' => '',
])

@php
    // Standardklasser til den ydre div og a-tagget.
    $divDefaultClasses = 'rounded-radius p-px dark:hover:p-[1.5px] dark:hover:-m-[0.5px] hover:p-[1.25px] hover:-m-[0.25px] bg-conic/[from_var(--border-angle)] from-surface dark:from-surface-dark via-primary/70 hover:via-primary to-surface dark:to-surface-dark hover:scale-[1.02] hover:from-20% hover:via-60% hover:to-100% from-30% via-65% to-100% animate-rotate-border transition';
    $aDefaultClasses   = 'border dark:border-neutral-900 rounded-radius dark:hover:bg-surface-dark bg-primarydddddddddddddd borderfds border-primaryfffffff px-4 py-2 text-center text-sm font-medium tracking-wide text-on-primary-dark/90 hover:text-on-primary-dark hover:opacity-75ffdfd focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-primary-darkddddddddddddd dark:border-primary-darkffffffffff dark:text-on-primary/90 hover:dark:text-on-primary dark:focus-visible:outline-primary-dark transition';
@endphp

<div {{ $attributes->merge(['class' => $divDefaultClasses]) }}>
    <a href="{{ $href }}" class="{{ $aDefaultClasses }} {{ $aClass }}">
        {{-- Hvis der ikke sendes noget content (slot) benyttes standardteksten --}}
        {{ $slot->isNotEmpty() ? $slot : __('shared/navigation_links.register') }}
    </a>
</div>