<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blade_pages.public.home', [
        'darkMode' => true,
    ]);
})->name('public.public-pages.home');

Route::get('/cookies-and-privacy-policy', function () {
    return view('blade_pages.public.cookies-and-privacy-policy', ['darkMode' => true]);
})->name('public.public-pages.cookies-and-privacy-policy');

Route::get('/terms-of-use', function () {
    return view('blade_pages.public.terms-of-use', ['darkMode' => true]);
})->name('public.public-pages.terms-of-use');
