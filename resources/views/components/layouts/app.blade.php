@prepend('head')
    {{-- @vite(['resources/js/alpine.js']) --}}
@endprepend

@props([
    'titleKey' => 'shared/title.components__layouts__app',
    'titleParams' => [],
    'showSearch' => true,
    'darkMode' => NULL,
    'themeColors' => config('app.theme_colors.app'),
    'viewport' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover',
    // ___ SEO ___ //
    'metaDescription' => NULL,
    'ogTitle' => NULL,
    'ogDescription' => NULL,
    'ogImage' => NULL,
    'ogUrl' => NULL,
    'twitterCard' => NULL,
    'twitterTitle' => NULL,
    'twitterDescription' => NULL,
    'twitterImage' => NULL,
    'robotsAllowed' => false,
])

<x-layouts.master
    {{ $attributes->merge([
        'class' => 'app-layout bg-white',
    ]) }}
    :titleKey="$titleKey"
    :titleParams="$titleParams"
    :darkMode="$darkMode"
    :themeColors="$themeColors"
    :viewport="$viewport"
    {{-- ___ SEO ___ --}}
    :metaDescription="$metaDescription"
    :ogTitle="$ogTitle"
    :ogDescription="$ogDescription"
    :ogImage="$ogImage"
    :ogUrl="$ogUrl"
    :twitterCard="$twitterCard"
    :twitterTitle="$twitterTitle"
    :twitterDescription="$twitterDescription"
    :twitterImage="$twitterImage"
    :robotsAllowed="$robotsAllowed"
>

    {{-- Hovedcontainer for hele layoutet --}}
    <div
        id="layout-container"
        x-data="{ sidebarIsOpen: false }"
        x-on:resize.window.debounce.50ms="if (window.innerWidth >= 768) sidebarIsOpen = false"
        class="relative flex flex-row"
    >
        {{-- Dette tillader screen readers at skippe sidebaren og gå direkte til main content --}}
        <a class="sr-only" href="#main-content">{{ __('layouts/shared.srOnly.skipToMainContent') }}</a>
        
        {{-- Mørkt overlay til når sidebaren er åben på små skærme --}}
        <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-surface-dark/10 backdrop-blur-xs md:hidden" aria-hidden="true" x-on:click="sidebarIsOpen = false" x-transition.opacity ></div>

        {{-- Side navbar --}}
        <nav id="side-navbar" x-cloak class="flex-none fixed left-0 top-0 z-30 flex h-dvh w-60 flex-col border-r border-outline bg-surface-alt p-4 transition-[transform_300ms,height_100ms_ease-out] md:w-64 md:translate-x-0 md:relative dark:border-outline-dark dark:bg-surface-dark-alt" x-bind:class="sidebarIsOpen ? 'translate-x-0' : '-translate-x-60'" aria-label="{{ __('layouts/app.sideNavbar.aria_label') }}">
            {{-- Logo --}}
            <a href="{{ \Illuminate\Support\Str::finish(route('public.public-pages.home'), '/') }}" class="ml-2 w-fit text-2xl font-bold text-on-surface-strong dark:text-on-surface-dark-strong">
                <span class="sr-only">{{ __('shared/navigation_links.public__public_pages__home') }}</span>
                <x-shared.svg.other.app-logo fill="none" class="w-24" aria-hidden="true" />
            </a>

            {{-- Søgefelt --}}
            <livewire:layouts.app.search :visible="$showSearch" />

            {{-- Sidebar links --}}
            @if(isset($sideNavbar))
                {{ $sideNavbar }}
            @else
                <x-layouts.app.components.prompts-side-navbar outerClass="grow overflow-y-auto{{ $showSearch ? '' : ' mt-4' }}" />
            @endif
            <!-- profile dropdown -->
            {{-- Profil dropdown-menu --}}
            <x-layouts.app.components.profile-dropdown-menu sideOrTopNavbar="side" />
        </nav>
        
        {{-- "Top navbar + Main content"-wrapper --}}
        <div id="topnavbar-and-maincontent-wrapper" class="h-dvh transition-[height_100ms_ease-out] flex flex-col grow overflow-y-auto bg-surface dark:bg-surface-dark">
            {{-- Top navbar --}}
            <nav id="top-navbar" class="sticky top-0 z-10 flex md:hidden items-center justify-between border-b border-outline bg-surface-alt px-4 py-2 dark:border-outline-dark dark:bg-surface-dark-alt" aria-label="{{ __('layouts/shared.aria_label.topNavbar') }}">
                {{-- "Side navbar"-toggleknap for små skærme --}}
                <button type="button" class="md:hidden inline-block text-on-surface dark:text-on-surface-dark" x-on:click="sidebarIsOpen = true">
                    <x-shared.svg.icons.pui.layout-sidebar fill="currentColor" class="size-5" aria-hidden="true" />
                    <span class="sr-only">{{ __('layouts/app.topNavbar.sideNavbarToggle_srOnly') }}</span>
                </button>

                {{-- Breadcrumb --}}
                <nav class="hidden md:inline-block text-sm font-medium text-on-surface dark:text-on-surface-dark" aria-label="{{ __('layouts/shared.aria_label.breadcrumb') }}">
                    {{--
                    @hasSection('breadcrumb')
                        @yield('breadcrumb')
                    @endif
                    --}}
                    <ol class="flex flex-wrap items-center gap-1">
                        <li class="flex items-center gap-1">
                            <a wire:navigate href="{{ route('user.user-prompts.all') }}" class="hover:text-on-surface-strong dark:hover:text-on-surface-dark-strong">{{ __('shared/navigation_links.user__user_prompts__all.default') }}</a>
                            <x-shared.svg.icons.pui.chevron-right stroke="currentColor" fill="none" stroke-width="2" class="size-4" aria-hidden="true" />
                        </li>
                        <li class="flex items-center gap-1 font-bold text-on-surface-strong dark:text-on-surface-dark-strong" aria-current="page">{{ __('shared/navigation_links.public__public_pages__home') }}</li>
                    </ol>
                </nav>

				<x-layouts.app.components.navbar-link-btn
					route="user.user-prompts.create"
					btnIcon="pui.plus"
					label="{{ __('shared/navigation_links.user__user_prompts__create') }}"
                    class="md:hidden"
                    wire:navigate
				/>
            </nav>
            {{-- Main content --}}
            <div id="main-content" class="grow p-4 md:p-5 lg:p-8">
                <div class="overflow-y-auto">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    {{-- Global modal til tilføjelse af tag/kategori --}}
    <x-shared.modal.modal
        id="taxonomy-modal"
        :defaultHeaderTitle="__('shared/category-form.headerTitle.default')"
    >
        <x-slot:customBody>
            <livewire:shared.category-form />
        </x-slot>
    </x-shared.modal.modal>

    {{-- Random modal (bruges ikke til noget, men for at gemme de knapper der til senere) --}}
    {{--
    <x-shared.modal.modal id="random-modal" defaultHeaderTitle="Random min overskrift">
        <p>dette er random modal</p>
        <x-slot:footer>
            <x-shared.button
                x-on:click="modalIsOpen = false"
                buttonColor="primary"
                buttonStyle="ghost"
                customTextColor="on-surface"
                customOutlineColor="primary"
                customOutlineColorDark="primary-dark"
                label="Remind me later"
                class="whitespace-nowrap"
            />
            <x-shared.button
                x-on:click="modalIsOpen = false"
                buttonColor="primary"
                label="Upgrade Now"
            />
        </x-slot>
    </x-shared.modal.modal>
    --}}

</x-layouts.master>