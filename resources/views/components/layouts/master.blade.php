@props([
    'titleKey' => 'shared/title.components__layouts__master',
    'titleParams' => [],
    'darkMode' => NULL,
    'themeColors' => config('app.theme_colors.default'),
    'viewport' => 'width=device-width, initial-scale=1.0',
    'usesBunnyCdn' => false,
    // ___ SEO ___ //
    'metaDescription' => __('shared/seo.metaDescription.components__layouts__master'),
    'ogTitle' => __($titleKey, $titleParams),
    'ogDescription' => $metaDescription,
    'ogImage' => asset('images/other/og_image.jpeg'),
    'ogUrl' => \App\Helpers\CustomUrlHelper::currentCanonicalUrl(),
    'twitterCard' => 'summary_large_image',
    'twitterTitle' => $ogTitle,
    'twitterDescription' => $ogDescription,
    'twitterImage' => $ogImage,
    'robotsAllowed' => true,
    'canonicalUrl' => \App\Helpers\CustomUrlHelper::currentCanonicalUrl(),
])

@php
    $color_mode = auth()->user()?->settings?->color_mode;
    if (isset($darkMode)) {
        $quickColorMode = $darkMode ? 'dark' : '';
    } else {
        $quickColorMode = $color_mode === 'dark' ? 'dark' : '';
    }
    $currentThemeColor = $themeColors[$quickColorMode === 'dark' ? 'dark' : 'light'];

    // ////=== TILFØJELSE START ===////
    // Detect hvilken layout der bruges baseret på route
    $currentRoute = request()->route()->getName();
    $isGuestLayout = str_starts_with($currentRoute, 'public.');
    $isAuthLayout = $currentRoute === 'login' || $currentRoute === 'register';
    // ////=== TILFØJELSE SLUT ===////
@endphp

<!DOCTYPE html>
<html
    class="{{ $quickColorMode }}"
    x-data="{
        themeColors: {{ Js::from($themeColors) }},
        color_mode: '{{ $color_mode }}',
        prefersDark: window.matchMedia('(prefers-color-scheme: dark)').matches,
        forcedDarkMode: @json($darkMode),
        applyColorMode() {
            const shouldUseDark = this.color_mode === 'dark' || ((this.color_mode === 'system' || this.color_mode === '') && this.prefersDark);
            const finalColorIsDark = this.forcedDarkMode ?? shouldUseDark;
            document.documentElement.classList.toggle('dark', finalColorIsDark);
            const finalThemeColor = finalColorIsDark ? this.themeColors.dark : this.themeColors.light;
            this.$refs.themeColor.setAttribute('content', finalThemeColor);
            this.$refs.msTileColor.setAttribute('content', finalThemeColor);
        }
    }"
    x-init="
        applyColorMode();
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            prefersDark = e.matches;
            applyColorMode();
        });
        {{--
        document.addEventListener('livewire:navigated', () => {
            applyColorMode();
        });
        --}}
    "
    {{--
    x-on:color_mode-updated="
        color_mode = $event.detail.color_mode;
        applyColorMode();
    "
    --}}
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
>
    <head>
        @if (!isset($darkMode) && ($color_mode === 'system' || $color_mode === ''))
            <script>
                /* Tilføjer 'dark'-class på <html>, hvis color_mode er 'system' og brugerens OS foretrækker dark-mode */
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                }
            </script>
        @endif

        <meta charset="utf-8">
        <meta name="viewport" content="{{ $viewport }}">

        <meta name="robots" content="{{ $robotsAllowed ? 'index, follow' : 'noindex, nofollow' }}">
        <link rel="canonical" href="{{ $canonicalUrl }}">

        {{-- Primary Meta Tags --}}
        <title>{{ __($titleKey, $titleParams) ?? config('app.name', 'Laravel') }}</title>
        <meta name="description" content="{{ $metaDescription }}">

        {{-- Open Graph / Facebook --}}
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ $ogUrl }}">
        <meta property="og:title" content="{{ $ogTitle }}">
        <meta property="og:description" content="{{ $ogDescription }}">
        <meta property="og:image" content="{{ $ogImage }}">
        <meta property="og:site_name" content="{{ config('app.name') }}">
        <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">

        {{-- Twitter --}}
        <meta property="twitter:card" content="{{ $twitterCard }}">
        <meta property="twitter:url" content="{{ $ogUrl }}">
        <meta property="twitter:title" content="{{ $twitterTitle }}">
        <meta property="twitter:description" content="{{ $twitterDescription }}">
        <meta property="twitter:image" content="{{ $twitterImage }}">
        {{-- Tilføj twitter:site når du har Twitter handle --}}
        {{-- <meta name="twitter:site" content="@yourhandle"> --}}

        {{-- DNS Prefetch for performance --}}
        @if ($usesBunnyCdn)
            <link rel="dns-prefetch" href="//myprompts-video-pull.b-cdn.net">
            <link rel="preconnect" href="https://myprompts-video-pull.b-cdn.net" crossorigin>
        @endif

        {{-- Theme color for mobile browsers --}}
        <meta x-ref="themeColor" name="theme-color" content="{{ $currentThemeColor }}">
        <meta x-ref="msTileColor" name="msapplication-TileColor" content="{{ $currentThemeColor }}">

        {{-- Mobile app config --}}
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">

        {{-- Added favicons using realfavicongenerator.net --}}
        <link rel="icon" type="image/png" href="{{ asset('images/favicons/favicon-96x96.png') }}" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicons/favicon.svg') }}" />
        <link rel="shortcut icon" href="{{ asset('images/favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicons/apple-touch-icon.png') }}" />
        <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}" />
        <link rel="manifest" href="{{ asset('images/favicons/site.webmanifest') }}" />

        {{-- Security headers --}}
        <meta name="referrer" content="strict-origin-when-cross-origin">

        {{-- Fonts (bruges ikke i production da de leveres lokalt) --}}
        @if (!app()->isProduction())
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        @endif

        {{-- ////=== ÆNDRING START ===//// --}}
        @if ($isAuthLayout)
            @vite(['resources/css/app.css', 'resources/css/layouts/auth.css', 'resources/js/app.js'])
        @elseif ($isGuestLayout)
            @vite(['resources/css/app.css', 'resources/css/layouts/guest.css', 'resources/js/app.js'])
        @else
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        {{-- ////=== ÆNDRING SLUT ===//// --}}
        
        {{--
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        --}}
        @stack('head') {{-- Akkumulerede stylesheets osv fra layout templates og pages --}}
        @stack('styles') {{-- Akkumulerede style-tags fra layout templates og pages --}}
    </head>
    <body
    {{ $attributes->merge([
        'class' => '',
    ]) }}>
        {{ $slot }}
        @stack('closingBody') {{-- Akkumulerede scripts osv fra layout templates og pages --}}
    </body>
</html>