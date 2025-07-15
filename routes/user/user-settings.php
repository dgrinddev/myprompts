<?php
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
Route::get('/settings/tags', function () { // `/user/settings/tags` (har `/user` prefixed til url)
	return view('blade_pages.user.settings.taxonomy', ['titleKey' => 'shared/title.user__user_settings__tags']);
})->name('user.user-settings.tags');

Route::get('/settings/categories', function () { // `/user/settings/categories` (har `/user` prefixed til url)
	return view('blade_pages.user.settings.taxonomy', ['titleKey' => 'shared/title.user__user_settings__categories']);
})->name('user.user-settings.categories');
*/

Volt::route('/settings/profile', 'settings.profile')
	->name('user.user-settings.profile');

Volt::route('/settings/password', 'settings.password')
	->name('user.user-settings.password');

Volt::route('/settings/appearance', 'settings.appearance')
	->name('user.user-settings.appearance');

Volt::route('/settings/delete-account', 'settings.delete-user')
	->name('user.user-settings.delete-user');