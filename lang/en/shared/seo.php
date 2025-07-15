<?php
$separator = config('app.separator');
$appName = config('app.name');

return [
    /*
    |--------------------------------------------------------------------------
    | SEO Meta Tags Language Lines
    |--------------------------------------------------------------------------
    |
    | Disse language lines bruges til SEO meta tags som descriptions,
    | Open Graph tags, og Twitter Cards på tværs af hele applikationen.
    |
    */

    'metaDescription' => [
				// layout template standard værdier (feks resources/views/components/layouts/guest.blade.php har short key "components__layouts__guest")
        'components__layouts__master' => $appName . $separator . 'the simplest way to organize your AI prompts.',
        'components__layouts__auth' => 'Join ' . $appName . ' to organize your AI prompts. Sign up or log in to start managing your ChatGPT, Midjourney, and other AI tool prompts.',

				// views standard værdier (feks resources/views/eksempel-mappe/eksempelUndermappe/mit-eksempel-view.blade.php har short key "eksempel_mappe__eksempelundermappe__mit_eksempel_view")
        'blade_pages__public__home' => 'Store, categorize, and instantly access your prompts for ChatGPT, Midjourney, and other AI tools. Start for free today and try the simplest way to organize your AI prompts.',
        'blade_pages__public__cookies_and_privacy_policy' => 'Learn how ' . $appName . ' protects your privacy and handles your data. Complete information about cookies, data processing, and your rights under GDPR.',
        'blade_pages__public__terms_of_use' => 'Terms of Use for ' . $appName . '. Read about acceptable use, account responsibilities, and service availability for our AI prompt management platform.',
        //'livewire__auth__login' => 'Log in to ' . $appName . ' to access your AI prompt library. Organize and manage your ChatGPT, Midjourney, and other AI tool prompts.',
        //'livewire__auth__register' => 'Create your free ' . $appName . ' account. Start organizing your AI prompts for ChatGPT, Midjourney, DALL-E, and other AI tools today.',
    ],

    'ogTitle' => [
				// views standard værdier (kun hvis det skal være anderledes end page title)
				// (feks resources/views/eksempel-mappe/eksempelUndermappe/mit-eksempel-view.blade.php har short key "eksempel_mappe__eksempelundermappe__mit_eksempel_view")
        'blade_pages__public__home' => $appName . $separator . 'Organize Your AI Prompts Effortlessly',
    ],

    'ogDescription' => [
				// views standard værdier (kun hvis det skal være anderledes end metaDescription)
				// (feks resources/views/eksempel-mappe/eksempelUndermappe/mit-eksempel-view.blade.php har short key "eksempel_mappe__eksempelundermappe__mit_eksempel_view")
        'blade_pages__public__home' => 'Free AI prompt manager for ChatGPT, Midjourney, and other AI tools. Store, categorize, and instantly access your prompts with ' . $appName . '.',
    ],

    'twitterTitle' => [
    ],

    'twitterDescription' => [
    ],
];