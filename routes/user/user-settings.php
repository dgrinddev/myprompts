<?php
use Illuminate\Support\Facades\Route;

/*
Route::get('/settings/tags', function () { // `/user/settings/tags` (har `/user` prefixed til url)
	return view('blade_pages.user.settings.taxonomy', ['titleKey' => 'shared/title.user__user_settings__tags']);
})->name('user.user-settings.tags');

Route::get('/settings/categories', function () { // `/user/settings/categories` (har `/user` prefixed til url)
	return view('blade_pages.user.settings.taxonomy', ['titleKey' => 'shared/title.user__user_settings__categories']);
})->name('user.user-settings.categories');
*/

Route::livewire('/settings/profile', 'settings.profile')
	->name('user.user-settings.profile');

Route::livewire('/settings/password', 'settings.password')
	->name('user.user-settings.password');

Route::livewire('/settings/appearance', 'settings.appearance')
	->name('user.user-settings.appearance');

Route::livewire('/settings/delete-account', 'settings.delete-user')
	->name('user.user-settings.delete-user');