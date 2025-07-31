@prepend('head')
    {{-- @vite(['resources/js/alpine.js']) --}}
    {{-- @vite('resources/css/layouts/guest.css') --}}
@endprepend

@prepend('closingBody')
    @livewireScripts
@endprepend

@props([
    'titleKey' => 'shared/title.components__layouts__guest',
    'titleParams' => [],
    'darkMode' => NULL,
    'themeColors' => config('app.theme_colors.guest'),
    'usesBunnyCdn' => NULL,
    // ___ SEO ___ //
    'metaDescription' => NULL,
    'ogTitle' => NULL,
    'ogDescription' => NULL,
    'ogImage' => /* asset('images/blade_pages/public/home/hero-banner.jpg') */ NULL,
    'ogUrl' => NULL,
    'twitterCard' => NULL,
    'twitterTitle' => NULL,
    'twitterDescription' => NULL,
    'twitterImage' => NULL,
    'robotsAllowed' => true,
])

<x-layouts.master
    {{ $attributes->merge([
        // 'class' => 'guest-layout min-h-dvh transition-[height_100ms_ease-out] flex flex-col bg-orange-500',
        'class' => 'guest-layout',
    ]) }}
    :titleKey="$titleKey"
    :titleParams="$titleParams"
    :darkMode="$darkMode"
    :themeColors="$themeColors"
    :usesBunnyCdn="$usesBunnyCdn"
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

    @php
        $links = [
            [
                'route' => 'public.public-pages.home',
                'anchorId' => 'hero-section',
                'translation_key' => 'shared/navigation_links.public__public_pages__home#.heroSection',
            ],
            [
                'route' => 'public.public-pages.home',
                'anchorId' => 'feature-section',
                'translation_key' => 'shared/navigation_links.public__public_pages__home#.featureSection'
            ],
            [
                'route' => 'public.public-pages.home',
                'anchorId' => 'faq-section',
                'translation_key' => 'shared/navigation_links.public__public_pages__home#.faqSection'
            ],
        ];
        $loginLink = [
            'route' => 'login',
            'translation_key' => 'shared/navigation_links.login'
        ];
        $dashboardLink = [
            'route' => (optional(auth()->user())->hasRole('admin') ? 'admin.admin-pages.admin-dashboard' : 'user.user-prompts.all'),
            'translation_key' => (optional(auth()->user())->hasRole('admin') ? 'shared/navigation_links.admin__admin_pages__admin_dashboard.guestHeaderNavMenu' : 'shared/navigation_links.user__user_prompts__all.guestHeaderNavMenu'),
        ];
    @endphp

    {{-- Hovedcontainer for hele layoutet --}}
    <div
        id="layout-container"
        x-data="{
            mobileMenuIsOpen: false,
            scrollbarWidth: 0,
            init() {
                // Beregn scrollbar bredde når siden indlæses
                this.scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
                const elements = [
                    {id: 'header', defaultPaddingRight: ''},
                    {id: 'main-content', defaultPaddingRight: '16px'},
                    {id: 'footer-container', defaultPaddingRight: '16px'},
                ];
                elements.forEach(item => {
                    item.el = document.getElementById(item.id);
                });
                this.$watch('mobileMenuIsOpen', (isOpen) => {
                    if (isOpen) {
                        elements.forEach(item => {
                            const currentPadding = window.getComputedStyle(item.el).paddingRight;
                            const newPadding = parseFloat(currentPadding) + this.scrollbarWidth;
                            item.el.style.paddingRight = `${newPadding}px`;
                        });
                    } else {
                        elements.forEach(item => {
                            item.el.style.paddingRight = item.defaultPaddingRight;
                        });
                    }
                });
            }
        }"
        x-on:resize.window.debounce.50ms="if (window.innerWidth >= 768) mobileMenuIsOpen = false"
        class="relative flex flex-row"
    >
        {{-- Dette tillader screen readers at skippe mobile menu og header og gå direkte til main content --}}
        <a class="sr-only" href="#main-content">{{ __('layouts/shared.srOnly.skipToMainContent') }}</a>

        {{-- Mørkt overlay til når mobile menu er åben på små skærme --}}
        <div id="mobile-nav" x-cloak x-show="mobileMenuIsOpen" @keyup.escape.window="mobileMenuIsOpen = false" class="fixed inset-0 z-10 bg-surface/55 dark:bg-surface-dark/80 backdrop-blur-lg md:hidden" aria-hidden="true" x-transition.opacity.duration.300ms>
            {{-- Mobile menu indhold --}}
            <div class="container h-full">
                <nav class="h-full pt-[90.57px] flex flex-col items-center justify-center pb-6" aria-label="{{ __('layouts/shared.aria_label.mobileNav') }}">
                    <!-- Nav links -->
                    <ul class="flex flex-col gap-y-6">
                        @foreach ($links as $link)
                            <li class="text-center">
                                <x-layouts.guest.components.nav-link
                                    :link="$link"
                                    class="text-lg"
                                    :neverActive="true"
                                    x-on:click="mobileMenuIsOpen = false"
                                />
                            </li>
                        @endforeach
                    </ul>
                    <!-- Visuel separator -->
                    <div class="my-5 w-16 h-px bg-outline/50 dark:bg-outline-dark/50"></div>
                    <!-- Auth links -->
                    <div class="flex flex-col gap-y-6">
                        @auth
                            <!-- Dashboard link -->
                            <div class="text-center list-item">
                                <x-layouts.guest.components.nav-link :link="$dashboardLink" class="text-lg" />
                            </div>
                        @else
                            <!-- Login link -->
                            <div class="text-center list-item">
                                <x-layouts.guest.components.nav-link :link="$loginLink" class="text-lg" />
                            </div>
                            <!-- Tilmeld knap -->
                            <div class="mx-auto">
                                <x-layouts.guest.components.nav-sign-up-btn class="inline-flex {{-- sm:hidden --}}" a-class="bg-[#f7f7f7] dark:bg-[#0f0f0f] border-neutral-100" />
                            </div>
                        @endauth
                    </div>
                </nav>
            </div>
        </div>

        {{-- "Top navbar + Main content"-wrapper --}}
        <div id="topnavbar-and-maincontent-wrapper" class="h-dvh transition-[height_100ms_ease-out] flex flex-col grow bg-surface dark:bg-surface-dark" x-bind:class="mobileMenuIsOpen ? 'overflow-hidden' : 'overflow-y-auto overflow-x-hidden'">
            {{-- Top navbar --}}
            <header id="header" class="py-4 border-b md:border-none border-outline/50 dark:border-outline-dark/50 sticky top-0 z-20 max-md:bg-surface/55 max-md:dark:bg-surface-dark/50 max-md:backdrop-blur-lg">
                <nav id="top-navbar" class="container" aria-label="{{ __('layouts/shared.aria_label.topNavbar') }}">
                    <div class="flex justify-between items-center md:border border-outline/50 dark:border-outline-dark/50 md:p-2.5 rounded-radius max-w-2xl mx-auto md:bg-surface/55 md:dark:bg-surface-dark/80 md:backdrop-blur-xs">
                        <div>
                            {{--
                            <a href="{{ \Illuminate\Support\Str::finish(route('public.public-pages.home'), '/') }}" class="inline-flex justify-center items-center w-fit rounded-radius borderfdfd border-primarygfgf px-2 py-2 text-center text-sm font-medium tracking-wide text-on-primary hover:opacity-90 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:border-primary-darkfdsfd dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                                <span class="sr-only">{{ __('shared/navigation_links.public__public_pages__home') }}</span>
                                <x-shared.svg.other.app-logo fill="none" class="w-24" aria-hidden="true" />
                            </a>
                            --}}
                            <x-layouts.shared.components.logo-link/>
                        </div>
                        <div class="hidden md:block">
                            <ul class="gap-4 flex">
                                @foreach ($links as $link)
                                    <li>
                                        {{--
                                        <a href="{{ route($link['route']) }}" class="{{ request()->routeIs($link['route']) ? 'font-bold text-on-surface-strong dark:text-primary-dark' : 'font-medium text-on-surface dark:text-on-surface-dark' }} underline-offset-2 hover:text-on-surface-strong focus:outline-hidden focus:underline dark:hover:text-primary-dark transition text-sm"{!! request()->routeIs($link['route']) ? ' aria-current="page"' : '' !!}>
                                            {{ __($link['translation_key']) }}
                                        </a>
                                        --}}
                                        <x-layouts.guest.components.nav-link :link="$link" class="text-sm" :neverActive="true" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="flex gap-4 items-center pe-2">
                            @auth
                                <x-layouts.guest.components.nav-link :link="$dashboardLink" class="hidden md:inline-flex text-sm" />
                            @else
                                <x-layouts.guest.components.nav-link :link="$loginLink" class="hidden md:inline-flex text-sm" />
                                {{-- Tilmeld knap --}}
                                {{--
                                <div class="hidden sm:inline-flex rounded-radius p-px dark:hover:p-[1.5px] dark:hover:-m-[0.5px] hover:p-[1.25px] hover:-m-[0.25px] bg-conic/[from_var(--border-angle)] from-surface dark:from-surface-dark via-primary/70 hover:via-primary to-surface dark:to-surface-dark hover:scale-[1.02] hover:from-20% hover:via-60% hover:to-100% from-30% via-65% to-100% animate-rotate-border transition">
                                    <a href="{{ \Illuminate\Support\Str::finish(route('public.public-pages.home'), '/') }}" class="border dark:border-neutral-900 border-neutral-50 rounded-radius bg-surface dark:bg-surface-dark dark:hover:bg-surface-dark bg-primarydddddddddddddd borderfds border-primaryfffffff px-4 py-2 text-center text-sm font-medium tracking-wide text-on-primary-dark/90 hover:text-on-primary-dark hover:opacity-75ffdfd focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-primary-darkddddddddddddd dark:border-primary-darkffffffffff dark:text-on-primary/90 hover:dark:text-on-primary dark:focus-visible:outline-primary-dark transition">{{ __('shared/navigation_links.register') }}</a>
                                </div>
                                --}}
                                <x-layouts.guest.components.nav-sign-up-btn class="hidden md:inline-flex" a-class="bg-surface dark:bg-surface-dark border-neutral-50" />
                            @endauth

                            {{-- Mobil menu knap --}}
                            <button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen" x-bind:aria-expanded="mobileMenuIsOpen" type="button" class="md:hidden flex text-on-surface dark:text-on-surface-dark hover:text-on-surface-strong dark:hover:text-primary-dark transition cursor-pointer items-center space-x-2 focus:outline-none px-3 h-9.5" aria-label="{{ __('layouts/shared.aria_label.mobileNavToggle') }}" aria-controls="mobile-nav">
                                <div class="w-[18.5px] flex items-center justify-center relative" aria-hidden="true">
                                    <span x-bind:class="mobileMenuIsOpen ? 'translate-y-0 rotate-45' : '-translate-y-1.5'" class="transform transition w-full h-0.5 bg-current absolute rounded-full"></span>
                                    <span x-bind:class="mobileMenuIsOpen ? 'opacity-0 translate-x-3' : 'opacity-100'" class="transform transition w-full h-0.5 bg-current absolute rounded-full"></span>
                                    <span x-bind:class="mobileMenuIsOpen ? 'translate-y-0 -rotate-45' : 'translate-y-1.5'" class="transform transition w-full h-0.5 bg-current absolute rounded-full"></span>
                                </div>
                            </button>
                        </div>
                    </div>
                </nav>
            </header>

            {{-- Main content --}}
            <main id="main-content" class="grow container">
                <div class="">
                    {{ $slot }}
                </div>
            </main>

            {{-- Footer --}}
            @php
                $socialLinks = [
                    /*
                    [
                        'id' => 'twitter',
                        'href' => 'https://x.com/dgrinddev',
                        'icon' => 'bootstrap.twitter',
                    ],
                    [
                        'id' => 'github',
                        'href' => 'https://github.com/dgrinddev',
                        'icon' => 'bootstrap.github',
                    ],
                    [
                        'id' => 'linkedin',
                        'href' => 'https://www.linkedin.com/in/dgrinddev/',
                        'icon' => 'bootstrap.linkedin',
                    ],
                    [
                        'id' => 'instagram',
                        'href' => 'https://www.instagram.com/',
                        'icon' => 'bootstrap.instagram',
                    ],
                    [
                        'id' => 'youtube',
                        'href' => 'https://www.youtube.com/',
                        'icon' => 'bootstrap.youtube',
                    ],
                    */
                    [
                        'id' => 'facebook',
                        'href' => 'https://www.facebook.com/myprompts/',
                        'icon' => 'bootstrap.facebook',
                    ],
                ];
                $otherLinks = [
                    [
                        'id' => 'cookies_and_privacy_policy',
                        'href' => route('public.public-pages.cookies-and-privacy-policy'),
                    ],
                    [
                        'id' => 'terms_of_use',
                        'href' => route('public.public-pages.terms-of-use'),
                    ],
                ];
            @endphp
            <footer id="footer" class="!pb-0 border-t border-outline dark:border-outline-dark">
                <div id="footer-container" class="container">
                    <div class="py-6 flex flex-col md:flex-row justify-between items-center gap-x-4 gap-y-4">
                        <div class="flex flex-col items-center md:items-start order-last md:order-first">
                            <p class="font-light text-on-surface/50 dark:text-on-surface-dark/50 text-xs">
                                &copy {{ date("Y") }} {{ __('pages/public/home.footer.copyright.rights_reserved') }}
                            </p>
                            <p class="font-light text-on-surface/90 dark:text-on-surface-dark/90 text-xs">
                                {{ __('pages/public/home.footer.credits.prefix') }} <a href="https://dgrind.dev/" rel="noopener" target="_blank" class="font-light text-on-surface/90 dark:text-on-surface-dark/90 underline-offset-2 hover:text-on-surface-strong/90 focus:outline-hidden focus:underline dark:hover:text-primary-dark/90 transition text-xs">{{ __('pages/public/home.footer.credits.link_label') }}</a>
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row flex-wrap items-center gap-x-2.5 md:gap-x-4 gap-y-3">
                            <div class="flex gap-3 md:gap-5 order-last sm:order-first">
                                @foreach ($otherLinks as $otherLink)
                                    <a
                                        href="{{ $otherLink['href'] }}"
                                        class="font-medium text-on-surface dark:text-on-surface-dark underline-offset-2 hover:text-on-surface-strong focus:outline-hidden focus:underline dark:hover:text-primary-dark transition text-sm"
                                    >
                                        {{ __('pages/public/home.footer.otherLinks.'.$otherLink['id'].'.label') }}
                                    </a>
                                @endforeach
                            </div>
                            <span class="h-4 w-px bg-outline dark:bg-outline-dark mx-1 hidden sm:block"></span>
                            <div class="">
                                <ul class="flex gap-3 md:gap-5">
                                    @foreach ($socialLinks as $socialLink)
                                        <li>
                                            <a
                                                href="{{ $socialLink['href'] }}"
                                                rel="nofollow noopener"
                                                target="_blank"
                                                class="text-on-surface dark:text-on-surface-dark underline-offset-2 hover:text-on-surface-strong focus:outline-hidden focus:underline dark:hover:text-primary-dark transition"
                                            >
                                                <x-dynamic-component :component="'shared.svg.icons.'.$socialLink['icon']" aria-hidden="true" fill="currentColor" class="w-4 h-4" />
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</x-layouts.master>