@props([
    'link',
    'boldOnActive' => true,
    'neverActive' => false,
])

@php
    $routeParams = null;
    if (array_key_exists('routeParams', $link) && $link['routeParams']) {
        $routeParams = $link['routeParams'];
    }
    if ($link['route'] === 'public.public-pages.home') {
        $url = \Illuminate\Support\Str::finish(route($link['route'], $routeParams), '/');
    } else {
        $url = route($link['route'], $routeParams);
    }
    if (array_key_exists('anchorId', $link) && $link['anchorId']) {
        /*
        if (request()->routeIs($link['route'])) {
            $url = '#' . $link['anchorId'];
        } else {
            $url .= '#' . $link['anchorId'];
        }
        */
        $url .= '#' . $link['anchorId'];
    }

    $defaultClasses = request()->routeIs($link['route']) && $boldOnActive && !$neverActive
        ? 'font-bold text-on-surface-strong dark:text-primary-dark'
        : 'font-medium text-on-surface dark:text-on-surface-dark';
    $defaultClasses .= ' underline-offset-2 hover:text-on-surface-strong focus:outline-hidden focus:underline dark:hover:text-primary-dark transition';
@endphp

<a href="{{ $url }}" {!! request()->routeIs($link['route']) && $boldOnActive && !$neverActive ? 'aria-current="page" ' : '' !!} {{ $attributes->merge(['class' => $defaultClasses]) }}>
    {{ __($link['translation_key']) }}
</a>