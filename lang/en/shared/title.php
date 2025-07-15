<?php
$separator = config('app.separator');
$appName = config('app.name');

/*
|--------------------------------------------------------------------------
| Title Language Lines
|--------------------------------------------------------------------------
|
| Disse language lines er brugt til at bestemme indholdet af title-tag på alle sider (den indsættes i sidste ende i resources/views/components/layouts/master.blade.php)
|
*/

return [
  // layout template standard værdier (feks resources/views/components/layouts/guest.blade.php har short key "components__layouts__guest")
  'components__layouts__app' => $appName . $separator . 'Welcome back!',
  'components__layouts__app__settings' => $appName . $separator . 'Settings',
  'components__layouts__app__admin' => $appName . $separator . 'Admin',
  'components__layouts__auth' => $appName . $separator . 'Signup/Login',
  'components__layouts__guest' => $appName,
  'components__layouts__master' => $appName . $separator . 'Your personal AI prompt library',
  'components__layouts__publicprofile' => $appName . $separator . 'Public Profile',

  // views standard værdier (feks resources/views/eksempel-mappe/eksempelUndermappe/mit-eksempel-view.blade.php har short key "eksempel_mappe__eksempelundermappe__mit_eksempel_view")
  'blade_pages__admin__admin_dashboard' => $appName . $separator . 'Admin Dashboard',
  'blade_pages__admin__users_overview' => $appName . $separator . 'Users Overview',
  'blade_pages__public__home' => $appName . $separator . 'Your personal AI prompt library',
  'blade_pages__public__cookies_and_privacy_policy' => $appName . $separator . 'Cookies & Privacy Policy',
  'blade_pages__public__terms_of_use' => $appName . $separator . 'Terms of Use',
  'blade_pages__user__settings__taxonomy' => $appName . $separator . 'Settings Tags/Categories',
  'livewire__auth__register' => $appName . $separator . 'Register',
  'livewire__auth__login' => $appName . $separator . 'Login',
  'livewire__user__prompt_list' => $appName . $separator . 'Prompts',
  'livewire__user__prompt_form' => $appName . $separator . 'Create or update prompt',
  'livewire__settings__profile' => $appName . $separator . 'Profile Settings',
  'livewire__settings__password' => $appName . $separator . 'Password Settings',
  'livewire__settings__appearance' => $appName . $separator . 'Appearance Settings',
  'livewire__settings__delete_user' => $appName . $separator . 'Delete Account',

  // ___get-routes___
	// short key navngives efter det navn som routen har (`Route::get(...)->name('eksempel');`) hvilket kan ses når man bruger `php artisan route:list`.
	// Eksempel: den route som har name "public.public-pages.home" i `routes/public/public-pages.php` har short key "public__public_pages__home"
	// Eksempel: den route som har name "login" i `routes/auth.php` har short key "login"
  'user__user_settings__tags' => $appName . $separator . 'Tags settings',
  'user__user_settings__categories' => $appName . $separator . 'Categories settings',
  'user__user_prompts__all' => $appName . $separator . 'All Prompts',
  'user__user_prompts__uncategorized' => $appName . $separator . 'Uncategorized Prompts',
  'user__user_categories__show' => $appName . $separator . 'Prompts in category',
  'user__user_prompts__create' => $appName . $separator . 'Create new prompt',
  'user__user_prompts__edit' => $appName . $separator . 'Edit prompt',
];