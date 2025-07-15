@props([
    'dangerOrSuccess' => '',
    'showSuccess' => false,
    'type' => 'text',
    'id' => '',
    'name' => '',
    'value' => '',
    'label' => '',
    'placeholder' => '',
    'autocomplete' => '',
    'icon' => '',
    'aria_label' => '',
    'class' => '',
    'outerClass' => '',
    'svgClass' => '',
])

@php
    if ($errors->has($name)) {
        $dangerOrSuccess = 'danger';
    }

    // Definer input klasser
    $class = "w-full rounded-radius border bg-surface-alt py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark " . $class;
    // Tilføj border-farve baseret på valideringsstatus
    if (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger')) {
        $class = ( $dangerOrSuccess === 'danger' ? 'border-danger' : 'border-success' )." ".$class;
    } else {
        $class = 'border-outline dark:border-outline-dark ' . $class;
    }
    // Tilføj passende padding baseret på om der er et ikon
    if (!empty($icon)) {
        $class = 'pl-10 pr-2 ' . $class;
    } else {
        $class = 'px-2 ' . $class;
    }

    $baseAttributes = [];
    $conditionalAttributes = [
        'id' => $id,
        'name' => $name,
        'value' => $value,
        'placeholder' => $placeholder,
        'autocomplete' => $autocomplete,
        'aria-label' => $aria_label,
        'class' => $class,
    ];

    foreach ($conditionalAttributes as $attribute => $value) {
        if (!empty($value)) {
            $baseAttributes[$attribute] = $value;
        }
    }
@endphp

<div class="flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark {{ $outerClass }}">
    @if (!empty($label))
        <label for="{{ $id }}" class="{{ (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger')) ? 'flex items-center gap-1 '.'text-'.$dangerOrSuccess.' ' : '' }}w-fit pl-0.5 text-sm">
            @if (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger'))
                <x-dynamic-component :component="'shared.svg.icons.pui.'.($dangerOrSuccess === 'success' ? 'check-success' : ($dangerOrSuccess === 'danger' ? 'x-danger' : ''))" aria-hidden="true" fill="currentColor" class="w-4 h-4" />
            @endif
            {{ $label }}
        </label>
    @endif

    <div class="{{ !empty($icon) ? 'relative' : '' }}">
        @if (!empty($icon))
            <x-dynamic-component :component="'shared.svg.icons.'.$icon" stroke="currentColor" fill="none" stroke-width="2" class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-on-surface/50 dark:text-on-surface-dark/50 {{ $svgClass }}" aria-hidden="true" />
        @endif
        <input
            type="{{ $type }}"
            {{ $attributes->merge($baseAttributes) }}
        />
    </div>

    @if (($dangerOrSuccess === 'success' && $showSuccess) || ($dangerOrSuccess === 'danger'))
        @foreach ($errors->get($name) as $message)
            <small class="pl-0.5 {{ $dangerOrSuccess === 'success' ? 'text-success' : ($dangerOrSuccess === 'danger' ? 'text-danger' : '') }}">{{ $message }}</small>
        @endforeach
    @endif

    @if ($slot->hasActualContent())
        {{ $slot }}
    @endif
</div>