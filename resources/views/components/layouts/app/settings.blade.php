@props([
    'titleKey' => 'shared/title.components__layouts__app__settings',
    'titleParams' => [],
    'headerKey' => 'layouts/settings.header.default',
    'headerParams' => [],
    'subHeaderKey' => 'layouts/settings.subHeader.default',
    'subHeaderParams' => [],
    'headerOuterClasses' => '!max-w-lg',
    'formWrapperClasses' => '!max-w-lg',
])

<x-layouts.app
    {{ $attributes->merge([
        'class' => 'app-settings-layout',
    ]) }}
    :titleKey="$titleKey"
    :titleParams="$titleParams"
    :showSearch="false"
>

    <x-slot:sideNavbar>
        <x-layouts.app.settings.components.settings-side-navbar outerClass="mt-4 grow overflow-y-auto" />
    </x-slot>

    <div class="flex flex-col items-center">
        <x-layouts.app.components.header
            header="{{ __($headerKey, $headerParams) }}"
            subHeader="{{ __($subHeaderKey, $subHeaderParams) }}"
            class="{{ $headerOuterClasses }}"
        />
        <x-layouts.app.components.form-wrapper class="{{ $formWrapperClasses }}">
            {{ $slot }}
        </x-layouts.app.components.form-wrapper>
    </div>

</x-layouts.app>