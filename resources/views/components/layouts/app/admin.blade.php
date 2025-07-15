@props([
    'titleKey' => 'shared/title.components__layouts__app__admin',
    'titleParams' => [],
    'headerKey' => 'layouts/admin.header.default',
    'headerParams' => [],
    'subHeaderKey' => 'layouts/admin.subHeader.default',
    'subHeaderParams' => [],
    'headerOuterClasses' => '!max-w-5xl',
    'formWrapperClasses' => '!max-w-5xl',
])

<x-layouts.app
    {{ $attributes->merge([
        'class' => 'app-admin-layout',
    ]) }}
    :titleKey="$titleKey"
    :titleParams="$titleParams"
    :showSearch="false"
>

    <x-slot:sideNavbar>
        <x-layouts.app.admin.components.admin-side-navbar outerClass="mt-4 grow overflow-y-auto" />
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