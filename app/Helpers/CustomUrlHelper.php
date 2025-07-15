<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class CustomUrlHelper
{
    /**
     * Return canonical URL for current page.
     * Ensures trailing slash ONLY for frontpage.
     */
    public static function currentCanonicalUrl(): string
    {
        // Hvis det er roden, tilføj trailing slash
        if (rtrim(url()->current(), '/') === rtrim(config('app.url'), '/')) {
            return Str::finish(config('app.url'), '/');
        }

        // Ellers returnér som det er
        return url()->current();
    }
}