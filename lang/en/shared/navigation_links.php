<?php

/*
|--------------------------------------------------------------------------
| Navigation Links Language Lines
|--------------------------------------------------------------------------
|
| Disse language lines er brugt til at bestemme indholdet af navigation links (a-tags) som peger på bestemte sider
|
*/

// short key navngives efter det navn som routen har (`Route::get(...)->name('eksempel');`) hvilket kan ses når man bruger `php artisan route:list`.
// Eksempel: den route som har name "public.public-pages.home" i `routes/public/public-pages.php` har short key "public__public_pages__home"
// Eksempel: den route som har name "login" i `routes/auth.php` har short key "login"

return [
	'register' => 'Sign Up',
	'login' => 'Log In',
	'logout' => 'Log out',
	'admin__admin_pages__admin_dashboard' => [
		'default' => 'Admin Dashboard',
		'guestHeaderNavMenu' => 'Admin',
		'backToAdminDashboard' => 'Back to Admin Dashboard',
	],
	'admin__admin_pages__users_overview' => 'Users Overview',
	'public__public_pages__home' => 'Home page',
	'public__public_pages__home#' => [
		'heroSection' => 'Demo',
		'featureSection' => 'Features',
		'faqSection' => 'FAQ',
	],
	'user__user_prompts__all' => [
		'default' => 'All Prompts',
		'guestHeaderNavMenu' => 'My Account',
		'backToPrompts' => 'Back to prompts',
	],
	'user__user_prompts__uncategorized' => 'Uncategorized',
	'user__user_prompts__create' => 'Create Prompt',
	'user__user_settings__profile' => 'Profile',
	'user__user_settings__password' => 'Password',
	'user__user_settings__appearance' => 'Appearance',
	'user__user_settings__delete_user' => 'Delete Account',
];