@props([
    'buttonColor' => 'primary', // primary, secondary, alternate, inverse, info, danger, warning, success
    'buttonStyle' => 'default', // default, outline, ghost, floating_action_button
    'buttonSize' => 'md', // sm, md, lg, xl
    'label' => '',
    'aria_label' => '', // bruges kun til floating_action_button
    'icon' => '',
    'iconPosition' => 'left',
    'spinningIcon' => false,
    'customTextColor' => '',
    'customOutlineColor' => '',
    'customOutlineColorDark' => '',
    'customBorderRadius' => '',
    'customPadding' => '',
    'href' => null,
])

@php
    $darkModeClassEnding = '';
    $color = '';
    $text_AlternateColor = '';
    $bgBorderOutline_AlternateColor = '';
    $inverseModeClassEnding = '';
    $nonDarkModeClassEnding = '';
    $textOn = '-on';
    $whitespaceNowrap = 'whitespace-nowrap';
    $borderRadius = empty($customBorderRadius) ? 'radius' : $customBorderRadius;
    $padding = empty($customPadding) ? 'px-4 py-2' : $customPadding;
    $textSize = '';
    $iconSize = '';
    $tag = $href ? 'a' : 'button';

    switch ($buttonSize) {
        case 'xs': // dette er en jeg selv har tilføjet
            $textSize = 'xs';
            $iconSize = '3';
            break;
        case 'sm':
            $textSize = 'xs';
            $iconSize = '4';
            break;
        case 'md':
            $textSize = 'sm';
            $iconSize = '5';
            break;
        case 'lg':
            $textSize = 'base';
            $iconSize = '6';
            break;
        case 'xl':
            $textSize = 'lg';
            $iconSize = '6';
            break;
    }
    
    if ($buttonStyle === 'floating_action_button') {
        switch ($buttonSize) {
            case 'xs': // dette er en jeg selv har tilføjet
                $iconSize = '3.5';
                break;
            case 'sm':
                $iconSize = '4';
                break;
            case 'md':
                $iconSize = '5';
                break;
            case 'lg':
                $iconSize = '7';
                break;
            case 'xl':
                $iconSize = '8';
                break;
        }
    }

    if (empty($label)) {
        $label = ucfirst($buttonColor);
    }

    if (in_array($buttonColor, ['primary','secondary'])) {
        $darkModeClassEnding = '-dark';
        $color = $buttonColor;
    } else if (in_array($buttonColor, ['info','danger','warning','success'])) {
        $darkModeClassEnding = '';
        $color = $buttonColor;
    } else if ($buttonColor === 'alternate') {
        $darkModeClassEnding = '-dark';
        $color = 'surface';
        $text_AlternateColor = '-strong';
        $bgBorderOutline_AlternateColor = '-alt';
    } else if ($buttonColor === 'inverse') {
        $darkModeClassEnding = '';
        $color = 'surface';
        $nonDarkModeClassEnding = '-dark';
    }

    if ($buttonStyle === 'outline' || $buttonStyle === 'ghost') {
        $textOn = '';
        if ($buttonColor === 'alternate') {
            $color = 'outline';
            $text_AlternateColor = '';
            $bgBorderOutline_AlternateColor = '';
        }
    }

    if ($buttonStyle === 'ghost') {
        $whitespaceNowrap = '';
    }

    if ($buttonStyle === 'floating_action_button') {
        $borderRadius = empty($customBorderRadius) ? 'full' : $customBorderRadius;
        $padding = empty($customPadding) ? 'p-2' : $customPadding;
        if (empty($aria_label)) {
            $aria_label = $label;
        }
    } else {
        $aria_label = '';
    }

    if ($customTextColor !== '') {
        $color = $customTextColor;
    }
@endphp

<{{ $tag }} {{
    $attributes->class([
        'inline-flex items-center' => !empty($icon),
        'justify-center' => !empty($icon) && !$spinningIcon,
        'gap-2' => !empty($icon) && $buttonStyle !== 'floating_action_button',
        'aspect-square' => $buttonStyle === 'floating_action_button',
        $whitespaceNowrap,
        'rounded-'.$borderRadius,
        'bg-transparent' => $buttonStyle === 'outline' || $buttonStyle === 'ghost',
        'bg-'.$color.$bgBorderOutline_AlternateColor.$nonDarkModeClassEnding => !($buttonStyle === 'outline' || $buttonStyle === 'ghost'),
        'border border-'.$color.$bgBorderOutline_AlternateColor.$nonDarkModeClassEnding => !($buttonStyle === 'ghost'),
        $padding,
        'text-'.$textSize,
        'font-medium',
        'tracking-wide',
        'text'.$textOn.'-'.$color.$text_AlternateColor.$nonDarkModeClassEnding,
        'transition',
        'hover:opacity-75',
        'text-center' => !$spinningIcon,
        'focus-visible:outline' => !empty($icon) && $buttonStyle !== 'floating_action_button' && !$spinningIcon,
        'focus-visible:outline-2',
        'focus-visible:outline-offset-2',
        'focus-visible:outline-'.$color.$bgBorderOutline_AlternateColor.$nonDarkModeClassEnding => empty($customOutlineColor),
        'focus-visible:outline-'.$customOutlineColor => !empty($customOutlineColor),
        'active:opacity-100',
        'active:outline-offset-0',
        'disabled:opacity-75',
        'disabled:cursor-not-allowed',
        'dark:bg-'.$color.$darkModeClassEnding.$bgBorderOutline_AlternateColor => !($buttonStyle === 'outline' || $buttonStyle === 'ghost'),
        'dark:border-'.$color.$darkModeClassEnding.$bgBorderOutline_AlternateColor => !($buttonStyle === 'ghost'),
        'dark:text'.$textOn.'-'.$color.$darkModeClassEnding.$text_AlternateColor,
        'dark:focus-visible:outline-'.$color.$darkModeClassEnding.$bgBorderOutline_AlternateColor => empty($customOutlineColorDark),
        'dark:focus-visible:outline-'.$customOutlineColorDark => !empty($customOutlineColorDark),
        'cursor-pointer',
    ])->merge([
        'type' => empty($href) ? 'button' : null,
        'aria-label' => !empty($aria_label) ? $aria_label : null,
        'href' => !empty($href) ? $href : null,
    ])
}}>
    @if (!empty($icon) && is_string($icon))
        <x-dynamic-component
            :component="'shared.svg.icons.'.$icon"
            class="{{ $iconPosition === 'right' ? 'order-last ' : '' }}size-{{ $iconSize }}{{ $spinningIcon ? ' animate-spin motion-reduce:animate-none' : '' }} fill{{ $textOn }}-{{ $color }}{{ $text_AlternateColor }}{{ $nonDarkModeClassEnding }} dark:fill{{ $textOn }}-{{ $color }}{{ $darkModeClassEnding }}{{ $text_AlternateColor }}"
            :fill="!$spinningIcon ? 'currentColor' : null"
            aria-hidden="true"
        />
    @endif
    @if ($slot->hasActualContent())
        {{ $slot }}
    @endif
    @if ($buttonStyle !== 'floating_action_button' && !empty($label) )
        <span class="{{ $iconPosition === 'right' ? 'order-first' : '' }}">
            {{ $label }}
        </span>
    @endif
</{{ $tag }}>