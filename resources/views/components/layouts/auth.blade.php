@prepend('head')
    {{-- @vite('resources/css/layouts/auth.css') --}}
@endprepend

@props([
    'titleKey' => 'shared/title.components__layouts__auth',
    'titleParams' => [],
    'darkMode' => true,
    'themeColors' => config('app.theme_colors.auth'),
    'authHeaderTitle' => 'default',
    'authHeaderDescription' => 'default',
    'authBottomNavLink_href' => '',
    'authBottomNavLink_prepend' => '',
    'authBottomNavLink_label' => '',
    // ___ SEO ___ //
    'metaDescription' => __('shared/seo.metaDescription.components__layouts__auth'),
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
        'class' => 'auth-layout antialiased',
    ]) }}
    :titleKey="$titleKey"
    :titleParams="$titleParams"
    :darkMode="$darkMode"
    :themeColors="$themeColors"
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

    <div class="grid md:grid-cols-2 min-h-dvh transition-[height_100ms_ease-out]">
        <div
            class="relative hidden md:block bg-cover bg-center bg-no-repeat p-10 text-primary-dark dark:border-r dark:border-surface-dark-alt"
            style="background-image: url({{ asset('images/components/layouts/auth/background.jpg') }});"
        >
            <div class="absolute inset-0 bg-linear-to-b from-surface-dark/70 to-surface-dark-alt/70"></div>
            <div class="z-10 relative h-full flex flex-col justify-between">
                <x-layouts.shared.components.logo-link darkOrLightMode="dark" class="opacity-75" />
                <blockquote class="space-y-2 text-on-surface dark:text-on-surface-dark">
                    @php
                        [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
                    @endphp
                    <p class="text-lg">&ldquo;{{ trim($message) }}&rdquo;</p>
                    <footer class="text-sm">{{ trim($author) }}</footer>
                </blockquote>
            </div>
        </div>
        <div class="bg-surface flex flex-col justify-center p-8 dark:bg-linear-to-b dark:from-surface-dark dark:to-surface-dark-alt">
            <div class="border-1ff border-green-500 w-full max-w-[350px] mx-auto flex flex-col gap-6 items-center">
                <x-layouts.shared.components.logo-link darkOrLightMode="dark" class="md:hidden" />

                <div class="flex flex-col gap-2 text-center">
                    <h1 class="text-on-surface dark:text-on-surface-dark-strong text-xl font-medium">{{ __('layouts/auth.authHeaderTitle.'.$authHeaderTitle) }}</h1>
                    <p class="text-on-surface dark:text-on-surface-dark text-sm">{{ __('layouts/auth.authHeaderDescription.'.$authHeaderDescription) }}</p>
                </div>

                {{ $aboveSessionStatus ?? '' }}
                
                {{--
                @if ($aboveSessionStatus && $aboveSessionStatus->hasActualContent())
                    {{ $aboveSessionStatus }}
                @endif
                --}}

                @if (session('status'))
                    <div class="text-center font-medium text-sm text-success">
                        {{ session('status') == 'verification-link-sent' ? __('layouts/auth.sessionStatus.verification_link_sent') : session('status') }}
                    </div>
                @endif
                
                {{ $slot }}

                @if (!empty($authBottomNavLink_prepend))
                    <div class="space-x-1 text-sm text-on-surface/50 dark:text-on-surface-dark/50">
                        {{ __('layouts/auth.authBottomNavLink.prepend.'.$authBottomNavLink_prepend) }}
                        <span></span>
                        <a
                            href="{{ route($authBottomNavLink_href) }}"
                            class="font-medium text-on-surface dark:text-on-surface-dark underline-offset-2 hover:text-on-surface-strong focus:outline-hidden focus:underline dark:hover:text-primary-dark transition text-sm"
                            wire:navigate
                        >
                            {{ ucfirst(strtolower(__($authBottomNavLink_label))) }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-layouts.master>