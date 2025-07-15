@props([
    'titleKey' => 'shared/title.components__layouts__publicprofile',
    'titleParams' => [],
])

<x-layouts.master
    {{ $attributes->merge([
        'class' => 'publicprofile-layout min-h-dvh transition-[height_100ms_ease-out]',
    ]) }}
    :titleKey="$titleKey"
    :titleParams="$titleParams"
>

    {{ $slot }}

</x-layouts.master>